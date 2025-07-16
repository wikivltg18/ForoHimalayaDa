<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define los comandos de Artisan disponibles para tu aplicación.
     *
     * @var array
     */
    protected $commands = [
        // Aquí puedes registrar comandos personalizados
    ];

    /**
     * Define la programación de tareas.
     */
    protected function schedule(Schedule $schedule)
    {
        // Aquí puedes programar tareas recurrentes
        // Ejemplo: $schedule->command('inspire')->hourly();
    }

    /**
     * Registra los comandos para la consola.
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
