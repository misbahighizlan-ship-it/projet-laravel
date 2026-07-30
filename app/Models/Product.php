<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [ // remplir decretemnt lors on fait product ::create() sinon va donne ce erreur MassAssignmentException
        'name',
        'description',
        'price',
        'quantity',
    ];
}