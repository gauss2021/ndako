<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseImage extends Model
{
    use HasFactory;

    protected $fillable = ['path', 'house_id'];

    public function house()
    {
        return $this->belongsTo(House::class, 'house_id');
    }
}