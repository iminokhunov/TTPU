@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <a href="{{ route('students.create') }}" class="btn btn-primary btn-lg btn-block btn-h1-spacing">
                Create New Students
            </a>

        </div>
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
                </thead>

                <tbody>
                @foreach($students as $student)

                    <tr>
                        <td>{{  $student->id }}</td>
                        <td>{{ $student->surname }}</td>
                        <td>{{ $student->name  }}</td>
                        <td>{{ $student->gr_id }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->address }}</td>
                    </tr>

                @endforeach
                </tbody>

            </table>
        </div>
    </div>

@endsection