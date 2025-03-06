<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;

class UserController extends Controller
{
    //
    public function showExpenses(){
        return view();
    }
    public function showIncomePage(){
        $user = User::find(Auth::id());
        $income = $user->getSalary();
        $credit_date = $user->getCreditDate();
        $budget = $user->getBudget();
        return view('user.income',compact('income','credit_date','budget'));
    }
    
}
