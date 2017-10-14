@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <table class="table">
                <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Faculty</th>
                <th>Teacher</th>
                <th></th>
                </thead>

                <tbody>
                @foreach($groups as $group)

                    <tr>
                        <th>{{ $group->id }}</th>
                        <td>{{ $group->name }}</td>
                        <td>{{ $group->faculty  }}</td>
                        <td>{{ $group->teacher }}</td>
                        <td>{{--<a href="{{ route('students',$student->num) }}" class="btn btn-default btn-sm">View</a>
                            <a href="{{ route('students',$student->num) }}" class="btn btn-default btn-sm">Edit</a>--}}</td>
                    </tr>

                @endforeach
                </tbody>

            </table>
        </div>
    </div>


@endsection