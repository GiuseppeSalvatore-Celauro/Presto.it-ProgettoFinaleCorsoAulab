<?php

namespace App\Jobs;

use App\Models\Img;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;

class GoogleVisionLabel implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $product_img_id;
    /**
     * Create a new job instance.
     */
    public function __construct($product_img_id)
    {
        $this->product_img_id = $product_img_id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $i = Img::find($this->product_img_id);

        if (!$i) {
            return;
        }

        $image = file_get_contents(storage_path('app/public/' . $i->path));

        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google_credential.json'));

        $imageAnnotator = new ImageAnnotatorClient();
        $response = $imageAnnotator->labelDetection($image);
        $labels = $response->getLabelAnnotations();

        if($labels){
            $resoult = [];

            foreach ($labels as $label) {
                $resoult[] = $label->getDescription();
            }

            $i->labels = $resoult;

            $i->save();
        }

        $imageAnnotator->close();
    }
}
