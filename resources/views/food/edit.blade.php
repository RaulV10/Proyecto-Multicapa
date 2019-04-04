@extends('layouts.app')

@section('content')
<div class="container">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
@endif
    <div class="row">
    <form method="post" action="{{action('FoodController@update', $id)}}" >
        {{csrf_field()}}
        @method('PATCH')
        <input name="_method" type="hidden" value="PATCH">
        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="name">Nombre de la comida:</label>
            <input type="text" class="form-control" name="name" value={{$food->name}} />
        </div>
        <div class="form-group">
            <label for="description">Descripcion de la comida:</label>
            <textarea cols="5" rows="5" class="form-control" name="description">{{$food->description}}</textarea>
        </div>
        <div class="form-group">
            <label for="price">Precio:</label>
            <input type="text" class="form-control" name="price" value="{{$food->price}}"/>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
@endsection
