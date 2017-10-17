<?php

namespace App\Http\Controllers;

use App\Slot;
use App\Student;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        date_default_timezone_set('Asia/Tashkent');
        $slot = Slot::find(3);
        if(time()>strtotime($slot->start_time))
        {
            echo "Correct";
        }

       // return view('welcome')->withSlot($slot);
    }
}
