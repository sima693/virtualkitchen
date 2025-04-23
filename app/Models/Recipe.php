<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $primaryKey = 'rid';

    protected $fillable = [
        'name',

        'description',
        'type',
        'cookingtime',
        
        'ingredients',
        'instructions',
        'image',
        'uid'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'uid', 'uid');
    }
}
