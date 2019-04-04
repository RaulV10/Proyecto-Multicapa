<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $guardable = [];

    public function saveMenu($data) {
    $this->user_id = auth()->user()->id;
    $this->name = $data['name'];
    $this->description = $data['description'];
    $this->save();
    return 1;
  }

  public function updateMenu($data) {
    $menu = $this->find($data['id']);
    $menu->user_id = auth()->user()->id;
    $menu->name = $data['name'];
    $menu->description = $data['description'];
    $menu->save();
    return 1;
  }
}
