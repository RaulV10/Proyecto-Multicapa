<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Menu;
use App\Food;
use App\Drink;
use App\Dessert;

class MenuController extends Controller
{

  public function index() {
    $menus = Menu::where('user_id', auth()->user()->id)->get();

    return view('menu.index',compact('menus'));
  }

  public function create() {
    return view('menu.create');
  }

  public function show($id) {
    $foods = Food::where('menu_id', $id)->get();
    $drinks = Drink::where('menu_id', $id)->get();
    $desserts = Dessert::where('menu_id', $id)->get();
    $menu_id = $id;
    return view('menu.show', compact('foods', 'drinks', 'desserts', 'menu_id'));
  }

  public function store(Request $request) {
    $menu = new Menu();
        $data = $this->validate($request, [
            'description'=>'required',
            'name'=> 'required'
        ]);

        $menu->saveMenu($data);
        return redirect('/menu')->with('success', 'Nuevo menu creado!');
  }

  public function edit($id) {
    $menu = Menu::where('user_id', auth()->user()->id)
                        ->where('id', $id)
                        ->first();

        return view('menu.edit', compact('menu', 'id'));
  }

  public function update(Request $request, $id) {
    $menu = new Menu();
    $data = $this->validate($request, [
        'description'=>'required',
        'name'=> 'required'
    ]);
    $data['id'] = $id;
    $menu->updateMenu($data);

    return redirect('/home')->with('success', 'Menu Actualizado');
  }

  public function destroy($id) {
    $menu = Menu::find($id);
    $menu->delete();

    return redirect('/home')->with('success', 'El menu ha sido borrado');
  }

}
