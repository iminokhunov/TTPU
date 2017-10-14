@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <table class="table">
                <thead>
                <th>ID</th>
                <th>Surname</th>
                <th>Name</th>
                <th>Group</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Address</th>
                <th></th>
                </thead>

                <tbody>
                @foreach($students as $student)

                    <tr>
                        <th>{{  $student->id }}</th>
                        <td>{{ $student->surname }}</td>
                        <td>{{ $student->name  }}</td>
                        <td>{{ $student->gr_id }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->address }}</td>
                        <td>{{--<a href="{{ route('students',$student->num) }}" class="btn btn-default btn-sm">View</a>
                            <a href="{{ route('students',$student->num) }}" class="btn btn-default btn-sm">Edit</a>--}}</td>
                    </tr>

                @endforeach
                </tbody>

            </table>
        </div>
    </div>

@endsection