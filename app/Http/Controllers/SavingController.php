<?php

namespace App\Http\Controllers;

use App\Models\Saving;
use App\Http\Requests\StoreSavingRequest;
use App\Http\Requests\UpdateSavingRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Depense;
use App\Models\Alert;
use Carbon\Carbon;

class SavingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function showSavingsPage()
    {
        $savings = Saving::where('user_id',Auth::id())->get();
        return view('user.savings', compact('savings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSavingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Saving $saving)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Saving $saving)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSavingRequest $request, Saving $saving)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Saving $saving)
    {
        //
    }
}
