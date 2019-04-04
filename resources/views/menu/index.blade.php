@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
              <td>ID</td>
              <td>Nombre</td>
              <td>Descripcion</td>
              <td colspan="2">Acciones</td>
            </tr>
        </thead>
        <tbody>
            @foreach($menus as $menu)
            <tr>
                <td>{{$menu->id}}</td>
                <td>{{$menu->name}}</td>
                <td>{{$menu->description}}</td>
                <td><a href="{{action('MenuController@edit',$menu->id)}}" class="btn btn-primary">Editar</a></td>
                <td>
                    <form action="{{action('MenuController@destroy', $menu->id)}}" method="post">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger" type="submit">Eliminar</button>
                    </form>
                </td>
                <td><a href="/menu/{{$menu->id}}" class="btn btn-primary">Ver</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="/create/menu">Crear Menu</a>
    <hr>
<div>
@endsection
