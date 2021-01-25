<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Distribution;
use Illuminate\Http\Request;

class DistributionController extends Controller
{

    public function index()
    {
        $distribution = Distribution::class;
        return view('pages.distribution.index', compact('distribution'));
    }

    public function create()
    {
        return view('pages.distribution.create');
    }

    public function edit($id)
    {
        return view('pages.distribution.edit', compact('id'));
    }

}
