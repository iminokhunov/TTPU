@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1>List of Students</h1>
            </div>

            <div class="col-md-2" style="margin-top: 22px;">
                <a href="{{ route('attendance.display') }}" class="btn btn-primary btn-lg btn-block btn-h1-spacing">
                    Added Students
                </a>

            </div>
            <div class="col-md-12">
                <hr>
            </div>
        </div>
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
                                <td>{{  $student->id }}</td>
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