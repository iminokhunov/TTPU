<?php

namespace App\Http\Controllers;

use App\Timeslot;
use App\Teacher;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Collection;
class TimeslotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timeslots = Timeslot::
            where(DB::Raw('WEEKOFYEAR(date)'), '=', Carbon::now()->weekOfYear)
            ->join('teachers','timeslots.teacher_id','=','teachers.id')
            ->join('courses','timeslots.course_id','=','courses.id')
            ->where('group_id','it')
            ->orderBy('date')
            ->select('timeslots.date','timeslots.course_id','timeslots.room_id',
                'timeslots.teacher_id','timeslots.slot_id','timeslots.group_id',
                'teachers.name as teacher_name','surname','courses.name as course_name')
//            ->groupBy('date','slot_id')
            ->get();
//        dd($timeslots);

//        foreach($timeslots as $timeslot)
//        {
//            echo $timeslot->time_id . "</br>";
//        }
        

        return view('timeslots.index')->withTimeslots($timeslots);
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
}
