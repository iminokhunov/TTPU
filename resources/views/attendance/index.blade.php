@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            @foreach($groups as $group)
                {{$group->id}}
                @endforeach
        </div>
    </div>


@endsection