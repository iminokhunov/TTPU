@extends('layouts.app')


@section('content')

    <div class="row">


        <div class="col-md-8 col-md-offset-2">
            <h1>Create New Faculty</h1>
            <hr>
            {!! Form::open(['route' => 'faculty.store','data-parsley-validate'=>'', 'files'=> true]) !!}

            {{  Form::label('id','ID (Sort Name):') }}
            {{  Form::text('id',null,array('class'=>'form-control','required'=>'','maxlength'=>'255')) }}

            {{  Form::label('name', 'Full Name Of Faculty:') }}
            {{  Form::text('name', null, array('class'=>'form-control', 'required'=>'','minlength'=>'2', 'maxlength'=>'255')) }}

            {{  Form::submit('Create Faculty', array('class'=>'btn btn-success btn-lg btn-block', 'style'=>'margin-top:20px;')) }}

            {!! Form::close() !!}

        </div>


@endsection