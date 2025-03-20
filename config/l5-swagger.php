<?php

return [
    'default' => [
        'routes' => [
            'api' => 'api/documentation'
        ],
        'paths' => [
            'docs_json' => 'api-docs.json',
            'docs_yaml' => 'api-docs.yaml',
            'annotations' => [
                base_path('app')
            ],
        ],
    ],
];
