<?php

namespace App\Models;

use App\Models\House;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'image'];

    public function houses()
    {
        return $this->hasMany(House::class, 'categorie_id');
    }
}