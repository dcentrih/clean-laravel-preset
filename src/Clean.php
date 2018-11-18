<?php

namespace CleanPreset;

use Illuminate\Foundation\Console\Presets\Preset;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Arr;

class Clean extends Preset
{
    public static function install()
    {
        static::cleanSass();
        static::cleanJs();
        static::updateWebpack();
        static::updatePackages();
    }

    public static function cleanSass()
    {
        File::cleanDirectory(resource_path('sass'));
        File::put(resource_path('sass/app.sass'), '');
    }

    public static function cleanJs()
    {
        File::deleteDirectory(resource_path('js/components'));
        File::copy(__DIR__ . '/stubs/app.js', resource_path('js/app.js'));
        File::copy(__DIR__ . '/stubs/bootstrap.js', resource_path('js/bootstrap.js'));
    }

    public static function updateWebpack()
    {
        File::copy(__DIR__ . '/stubs/webpack.mix.js', base_path('webpack.mix.js'));
    }

    public static function updatePackageArray($packages)
    {
        return Arr::only($packages, [
            'axios',
            'cross-env',
            'laravel-mix'
        ]);
    }
}
