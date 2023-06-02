<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Console\Commands\SendChatHistory;
/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('send:chatHistory', function () {
    try {
        $sendChatHistory = new SendChatHistory;
        $sendChatHistory->handle();
        $this->info('Comando ejecutado correctamente.');
    } catch (\Exception $e) {
        $this->error('Error al ejecutar el comando: ' . $e->getMessage());
        throw $e;
    }
})->purpose('Enviará al finalizar el día el historial del chat a cada usuario');
