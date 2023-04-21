<?php

return [
    'content-path' => env('STATAMIC_CONTENT_LINK_CONTENT_PATH'),
    'paths' => [
        base_path('content'),
        base_path('users'),
        public_path('assets'),
        resource_path('forms'),
        resource_path('users'),
        resource_path('blueprints/forms'),
    ],
];
