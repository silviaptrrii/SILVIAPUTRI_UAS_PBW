<?php

use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment('Build something useful today.');
})->purpose('Display an inspiring quote');
