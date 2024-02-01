<?php

namespace App\Livewire;

use App\Models\Img;
use App\Jobs\ResizeImg;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\RemoveFaces;
use App\Jobs\GoogleVisionLabel;
use function Laravel\Prompts\error;

use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Product as ProductModel;
use Illuminate\Support\Facades\Session;
use Symfony\Contracts\Service\Attribute\Required;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Product extends Component
{
    use WithFileUploads;
    public $name;
    public $description;
    public $price;
    public $category_id;
    public $imgs = [];
    public $product;
    protected $rules = [
        'name' => 'required | min:5 | max:255',
        'imgs.*' => 'image|max:1024',
        // 'tempo_imgs.*' => 'image|max:1024',
        'description' => 'required | min:5',
        'category_id' => 'required',
        'price' => 'required | min:1 | max:9',
    ];
    protected $messages = [
        'name.required'=> 'Il campo è obbligatorio',
        'category_id.required'=> 'Il campo è obbligatorio',
        'description.required'=> 'Questo campo è obbligatorio',
        'imgs.*.image' => 'il file inserito deve essere una immagine',
        'imgs.*.max' => 'il file inserito è troppo pesante',
        // 'tempo_imgs.*.image' => 'il file inserito deve essere una immagine',
        'tempo_imgs.*.image' => 'il file inserito è troppo pesante',
        'price.required'=> 'Il campo è obbligatorio',
        'name.min'=> 'Il nome deve avere un minimo di 5 caratteri',
        'description.min'=> 'La descrizione deve avere un minimo di 5 caratteri',
        'price.min'=> 'Il prezzo deve avere un minimo di 1 carattere',
        'name.max'=> 'Il campo deve avere un massimo di 1 carattere',
        'price.max'=> 'Il campo deve avere un massimo di 1 carattere',
    ];
    public function delete($key){
        if (in_array($key, array_keys($this->imgs))) {
            unset($this->imgs[$key]);
        }
    }
    public function create(){
            $this->validate();
            $this->product = Category::find($this->category_id)->products()->create($this->validate());
            $this->product->update(['user_id'=>Auth::user()->id]);
            if ($this->imgs){
                foreach ($this->imgs as $img) {
                    $newFileName = "products/{$this->product->id}";
                    $newImg = $this->product->images()->create([
                        'path' => $img->store($newFileName , 'public')
                    ]);
                    RemoveFaces::withChain([
                        new ResizeImg($newImg->path, 400, 300),
                        new GoogleVisionSafeSearch($newImg->id),
                        new GoogleVisionLabel($newImg->id),
                    ])->dispatch($newImg->id);
                }
                File::deleteDirectory(storage_path('/app/livewire-tmp'));
            }

            $this->reset();
            Session::flash('message', 'Il tuo prodotto è stato inserito con successo ');
    }
    public function updated($validateName){
        $this->validateOnly($validateName);
    }
    
    public function render()
    {
        return view('livewire.product');
    }
    
}
