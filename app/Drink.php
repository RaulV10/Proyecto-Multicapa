<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drink extends Model
{
    protected $guardable = [];

    public function saveDrink($data) {
    $this->name = $data['name'];
    $this->description = $data['description'];
    $this->price = $data['price'];
    $this->menu_id = $data['menu_id'];
    $this->save();
    return 1;
  }

  public function updateDrink($data) {
    $drink = $this->find($data['id']);
    $drink->name = $data['name'];
    $drink->description = $data['description'];
    $drink->price = $data['price'];
    $drink->save();
    return 1;
  }
}
