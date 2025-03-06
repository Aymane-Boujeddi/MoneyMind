<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Depense;
use App\Models\Wishlist;
use App\Models\Alert;
use App\Models\Saving;
use App\Models\Category;
use Carbon\Carbon;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'salary',
        'budget',
        'role',
        'credit_date',
        'last_logged'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function depense()
    {
        return $this->hasMany(Depense::class);
    }
    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }
    public function alert()
    {
        return $this->hasMany(Alert::class);
    }
    public function savings()
    {
        return $this->hasMany(Saving::class);
    }
    // public function budgetPlusExpenseRecurrente($amount, $date)
    // {
    //     $day = $date->day;
    //     if (Carbon::today()->day < $day) {
    //         $this->budget += $amount;
    //         $this->save();
    //     }
    // }
    // public function budgetAfterRecurent($amount,$date){
    //     $day = $date->day;
    //     $now = Carbon::today()->day;
    //     // dd($day . $now);
    //     if (Carbon::today()->day > $day) {
            
    //         $this->budget -= $amount;
    //         $this->save();
    //     }
    // }
    public function budgetMinusExpense($amount)
    {
        $this->budget -= $amount;
        $this->save();
    }
    public function budgetPlusExpense($amount)
    {
        $this->budget += $amount;
        $this->save();
    }
    public function getSalary()
    {
        return $this->salary;
    }
    public function getCreditDate()
    {
        return $this->credit_date;
    }
    public function getBudget()
    {
        return $this->budget;
    }
    public function isAdmin()
    {
        return $this->role === 'admin';
    }
    public function isClient()
    {
        return $this->role === 'client';
    }
    
}
