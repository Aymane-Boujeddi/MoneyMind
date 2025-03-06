<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Depense;

class Alert extends Model
{
    /** @use HasFactory<\Database\Factories\AlertFactory> */
    use HasFactory;
    protected $fillable =  [
        'seuil',
        'type' ,
        'progress',
        'user_id',
        'category_id',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function category(){
        return $this->hasOne(Category::class);
    }
    public function updateGlobalProgress(){
        $expenses = Depense::where('user_id',Auth::id())->sum('amount');
        $user = User::find(Auth::id());
        $salary = $user->getSalary();
        $seuilSalary = $this->seuil * $salary / 100;
        $alert = Alert::where('user_id',Auth::id())->where('type','global')->first();
        $alert->progress = $expenses / $seuilSalary * 100;
        $alert->save();

    }
    public function updateCategoryProgress(){
        $expenses = Depense::where('user_id',Auth::id())->where('category_id',$this->category_id)->sum('amount');
        $user = User::find(Auth::id());
        $salary = $user->getSalary();
        $seuilSalary = $this->seuil * $salary / 100;
        $alert = Alert::where('user_id',Auth::id())->where('type','category')->where('category_id',$this->category_id)->first();

        $alert->progress = $expenses / $seuilSalary * 100;
        $alert->save();
    }
    public function globalAlertNotification(){
        $alert = Alert::where('user_id',Auth::id())->where('type','global')->first();
        if($alert->progress >= 100){
            return true;
        }else{
            return false;
        }
    }
    public function categoryAlertNotification(){
        $alert = Alert::where('user_id',Auth::id())->where('type','category')->where('category_id',$this->category_id)->first();
        if($alert->progress >= 100){
            return true;
        }else{
            return false;
        }
    }

}
