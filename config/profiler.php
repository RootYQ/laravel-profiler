<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default Profiler Driver
    |--------------------------------------------------------------------------
    |
    | This option controls the default profiler that will be used by the
    | framework when profile the code.
    |
    | Supported: "xhprof"
    |
    */
    'profiler' => [
        'driver' => env('PROFILER_DRIVER','xhprof')
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Storage
    |--------------------------------------------------------------------------
    |
    | This option controls the default storage that will be used by the framework
    | to store profiling data
    |
    | Supported: "file"
    |
    */
    'storage' => [
        'driver' => env('PROFILER_STORAGE_DRIVER', 'file'),
        'file' => [
            'path' => env('PROFILER_FILE_PATH', storage_path('profiler'))
        ]
    ],
];