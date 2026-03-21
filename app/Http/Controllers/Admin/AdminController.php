<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;

class AdminController extends Controller
{
    //
    public function index()
    {
        // $tags = Tag::all();
        return view('dashboard.dashboard');
    }
}
