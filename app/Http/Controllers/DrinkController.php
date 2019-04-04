<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Drink;

class DrinkController extends Controller
{
  public function index() {
    return view('drink.index');
  }

  public function create($menu_id) {
    return view('drink.create', compact('menu_id'));
  }

  public function store(Request $request) {
    $food = new Drink();
        $data = $this->validate($request, [
            'description'=>'required',
            'name'=> 'required',
            'price' => 'required',
            'menu_id' => 'required'
        ]);

        $food->saveDrink($data);
        return redirect('/menu')->with('success', 'Bebida creada!');
  }

  public function edit($id) {
    $drink = Drink::where('id', $id)->first();

    return view('drink.edit', compact('drink', 'id'));
  }

  public function update(Request $request, $id) {
    $drink = new Drink();
    $data = $this->validate($request, [
        'description'=>'required',
        'name'=> 'required',
        'price' => 'required'
    ]);
    $data['id'] = $id;
    $drink->updateDrink($data);

    return redirect('/home')->with('success', 'Bebida Actualizada');
  }

  public function destroy($id) {
    $drink = Drink::find($id);
    $drink->delete();

    return redirect('/home')->with('success', 'La bebida ha sido borrada');
  }
}
