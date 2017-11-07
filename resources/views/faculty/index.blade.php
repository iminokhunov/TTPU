@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <a href="{{ route('faculty.create') }}" class="btn btn-primary btn-lg btn-block btn-h1-spacing">
                Create New Faculty
            </a>

        </div>
        <div class="col-md-8 col-md-offset-2">
            <table class="table">
                <thead>
                <th>Faculty name</th>

                <th>Options</th>
                </thead>

                <tbody>
                @foreach($faculties as $faculty)

                    <tr>
                        <td>{{  $faculty->name }}</td>

                        <td><a href="{{ route('faculty.edit',$faculty->id) }}" class="btn btn-info btn-sm">Edit</a>
                            <a href="{{ route('faculty.destroy',$faculty->id) }}" class="btn btn-danger btn-sm">Delete</a></td>
                    </tr>

                @endforeach
                </tbody>

            </table>
        </div>
    </div>

@endsection