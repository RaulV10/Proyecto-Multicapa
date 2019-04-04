@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
              <td>ID</td>
              <td>Nombre</td>
              <td>Descripcion</td>
              <td>Menu</td>
              <td colspan="2">Acciones</td>
            </tr>
        </thead>
        <tbody>
            @foreach($foods as $food)
            <tr>
                <td>{{$food->id}}</td>
                <td>{{$food->name}}</td>
                <td>{{$food->description}}</td>
                <td><a href="{{action('FoodController@edit',$food->id)}}" class="btn btn-primary">Editar</a></td>
                <td>
                    <form action="{{action('FoodController@destroy', $food->id)}}" method="post">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger" type="submit">Eliminar</button>
                    </form>
                </td>
                <td><a href="#" class="btn btn-primary">Ver</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="/create/food">Crear Comida</a>
<div>
@endsection
