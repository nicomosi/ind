<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agregar Pokemon</title>
     {{-- ESTILOS --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    

    {{-- FONTAWESOME --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<body>
    <div class="container ">
        <div class="justify-content-center">
            <h1 class="text-center">Agregá tu Pokemon</h1>
        </div>
        
       
        <div class="">
            <a href="/pokemon">Atrás</a>
        </div>
        <div class="row justify-content-center">
            
        <form class="col-md-6"  method="POST" action="{{ action('PokemonController@actualizar', $content->id) }}" enctype="multipart/form-data"> 
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('response')['success'])
            <div class="alert alert-success col-md-12 justify-content-center" role="alert">
                {{session('response')['message']}}
            </div>  
            @endif
            @csrf
                <div class="form-group">
                    <label for="name">Nombre</label>
                <input type="text" name="name"class="form-control" id="name" placeholder="Ingresa un nombre para tu pokemon" value="{{ $content->name}}">
                </div>
                <div class="form-group">
                    <label for="peso">Peso</label>
                    <input type="text" name="weight"class="form-control" id="peso" placeholder="¿Cuanto Pesa?" value="{{ $content->weight}}">
                </div>
                <div class="form-group">
                    <label for="altura">Altura</label>
                    <input type="text" name="height"class="form-control" id="altura" placeholder="¿Cuanto Mide?" value="{{ $content->height}}">
                </div>
                <label for="tipo">Tipo</label>
                <div class="form-group  d-flex flex-wrap">
                    @foreach (App\Type::all() as $type)
                        <div class="w-25">
                            <input class="col-md-3"type="checkbox" name="type[]" @if(in_array($type->id, $content->types()->pluck('type_id')->toArray())) checked="checked" @endif  value="{{$type->id}}">{{$type->name}}
                            <br>
                        </div>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="foto">Imagen del Pokemon</label>
                    <input type="file" name="foto" id="">
                    @if(file_exists($content->getImgPath()))
                        <img src="{{$content->getImgUrl()}}">
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>