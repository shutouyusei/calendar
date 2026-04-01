<?php

namespace App\Http\Controllers\Calendar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Calendar;
use Illuminate\Console\Scheduling\Schedule;

class IndexController extends Controller
{
    public function show($clickdate)
    {
        $schedules = Calendar::forDate($clickdate)->get();
        return view('calendar.index', compact('schedules'));
    }
}
