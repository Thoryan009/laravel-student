<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $count = Student::count();
        return view('admin.dashboard.index', ['count' => $count, 'users' => Auth()->user()->count()]);
    }
}
