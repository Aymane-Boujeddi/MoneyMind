<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Depense;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'category_name'
    ];

    public function depense(){
        return $this->hasMany(Depense::class);
    }
    public function alert(){
        return $this->belongsTo(Alert::class);
    }
}
