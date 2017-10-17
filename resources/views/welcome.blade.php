<?php
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Slot;
?>
@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            </div>
                <h1> Time Table !!!</h1>
                <?php
                    date_default_timezone_set('Asia/Tashkent');
                    echo time();
                    ?>
        @if(time()<strtotime('11:30:00'))
            echo "Ready"
            @endif
    </div>
        </div>
    </div>

@endsection