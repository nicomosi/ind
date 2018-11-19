<?php

namespace App\Http\Controllers;

use App\Pokemon;
use App\Type;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function todos() //Ver la lista de Pokémon
    {
        $pokemones=Pokemon::all();
        
        return view('Pokemon.index')->with('pokemones', $pokemones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function nuevo()// Agregar un nuevo Pokémon
    {
        $tipos=Type::all();
        return view('Pokemon.create', compact('tipos'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)// Agregar un nuevo Pokémon
    {
        $validation=[
            'name'=>'required|string|max:255',
            'weight'=>'required|integer',
            'height'=>'required|integer',
            'foto'=>'required|mimes:jpg,jpeg'
        ];
        
        $this->validate($request, $validation );

        // FOTO upload
        $nuevoPokemon=Pokemon::create([
            'name'=>$request->input('name'),
            'weight'=>$request->input('weight'),
            'height'=>$request->input('height'),
            'evolves'=>$request->input('height')            
            ]);

        if($nuevoPokemon && $request->input('type')) {
            $nuevoPokemon->saveTypes($request->input('type'));
        }

         if ($request->hasFile('foto')) {
            $nuevoPokemon->saveImage($request->file('foto'));
        }else{
            $fileNameToStore='noimage';
        }

            

        $response=[
            'success'=>true,
            'message'=>'Tu pokemon fue creado con éxito'
        ];

        return redirect()->back()->with('response', $response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function uno($id) //Ver el detalle de un Pokémon
    {
        $pokemon=Pokemon::find($id);
        
        return view('Pokemon.show')->with('pokemon', $pokemon);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function editar(Pokemon $pokemon)// Modificar un Pokémon
    {
        return view('Pokemon.editar')->with('content', $pokemon);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Request $request, int $pokemon_id)// Modificar un Pokémon
    {
        $validation=[
            'name'=>'required|string|max:255',
            'weight'=>'required|integer',
            'height'=>'required|integer',
            'foto'=>'required|mimes:jpg,jpeg'
        ];
        
        $this->validate($request, $validation );

        $pokemon = Pokemon::find($pokemon_id);
        $pokemon->name=$request->input('name');
        $pokemon->weight=$request->input('weight');
        $pokemon->height=$request->input('height');
        $pokemon->evolves=$request->input('height');
        $pokemon->save();    

        if($pokemon && $request->input('type')) {
            $pokemon->saveTypes($request->input('type'));
        }
        
        // FOTO upload

        if ($request->hasFile('foto')) {
            $pokemon->saveImage($request->file('foto'));
        }else{
            $fileNameToStore='noimage';
        }

        $response=[
            'success'=>true,
            'message'=>'Tu pokemon fue creado con éxito'
        ];

        return redirect()->back()->with('response', $response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function borrar(Pokemon $pokemon)//Eliminar un Pokémon
    {
        //
    }
}
