@extends('layouts.app')



@section('content')

    <div class="container">

        <div class="row">

            <div class="col-md-8 col-md-offset-2">

                <div class="panel panel-default">

                    <div class="panel-heading">
                        New Student(s)
                    </div>

                    {!! Form::open(['route' => 'students.store','data-parsley-validate'=>'', 'files'=> true]) !!}

                        @foreach(range(0, 0) as $x)

                            <div class="panel-body">

                                    <div class=" col-md-6 form-group">
                                        <label for="id-{{$x}}">Id #{{ $x }}</label>
                                        <input type="text" name="ids[]" id="id-{{$x}}" class="form-control" value="{{old('ids.' . $x)}}">
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label for="group-{{$x}}">Group #{{ $x }}</label>
                                        <select class="selectpicker form-control" name="group[]" >
                                            @foreach($groups  as $group)
                                                 <option value="{{ $group->id }}" >{{ $group->id}}</option>
                                             @endforeach
                                        </select>
                                    </div>

                                    <div class=" col-md-6 form-group">
                                        <label for="name-{{$x}}">Name #{{ $x }}</label>
                                        <input type="text" name="names[]" id="name-{{$x}}" class="form-control">
                                    </div>

                                    <div class=" col-md-6 form-group">
                                        <label for="surname-{{$x}}">Surname #{{ $x }}</label>
                                        <input type="text" name="surnames[]" id="surname-{{$x}}" class="form-control">
                                    </div>

                            </div>
                            <hr>

                        @endforeach
                        <button type="submit" class="btn btn-primary" style="margin-bottom: 25px; margin-left: 40px">Submit</button>
                    {!! Form::close() !!}
                </div>

            </div>

        </div>

    </div>

@endsection