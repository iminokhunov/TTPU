@extends('layouts.app')


@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>DELETE THIS STUDENT?</h1>

            <p>
                <strong>Id: </strong>{{ $student->id }}<br>
                <strong>Name: </strong>{{ $student->name }}<br>
                <strong>Surname: </strong>{{ $student->surname }}<br>
                <strong>Group: </strong>{{ $student->group_id }}<br>
            </p>

            {!! Form::open(array('route' => ['attendance.demolish', $student->id, $student->time_id], 'method' => 'DELETE')) !!}
            {{ Form::submit('Yes Delete This Student', ['class' => 'btn btn-block btn-danger btn-lg','style'=>'margin-top:40px;']) }}


            {!! Form::close() !!}
        </div>

    </div>

@endsection

