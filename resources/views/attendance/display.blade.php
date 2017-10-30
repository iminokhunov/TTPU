@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-10 col-md-offset-1">

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
                                <td><a href="{{ route('attendance.delete', $student =  (array) $student) }}" class="btn btn-xs btn-danger"><span>delete</span></a></td>
                            </tr>

                        @endforeach
                    </div>

                    </tbody>

                </table>
            </div>
            <div class="col-md-8 col-md-offset-2">

                <a href = "{{ route ('attendance.index')}}" class="btn btn-block btn-primary" style="margin-top:40px;">Add More</a>
            </div>

        </div>

    </div>
    </div>


@endsection