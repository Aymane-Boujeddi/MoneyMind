<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\User;
use App\Models\Depense;
use Illuminate\Support\Facades\Mail;
use App\Mail\AlertMail;

class AlertController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function showAlertsPage()
    {
        $user = User::find(Auth::id());
        $categories = Category::all();
        $globalAlert = Alert::where('type','global')->where('user_id',Auth::id())->first();
        $totalExpenses = Depense::where('user_id',Auth::id())->sum('amount');
        $expenseCategory = Depense::where('user_id',Auth::id())->groupBy('category_id')->selectRaw('sum(amount) as total, category_id')->get();
        $categoryAlerts = Alert::where('type','category')->where('user_id',Auth::id())->get();
        $salary = $user->getSalary();
        $salary = $globalAlert->seuil * $salary / 100;
        // dd($categoryAlerts);
        return view('user.alerts', compact('categories','globalAlert','totalExpenses','salary','expenseCategory','categoryAlerts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addGlobalAlert(Request $request)
    {

        $validation = $request->validate([
            'type' => ['required'],
            'seuil' => ['required', 'numeric', 'min:10', 'max:100'],
        ]);
        
        $alert = Alert::create([
            'seuil' => $request->seuil ,
            'type' => 'global' ,
            'user_id' => Auth::id(),
        ]);

        if($alert){
            return redirect()->back()->with('success' ,'Alert Setted successfully');
        }else{
            return redirect()->back()->with('error' ,'Error occured while setting alert try again');

        }
    }
    public function addCategoryAlert(Request $request) {
        $validation = $request->validate([
            'type' => ['required'],
            'seuil' => ['required', 'numeric', 'min:10', 'max:100'],
            'category_id' => ['required'],
        ]);
        
        $alert = Alert::create([
            'seuil' => $request->seuil,
            'type' => 'category',
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
        ]);
    }
    public function sendAlert()
    {
        $user = User::find(Auth::id());
        $globalAlert = Alert::where('type', 'global')->where('user_id', Auth::id())->first();
        $totalExpenses = Depense::where('user_id', Auth::id())->sum('amount');
        $salary = $user->getSalary();
        $seuil = $globalAlert->seuil * $salary / 100;

        if ($totalExpenses > $seuil) {
            Mail::to($user->email)->send(new ($globalAlert));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(StoreAlertRequest $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     */
    public function show(Alert $alert)
    {
        //

    }
  

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alert $alert)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(UpdateAlertRequest $request, Alert $alert)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alert $alert)
    {
        //
    }
}
