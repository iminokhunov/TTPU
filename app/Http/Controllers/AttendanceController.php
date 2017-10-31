<?php

namespace App\Http\Controllers;

use App\Slot;
use App\Teacher;
use App\Timeslot;
use App\User;
use App\Attendance;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
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
        $teacher = Teacher::find(1)->id;
        $slot = AttendanceController::findSlot();
        $date = date('Y-m-j',time());
        $students = DB::table('timeslots')
            ->where('date',$date)
            ->where('slot_id',$slot)
            ->where('teacher_id',$teacher)
            ->join('students','timeslots.group_id','students.group_id')
            ->select('students.id','students.name','students.surname','students.group_id','time_id')
            ->get();

        $time_id = $students->pluck('time_id')->unique();
        $stored = Attendance::whereIn('time_id',$time_id)->pluck('student_id')->toArray();
        $students = $students->filter(function ($value, $key) use ($stored) {
            if(!in_array($value->id,$stored))
            {
                return $value;
            }

        });
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
        date_default_timezone_set('Asia/Tashkent');
        $teacher = User::find(1)->teacher->id;
        $slot = AttendanceController::findSlot();
        $date = date('Y-m-j',time());

        $stored = Attendance::
            whereIn('time_id',$request->present_students)
            ->pluck('student_id')->toArray();

        $store = array_flip ( $stored );
        $difference = array_diff_key($request->present_students,$store);


        foreach($difference as $key => $value)
        {
            Attendance::insert([
                'time_id' => $value,
                'student_id' => $key,
                'date' => $date
            ]);
        }

        Session::flash('success','Student was successfully saved');
        return redirect()->route('attendance.display');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function display()
    {
        date_default_timezone_set('Asia/Tashkent');
        $teacher = User::find(1)->teacher->id;
        $slot = AttendanceController::findSlot();
        $date = date('Y-m-j',time());
        $students = DB::table('attendances')
            ->whereIn('time_id',function ($query) use ($date,$slot,$teacher){
                $query->select('time_id')
                    ->from('timeslots')
                    ->where('date',$date)
                    ->where('slot_id',$slot)
                    ->where('teacher_id',$teacher);
            })
            ->join('students','attendances.student_id','students.id')
            ->select('students.id','students.name','students.surname','students.group_id','time_id')
            ->get()->toArray();
        return view('attendance.display')->withStudents($students);
    }

    public function delete(Request $request)
    {
         $student = $request->toArray();
        $student = (object) $student;
       // dd($student);
        return view('attendance.delete')->withStudent($student);

    }


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
    public function demolish($student_id, $time_id)
    {
       // dd($student_id);
        $attendance = Attendance::where('time_id',$time_id)
                                  ->where('student_id',$student_id)->delete();

        Session::flash('success','Your comment has been successfully deleted');
        return redirect()->route('attendance.display');
    }

    protected function findSlot()
    {
        date_default_timezone_set('Asia/Tashkent');
        $slots = Slot::all();
        $time = date('H:i:s',time());
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
