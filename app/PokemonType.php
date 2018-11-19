<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Type;

class PokemonType extends Model
{
    protected $table = 'pokemon_type';
    protected $fillable = ['pokemon_id', 'type_id'];
    public function type() {
        return $this->hasMany(Type::class);
    }
}
