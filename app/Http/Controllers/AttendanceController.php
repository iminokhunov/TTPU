<?php

namespace App\Http\Controllers;

use App\Slot;
use App\Timeslot;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$slot = AttendanceController::findSlot();
        echo date('Y-m-j',time());
        $timeslots = DB::table('timeslots')
            ->whereDate('date', date('Y-m-j',time()))
            ->get();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    protected function findSlot()
    {
        date_default_timezone_set('Asia/Tashkent');
        $slots = Slot::all();
        foreach($slots as $slot)
        {
            $start = strtotime($slot->start_time);
            $end = strtotime($slot->end_time);
            if(time()>=$start && time()<=$end)
            {
                return $slot->id;
            }
        }


    }

}
