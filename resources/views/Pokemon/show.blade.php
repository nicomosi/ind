<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     {{-- ESTILOS --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{url("css/pokemon-card.css")}}">

    {{-- FONTAWESOME --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <title>{{$pokemon->name}}</title>
</head>
<body>

    
    <div class="container">
        
        <div class="row justify-content-center ">
            <div>
                <a href="/pokemon">Atrás</a>
            </div>
            {{-- {{dd($pokemon)}} --}}
            
            <div class="card ">
                @if(file_exists($pokemon->getImgPath()))
                        <img src="{{$pokemon->getImgUrl()}}" alt="{{$pokemon->name}}" style="width:100%">
                    @endif
                <h3>{{$pokemon->name}}</h3>
                <div class="card-data">
                    Peso: {{$pokemon->weight}}<small><strong> kg</strong></small>
                    <br>
                    Altura: {{$pokemon->height}}<small><strong> m</strong></small>
                    <br>
                    @if (App\Pokemon::find($pokemon->evolves)!=null)
                    Evolves: {{App\Pokemon::find($pokemon->evolves)->name}}
                        @else 
                            Evolves: No evoluciona
                    @endif
                    <br>
                    @if($pokemon->types)
                        @foreach ($pokemon->types as $item)
                            <span class="badge {{$pokemon->type_alert}}">
                                {{ $item->name }}
                            </span>
                        @endforeach
                    @endif
                </div>
                <div class="container plus-minus">
                    <div class="row justify-content-center">
                        
                        <a href=""><i class="fas fa-minus"></i></a>
                    <a href="/pokemon/{{$pokemon->id}}/editar"><i class="fas fa-edit"></i></a>
                    </div>
                </div>
                
                
            </div>
            

    </div>

</body>
</html>