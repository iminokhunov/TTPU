@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <a href="{{ route('faculty.create') }}" class="btn btn-primary btn-lg btn-block btn-h1-spacing">
                Create New Faculty
            </a>

        </div>
        <div class="col-md-6 col-md-offset-3">
            <table class="table">
                <thead>
                <th>Faculty name</th>

                <th></th>
                </thead>

                <tbody>
                @foreach($faculties as $faculty)

                    <tr>
                        <th>{{  $faculty->name }}</th>

                        <td><a href="{{ route('faculty.edit',$faculty->id) }}" class="btn btn-default btn-sm">Edit</a>
                            <a href="{{ route('faculty.destroy',$faculty->id) }}" class="btn btn-default btn-sm">Delete</a></td>
                    </tr>

                @endforeach
                </tbody>

            </table>
        </div>
    </div>

@endsection