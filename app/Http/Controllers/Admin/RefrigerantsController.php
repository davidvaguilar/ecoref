<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RefrigerantsController extends Controller
{
    public function store(Request $request, $id){
        dd($id);

        return json_encode("ok refri");
    }
}
