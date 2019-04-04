<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
  protected $guardable = [];

  public function saveFood($data) {
    $this->name = $data['name'];
    $this->description = $data['description'];
    $this->price = $data['price'];
    $this->menu_id = $data['menu_id'];
    $this->save();
    return 1;
  }

  public function updateFood($data) {
    $food = $this->find($data['id']);
    $food->name = $data['name'];
    $food->description = $data['description'];
    $food->price = $data['price'];
    $food->save();
    return 1;
  }
}
