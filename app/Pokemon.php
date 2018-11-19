<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Type;
use App\PokemonType;

class Pokemon extends Model
{
    protected $fillable=['name', 'weight', 'height', 'evolves','img_type'];
    private $img_folder = 'pokemon_images';

    public function types(){
        return $this->belongsToMany(Type::class, 'pokemon_type', 'pokemon_id', 'type_id');
    }

    public function getImageUrl() {
        return url('img/Bulbasaur.png');
    }

    public function saveTypes(Array $types) {
        if(is_array($types)) {
            PokemonType::where('pokemon_id', $this->id)->delete(); 
            if(count($types)) {
                foreach($types as $key => $value) {
                    $data_to_save = ['pokemon_id'=> $this->id, 'type_id' => $value];
                    PokemonType::create($data_to_save);
                }
            }
        }
    }

   public function getImgDirectory() {

       return public_path().'/'. $this->img_folder.'/';

   }

   public function getImgName() {

       return $this->id.".".$this->img_type;

   }

   public function getImgUrl($force_id = true) {

       return asset($this->img_folder.'/'.$this->getImgName(). ($force_id ? "?id=".uniqid() : '') );

   }

   public function deleteImage() {
       $image_path = $this->getImgPath();
       if(File::exists($image_path)) {
           return File::delete($image_path);
        }
   }

   public function getImgPath() {

       return public_path().'/'. $this->img_folder.'/'.$this->getImgName();

   }

   public function saveImage($file) {

       $this->img_type = $file->getClientOriginalExtension();
       $directory = $this->getImgDirectory();
       $filename = $this->getImgName();
       $upload_success = $file->move($directory, $filename);
       return $this->save() && $upload_success;
   }
}
