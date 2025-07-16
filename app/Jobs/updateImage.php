<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class updateImage implements ShouldQueue
{
    use Queueable, Dispatchable, SerializesModels, InteractsWithQueue;

    protected $imagePath;
    protected $nuevoNombre;

    /**
     * Create a new job instance.
     */
    public function __construct($imagePath, $nuevoNombre)
    {
        $this->imagePath = $imagePath;
        $this->nuevoNombre = $nuevoNombre;

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $imagen = Storage::get($this->imagePath);

        $imagenProcesada = Image::make($imagen)->resize(800, 600)->encode('jpg', 80);

        $nuevoPath = 'imagenes_actualizadas/' . $this->nuevoNombre;
        Storage::put($nuevoPath, $imagenProcesada->stream());

        Storage::delete($this->imagePath);
    }
}
