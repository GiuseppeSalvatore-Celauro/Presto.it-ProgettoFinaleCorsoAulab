<?php

namespace App\Jobs;

use Spatie\Image\Image;
use Spatie\Image\Enums\Fit;
use Illuminate\Bus\Queueable;
use Spatie\Image\Manipulations;
use Spatie\Image\Enums\CropPosition;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ResizeImg implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

    private $w;
    private $h;
    private $path;
    private $fileName;
    public function __construct($filePath, $w, $h)
    {
        $this->w = $w;
        $this->h = $h;
        $this->fileName = basename($filePath);
        $this->path = dirname($filePath);
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $w = $this->w;
        $h = $this->h;

        $srcPath = storage_path() . '/app/public/' . $this->path . '/' . $this->fileName;
        $destPath = storage_path() . '/app/public/' . $this->path . "/crop_{$w}x{$h}_" . $this->fileName;
        // dd($srcPath, $destPath);
        $cropImg = Image::load($srcPath)
        ->crop(Manipulations::CROP_CENTER, $w, $h)
        ->watermark('public/img/presto_watermark.png')
        ->save($destPath);
    }
}
