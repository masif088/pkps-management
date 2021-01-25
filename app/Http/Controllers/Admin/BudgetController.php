<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Budget;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    public function index()
    {
        $budget = Budget::class;
        return view('pages.budget.index',compact('budget'));
    }

    public function create()
    {
        return view('pages.budget.create');
    }

    public function edit($id)
    {
        return view('pages.budget.edit',compact('id'));
    }
    public function download($id)
    {

        return response()->download(storage_path("app/public/budget/". Budget::findOrFail($id)->file));
        // return response()->download(storage_path("app/public/{$filename}"));
        // return response()->download(storage_path("app/public/". Pkps::findOrFail($id)->file));
    }
}
