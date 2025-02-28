<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\Category;
use App\Models\User;

class Depense extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'amount',
        'date_depense',
        'start_date',
        'type',
        'title',
        'category_id',
        'user_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
