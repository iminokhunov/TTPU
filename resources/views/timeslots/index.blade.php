@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <a href="{{ route('timeslots.create') }}" class="btn btn-primary btn-lg btn-block btn-h1-spacing" style="margin-bottom:40px;margin-top:20px;">
                Create New Timetable
            </a>

        </div>
        <div class="col-md-10 col-md-offset-1">
            <table class="table-responsive table-bordered">
                <thead>
                <th class="col-md-1">Days</th>
                <th class="col-md-1">Lessons</th>
                <th class="col-md-8" style="text-align: center">Group</th>
                </thead>

                <tbody>

                @foreach($timeslots as $timeslot)
                    <tr>
                        <td>{{ $timeslot->date }}</td>
                        <td>{{ $timeslot->slot_id }}</td>
                        <td>{{ $timeslot->course_name }}</td>
                        <td>{{ $timeslot->teacher_name ." " .$timeslot->surname }}</td>
                        <td>{{ $timeslot->room_id }}</td>
                    </tr>



                @endforeach


                </tbody>

            </table>
        </div>
    </div>

@endsection