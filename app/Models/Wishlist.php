<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Wishlist extends Model
{
    /** @use HasFactory<\Database\Factories\WishlistFactory> */
    use HasFactory;

    protected $fillable = [
        'wishlist_name',
        'wishlist_amount',
        'wishlist_progress',
        'user_id'
    ];

    public function showWishlist(){
        return view('user.wishlist');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
