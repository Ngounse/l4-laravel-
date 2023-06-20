<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.dashboard');
    }
    
    public function todo()
    {
        return view('dashboard.todo');
    }
    
    public function team()
    {
        return view('dashboard.team');
    }
}
