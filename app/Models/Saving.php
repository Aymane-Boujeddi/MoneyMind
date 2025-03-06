<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saving extends Model
{
    /** @use HasFactory<\Database\Factories\SavingFactory> */
    use HasFactory;
    protected $fillable = [
        'title',
        'amount',
        'progress',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
