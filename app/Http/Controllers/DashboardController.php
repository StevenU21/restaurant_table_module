<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Invoice;
use App\Models\Table;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $usersCount = User::count();
        $tablesCount = Table::count();
        $assignmentsCount = Assignment::count();
        $totalPrice = Invoice::sum('total_ammount');

        return view('dashboard', compact('usersCount', 'tablesCount', 'assignmentsCount', 'totalPrice'));
    }
}
