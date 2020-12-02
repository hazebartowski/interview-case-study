<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'description', 'quantity', 'price', 'status'
    ];

    protected $casts = [
        'quantity' =>  'integer',
        'price'  =>  'float',
        'status'      =>  'boolean'
    ];

    /*******************
     * MUTATOR FUNCTIONS
     ******************
     */

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
