<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // El campo keep puede ser almacenado de forma masiva con el metodo create
    // Model::create(array)
    protected $fillable = ['keep'];
}
