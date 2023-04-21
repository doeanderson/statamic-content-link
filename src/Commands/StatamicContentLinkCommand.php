<?php

namespace DoeAnderson\StatamicContentLink\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class StatamicContentLinkCommand extends Command
{
    public $signature = 'statamic:content-link
                {--relative : Create the symbolic link using relative paths}
                {--force : Recreate existing symbolic links}';

    public $description = 'Symlink content directories from an external location';

    public function handle(): int
    {
        $relative = $this->option('relative');

        foreach (config('statamic.content-link.paths') as $path) {
            if (is_dir($path) && !is_link($path)) {
                $this->laravel->make('files')->deleteDirectory($path);
            }

            if (file_exists($path) && ! $this->isRemovableSymlink($path, $this->option('force'))) {
                $this->error("The [{$path}] link already exists.");

                continue;
            }

            $target = $this->getContentPath($path);

            if (is_link($path)) {
                $this->laravel->make('files')->delete($path);
            }

            if ($relative) {
                $this->laravel->make('files')->relativeLink($target, $path);
            } else {
                $this->laravel->make('files')->link($target, $path);
            }

            $this->info("The [$path] link has been connected to [$target].");
        }

        $this->call('statamic:stache:refresh');
        $this->call('statamic:static:clear');

        return self::SUCCESS;
    }

    protected function isRemovableSymlink(string $link, bool $force): bool
    {
        return is_link($link) && $force;
    }

    protected function getContentPath(string $path): string
    {
        return Str::of($path)->replace(
            base_path(),
            config('statamic.content-link.content-path')
        );
    }
}
