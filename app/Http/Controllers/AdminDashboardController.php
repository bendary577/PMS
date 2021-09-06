<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\AdminViewReceptionistsChart;

class AdminDashboardController extends Controller
{
    
    //admin account can return a welcome dashboard view
    public function welcome()
    {
        $receptionistsChart = new AdminViewReceptionistsChart;
        $receptionistsChart->labels(['Jan', 'Feb', 'Mar']);
        $receptionistsChart->dataset('Users by trimester', 'line', [10, 25, 13]);
        return view('admin.dashboard.dashboard_welcome', ['receptionistsChart' => $receptionistsChart]);
    }

}