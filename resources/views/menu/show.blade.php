@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Comida</h2>
    <table class="table table-striped">
        <thead>
            <tr>
              <td>ID</td>
              <td>Nombre</td>
              <td>Descripcion</td>
              <td>Precio</td>
              <td colspan="2">Acciones</td>
            </tr>
        </thead>
        <tbody>
            @foreach($foods as $food)
            <tr>
                <td>{{$food->id}}</td>
                <td>{{$food->name}}</td>
                <td>{{$food->description}}</td>
                <td>{{$food->price}}</td>
                <td><a href="{{action('FoodController@edit',$food->id)}}" class="btn btn-primary">Editar</a></td>
                <td>
                    <form action="{{action('FoodController@destroy', $food->id)}}" method="post">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger" type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="/create/food/{{$menu_id}}">Crear Comida</a>
    <hr>



    <h2>Bebidas</h2>
    <table class="table table-striped">
        <thead>
            <tr>
              <td>ID</td>
              <td>Nombre</td>
              <td>Descripcion</td>
              <td>Precio</td>
              <td colspan="2">Acciones</td>
            </tr>
        </thead>
        <tbody>
            @foreach($drinks as $drink)
            <tr>
                <td>{{$drink->id}}</td>
                <td>{{$drink->name}}</td>
                <td>{{$drink->description}}</td>
                <td>{{$drink->price}}</td>
                <td><a href="{{action('DrinkController@edit',$drink->id)}}" class="btn btn-primary">Editar</a></td>
                <td>
                    <form action="{{action('DrinkController@destroy', $drink->id)}}" method="post">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger" type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="/create/drink/{{$menu_id}}">Crear Bebida</a>
    <hr>

<div>
@endsection
