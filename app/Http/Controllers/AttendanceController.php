<?php

namespace App\Http\Controllers;

use App\Slot;
use App\Timeslot;
use App\User;
use App\Attendance;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\VarDumper\Cloner\Data;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        date_default_timezone_set('Asia/Tashkent');
        $teacher = User::find(1)->teacher->id;
        $slot = AttendanceController::findSlot();
        $date = date('Y-m-j',time());
        $students = DB::table('timeslots')
            ->where('date',$date)
            ->where('slot_id',$slot)
            ->where('teacher_id',$teacher)
            ->join('students','timeslots.group_id','students.group_id')
            ->select('students.id','students.name','students.surname','students.group_id','time_id')
            ->get();

        return view('attendance.index')->withStudents($students);
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
        $date = date('Y-m-j',time());
        date_default_timezone_set('Asia/Tashkent');
        foreach($request->present_students as $key => $value)
        {
            Attendance::insert([
                'time_id' => $value,
                'student_id' => $key,
                'date' => $date
            ]);
        }
        Session::flash('success','Student was successfully saved');
        return redirect()->route('home');
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
