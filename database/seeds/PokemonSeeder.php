<?php

use Illuminate\Database\Seeder;
use App\Pokemon;

class PokemonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pokemon::create([
            'name' => 'Bulbasaur',
            'weight' => '6.9',
            'height' => '0.7',
            'type_id' => 11,
            'evolves' => 2,
            'image'=>'https://vignette.wikia.nocookie.net/pokedexnacionalmex/images/4/43/Bulbasaur.png/revision/latest/scale-to-width-down/448?cb=20110506001528&path-prefix=es',
            'type_alert'=>'badge-success'
            ]);
        Pokemon::create([
            'name' => 'Ivysaur',
            'weight' => '13',
            'height' => '1.0',
            'type_id' => 11,
            'evolves' => 3,
            'image'=>'https://pre00.deviantart.net/3dc3/th/pre/i/2018/012/2/4/02_____ivysaur_by_uraharataichou-dbzsg29.png',
            'type_alert'=>'badge-success'
            ]);
        Pokemon::create([
            'name' => 'Venausaur',
            'weight' => '100',
            'height' => '2.0',
            'type_id' => 11,
            'evolves' => null,
            'image'=>'https://pre00.deviantart.net/1e00/th/pre/f/2017/039/b/3/venusaur_by_dragonchaser123-dayccha.png',
            'type_alert'=>'badge-success'
            ]);
        Pokemon::create([
            'name' => 'Charmander',
            'weight' => '8.5',
            'height' => '0.6',
            'type_id' => 9,
            'evolves' => 5,
            'image'=>'https://vignette.wikia.nocookie.net/pokemonpets/images/0/0b/2004-Shiny-Charmander.png/revision/latest?cb=20160920013622',
            'type_alert'=>'badge-danger'
            ]);
        Pokemon::create([
            'name' => 'Charmeleon',
            'weight' => '19',
            'height' => '1.1',
            'type_id' => 9,
            'evolves' => 6,
            'image'=>'https://vignette.wikia.nocookie.net/theunitedorganizationtoonsheroes/images/a/af/Charmeleon_%28Kairi%27s%29.png/revision/latest?cb=20170714194735',
            'type_alert'=>'badge-danger'
            ]);
        Pokemon::create([
            'name' => 'Charizard',
            'weight' => '90.5',
            'height' => '1.7',
            'type_id' => 9,
            'evolves' => null,
            'image'=>'https://vignette.wikia.nocookie.net/majestic-guardians/images/9/95/Charizard.png/revision/latest?cb=20120827123206',
            'type_alert'=>'badge-danger'
            ]);
        Pokemon::create([
            'name' => 'Squirtle',
            'weight' => '9',
            'height' => '0.5',
            'type_id' => 10,
            'evolves' => 8,
            'image'=>'https://vignette.wikia.nocookie.net/new-fantendo/images/e/e3/Squirtle.png/revision/latest?cb=20141022175246&path-prefix=es',
            'type_alert'=>'badge-primary'
            ]);
        Pokemon::create([
            'name' => 'Wartortle',
            'weight' => '22.5',
            'height' => '1',
            'type_id' => 10,
            'evolves' => 9,
            'image'=>'https://vignette.wikia.nocookie.net/es.pokemon/images/5/55/Wartortle_%28anime_AG%29.png/revision/latest?cb=20120906023135',
            'type_alert'=>'badge-primary'
            ]);
        Pokemon::create([
            'name' => 'Blastoise',
            'weight' => '85.5',
            'height' => '1.6',
            'type_id' => 10,
            'evolves' => null,
            'image'=>'https://vignette.wikia.nocookie.net/es.pokemon/images/8/88/Blastoise_%28anime_XY%29.png/revision/latest?cb=20161101155245',
            'type_alert'=>'badge-primary'
            ]);
    }
}
