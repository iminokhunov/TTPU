@extends('layouts.app')


@section('content')

    <div class="row">


            <div class="col-md-8 col-md-offset-2">
                <h1>Create New Group</h1>
                <hr>
                {!! Form::open(['route' => 'groups.store','data-parsley-validate'=>'', 'files'=> true]) !!}
                {{  Form::label('id','Group:') }}
                {{  Form::text('id',null,array('class'=>'form-control','required'=>'','maxlength'=>'191')) }}

                {{  Form::label('faculty_id ', 'Faculty:') }}
                <select class="selectpicker form-control" name="faculty_id">
                    @foreach($faculties  as $faculty)
                        <option value="{{ $faculty->id }}" >{{ $faculty->name }}</option>
                    @endforeach
                </select>

                {{  Form::label('teacher_id)', 'Teacher:') }}
                <select class="selectpicker form-control" name="teacher_id" >
                    @foreach($teachers  as $teacher)
                        <option value="{{ $teacher->id }}" >{{ $teacher->name . ' ' . $teacher->surname }}</option>
                    @endforeach
                </select>

                {{  Form::submit('Create Groupe', array('class'=>'btn btn-success btn-lg btn-block', 'style'=>'margin-top:20px;')) }}
                {!! Form::close() !!}


    </div>


@endsection