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
    <form method="post" action="{{url('/create/drink')}}">
        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <input type="hidden" value="{{$menu_id}}" name="menu_id" />
            <label for="name">Nombre de la bebida:</label>
            <input type="text" class="form-control" name="name"/>
        </div>
        <div class="form-group">
            <label for="description">Descripcion:</label>
            <textarea cols="5" rows="5" class="form-control" name="description"></textarea>
        </div>
        <div class="form-group">
            <label for="price">Precio:</label>
            <input type="number" class="form-control" name="price"/>
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
        </form>
    </div>
</div>
@endsection
