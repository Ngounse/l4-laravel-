<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.dashboard');
    }
    
    public function team()
    {
        return view('dashboard.team');
    }
    
    public function reports()
    {
        return view('dashboard.reports');
    }
    
    public function calendar()
    {
        return view('dashboard.calendar');
    }
    
    public function projects()
    {
        return view('dashboard.projects');
    }
}
