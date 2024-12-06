<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('custom:command', function () {
    $this->info('This is a custom Artisan command!');
});
