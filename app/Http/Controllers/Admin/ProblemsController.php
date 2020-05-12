<?php

namespace App\Http\Controllers\Admin;

use App\Problem;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProblemsController extends Controller
{
    public function index(){
        $problems = Problem::all();        
        return view('admin.problems.index', compact('problems'));
    }
}
