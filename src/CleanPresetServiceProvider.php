<?php

namespace CleanPreset;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Console\PresetCommand;
use CleanPreset\Clean;

class CleanPresetServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        PresetCommand::macro('clean-preset', function ($command) {
            $command->info('Setting up your files:');
            $command->info('Cleaning your sass directory ...');
            $command->info('Cleaning your js directory ...');
            $command->info('Updating your webpack.mix.js ...');
            $command->info('Updating your dependencies ...');
            Clean::install();
            $command->info('Finished!');
        });
    }
}
