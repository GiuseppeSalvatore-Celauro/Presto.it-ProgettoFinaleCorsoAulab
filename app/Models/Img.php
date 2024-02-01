<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Img extends Model
{
    use HasFactory;

    protected $fillable = [
        'path'
    ];
    protected $casts = [
        'labels' => 'array'
    ];
    public function products(){
        return $this->belongsTo(Product::class);
    }

    public function getUrl($w = null, $h = null){
        return Img::getUrlBFP($this->path, $w, $h);
    }

    public static function getUrlBFP($filePath, $w = null, $h = null){
        if(!$w && !$h){
            return Storage::url($filePath);
        }
        $dirName = dirname($filePath);
        $baseName = basename($filePath);
        $file = "{$dirName}/crop_{$w}x{$h}_{$baseName}";
        return Storage::url($file);
    }
}
