<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class House extends Model
{
    use HasFactory;

    protected $fillable = ['ville', 'quartier', 'prix', 'description', 'image', 'nb_quotient', 'categorie_id', 'user_id'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categorie_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function houseImages()
    {

        return $this->hasMany(HouseImage::class, 'house_id', 'id');
    }
}