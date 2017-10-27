@extends('layouts.app')

@section('content')

    <div class="row">

        <div class="col-md-6 col-md-offset-3">
            <a href="{{ route('groups.create') }}" class="btn btn-primary btn-lg btn-block btn-h1-spacing">
                Create New Group
            </a>

        </div>

        <div class="col-md-10 col-md-offset-1">
            <table class="table">
                <thead>
                <th>ID</th>
                <th>Faculty</th>
                <th>Teacher</th>

                <th></th>
                </thead>

                <tbody>
                @foreach($groups as $group)

                    <tr>

                        <th>{{ $group->id }}</th>
                        <td>{{ $group->faculty->name }}</td>
                        <td>{{ $group->teacher->name . ' ' . $group->teacher->surname }}</td>

                        {{--<th>{{ $group->faculty->name}}</th>--}}

                        <td>{{--<a href="{{ route('students',$student->num) }}" class="btn btn-default btn-sm">View</a>
                            <a href="{{ route('students',$student->num) }}" class="btn btn-default btn-sm">Edit</a>--}}</td>
                    </tr>

                @endforeach
                </tbody>

            </table>
        </div>
    </div>


@endsection