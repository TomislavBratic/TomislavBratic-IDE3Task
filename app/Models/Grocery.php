<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grocery extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'type','unit_symbol'];


    public function recipes()
    {
        return $this->belongsToMany(Recipe::class, 'grocery_recipe')
                    ->withPivot('amount')
                    ->withTimestamps();
    }
}
