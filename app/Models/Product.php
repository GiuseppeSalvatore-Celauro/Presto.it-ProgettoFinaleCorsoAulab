<?php

namespace App\Models;

use App\Models\Img;
use App\Models\User;
use App\Models\Category;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'name',
        'description',
        'price',
        'user_id',
    ];

    public function toSearchableArray(){
        $category = $this->category;
        $array = [
            'id' => $this->id,
            'name'=> $this->name,
            'description' => $this->description,
            'price' =>$this->price,
            'user_id'=>$this ->user_id,
            'category'=>$category,
        ];
        return $array;
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function images(){
        return $this->hasMany(Img::class);
    }

    public function setAccept($value){
        $this->is_accepted = $value;
        $this->save();
        return true;
    }
}
