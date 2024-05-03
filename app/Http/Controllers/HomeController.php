<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.home.index');
    }

    public function relationship()
    {
        $response['products']=Product::all();
        return view('pages.relationship.index')->with($response);
    }
}
