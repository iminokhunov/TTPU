@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            {!! Form::open(array('route' => 'attendance.store','method' => 'POST')) !!}
            <div class="col-md-10 col-md-offset-1">
                <table class="table table-responsive">
                    <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Group</th>
                    <th></th>
                    </thead>

                    <tbody>

                    <div class="col col-md-10 col-md-offset-1">

                        @foreach($students as $student)

                            <tr>
                                <th>{{  $student->id }}</th>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->surname  }}</td>
                                <td>{{ $student->group_id }}</td>
                                <td>{{ Form::checkbox("present_students[$student->id]",  $student->time_id)}}</td>
                            </tr>

                        @endforeach
                    </div>

                    </tbody>

                </table>
            </div>
            <div class="col-md-8 col-md-offset-2">

                {{Form::submit('Save',['class' => 'btn btn-success btn-lg btn-block', 'style'=>'margin-top:40px;'])}}
            </div>
            {!! Form::close() !!}
        </div>

    </div>
    </div>


@endsection