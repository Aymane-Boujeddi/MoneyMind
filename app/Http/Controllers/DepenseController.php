<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Depense;
use App\Models\Category;
use App\Models\User;

class DepenseController extends Controller
{
    //
    public function showExpense(){
        $categories = Category::all();
        $depensesRecurente = Depense::where('user_id',Auth::id())->where('type','recurente')->get();
        $depensesPunctuel = Depense::where('user_id',Auth::id())->where('type', 'ponctuel')->get();
        $totalExpense = Depense::where('user_id', Auth::id())->sum('amount');

        return view('user.expenses',compact('categories','depensesPunctuel','depensesRecurente','totalExpense'));
    }

    public function addPunctalExpense(Request $request){
        $validate = $request->validate([
            'amount' => ['required' , 'min:1' ],
            'category' => ['required'],
            'title' => ['required'],
            'date' => ['required' , 'date'],
        ]);
        // dd($request);
        // dd(Auth::id());
        $user = User::find(Auth::id());
        $user->newSalary($request->amount);

        $depense = Depense::create([
            'amount' => $request->amount,
            'title' => $request->title,
            'date_depense' => $request->date ,
            'type' => 'ponctuel',
            'category_id' => $request->category,
            'user_id' => Auth::id(),
        ]);
        if($depense){

            return redirect()->back()->with('success' ,'Expense added successfully');
        }else{
            return redirect()->back()->with('error' ,'Error occured while adding expense try again');

        }


    }
    public function addRecurentExpense(Request $request){
        $validate = $request->validate([
            'amount' => ['required' , 'min:1' ],
            'category' => ['required'],
            'title' => ['required'],
            'start_date' => ['required' , 'date'],
        ]);
        
        // dd($request);
        $depense = Depense::create([
            'amount' => $request->amount,
            'title' => $request->title,
            'start_date' => $request->start_date ,
            'type' => 'recurente',
            'category_id' => $request->category,
            'user_id' => Auth::id(),

        ]);
        if($depense){

            return redirect()->back()->with('success' ,'Expense added successfully');
        }else{
            return redirect()->back()->with('error' ,'Error occured while adding expense try again');

        }
    }
}
