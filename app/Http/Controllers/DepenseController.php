<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Depense;
use App\Models\Category;
use App\Models\User;
use App\Models\Alert;
use App\Services\AiService;
use Carbon\Carbon;

class DepenseController extends Controller
{
    private $aiService;
    private $user;

    public function __construct(AiService $aiService, User $user)
    {
        $this->aiService = $aiService;
        $this->user = $user;
    }

    public function getAdvice()
    {
        $expenses = Depense::where('user_id', Auth::id())
            ->select('category_id', 'amount', 'date_depense', 'title', 'type')
            ->with('category:id,category_name')
            ->get();
        return $this->aiService->getAdviceAi($expenses);
    }

    public function showExpense()
    {
        $categories = Category::all();
        $budget = Auth::user()->budget;
        $depensesRecurente = Depense::where('user_id', Auth::id())->where('type', 'recurente')->get();
        $depensesPunctuel = Depense::where('user_id', Auth::id())->where('type', 'ponctuel')->get();
        $totalExpense = Depense::where('user_id', Auth::id())->sum('amount');
        $recurenteSum = Depense::where('user_id', Auth::id())->where('type', 'recurente')->sum('amount');
        $ponctuelSum = Depense::where('user_id', Auth::id())->where('type', 'ponctuel')->sum('amount');
        $advice = "";

        return view('user.expenses', compact('categories', 'depensesPunctuel', 'depensesRecurente', 'totalExpense', 'recurenteSum', 'ponctuelSum', 'budget', 'advice'));
    }

    public function addPunctalExpense(Request $request)
    {
        $request->validate([
            'amount' => 'required|min:1',
            'category' => 'required',
            'title' => 'required',
            'date' => 'required|date',
        ]);

        $user = $this->user->find(Auth::id());
        $globalAlert = Alert::where('user_id', Auth::id())->where('type', 'global')->first();
        $catgoryAlert = Alert::where('user_id', Auth::id())->where('type', 'category')->where('category_id', $request->category)->first();

        $depense = Depense::create([
            'amount' => $request->amount,
            'title' => $request->title,
            'date_depense' => $request->date,
            'type' => 'ponctuel',
            'category_id' => $request->category,
            'user_id' => Auth::id(),
        ]);

        if ($depense) {
            $user->budgetMinusExpense($request->amount);
            $this->alertCheck(Auth::id(),$request->category);

            $globalAlert->updateGlobalProgress();
            $catgoryAlert->updateCategoryProgress();
            return redirect()->back()->with(['success' => 'Expense added successfully', 'info' => 'Progress updated successfully']);
        } else {
            return redirect()->back()->with('error', 'Error occurred while adding expense, try again');
        }
    }

    public function addRecurentExpense(Request $request)
    {
        $request->validate([
            'amount' => 'required|min:1',
            'category' => 'required',
            'title' => 'required',
            'start_date' => 'required|date',
        ]);

        $user = $this->user->find(Auth::id());
        $depense = Depense::create([
            'amount' => $request->amount,
            'title' => $request->title,
            'start_date' => $request->start_date,
            'type' => 'recurente',
            'category_id' => $request->category,
            'user_id' => Auth::id(),
        ]);

        if ($depense) {
            return redirect()->back()->with('success', 'Expense added successfully');
        } else {
            return redirect()->back()->with('error', 'Error occurred while adding expense, try again');
        }
    }
    public function alertCheck($id,$category_id){
        $globalAlert = Alert::where('user_id', Auth::id())->where('type', 'global')->first();
        $catgoryAlert = Alert::where('user_id', Auth::id())->where('type', 'category')->where('category_id', $category_id)->first();
        if (!$globalAlert) {
            return redirect()->back()->with(['success' => 'Expense added successfully', 'info' => 'Please set a global alert.']);
        }

        if (!$catgoryAlert) {
            return redirect()->back()->with(['success' => 'Expense added successfully', 'info' => 'Please set a category alert.']);
        }
    }

    public function deleteRecurenteExpense(Depense $depense)
    {
        $depense->delete();
        return redirect()->back()->with("success", 'Expense deleted successfully');
    }

    public function deletePonctuelExpense(Depense $depense)
    {
        $user = $this->user->find(Auth::id());
        $user->budgetPlusExpense($depense->amount);
        $depense->delete();
        return redirect()->back()->with("success", 'Expense deleted successfully');
    }

    public function editRecurente(Request $request)
    {
        $depense = Depense::find($request->id);
    }

    public function editPonctuel(Request $request) {}
}
