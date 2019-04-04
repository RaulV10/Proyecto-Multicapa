<?php

namespace App\Http\Controllers;

use App\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index() {
      return view('food.index');
    }

    public function create($menu_id) {
      return view('food.create', compact('menu_id'));
    }

    public function store(Request $request) {
      $food = new Food();
          $data = $this->validate($request, [
              'description'=>'required',
              'name'=> 'required',
              'price' => 'required',
              'menu_id' => 'required'
          ]);

          $food->saveFood($data);
          return redirect('/menu')->with('success', 'Nuevo menu creado!');
    }

    public function edit($id) {
      $food = Food::where('id', $id)->first();

      return view('food.edit', compact('food', 'id'));
    }

    public function update(Request $request, $id) {
      $food = new Food();
      $data = $this->validate($request, [
          'description'=>'required',
          'name'=> 'required',
          'price' => 'required'
      ]);
      $data['id'] = $id;
      $food->updateFood($data);

      return redirect('/home')->with('success', 'Comida Actualizada');
    }

    public function destroy($id) {
      $menu = Food::find($id);
      $menu->delete();

      return redirect('/home')->with('success', 'La comida ha sido borrada');
    }

}
