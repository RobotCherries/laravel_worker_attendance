@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-header">Pontare utilizator</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <h2 class="text-center mt-5">{{$user->first_name}} {{$user->last_name}}</h2>
            </div>
        </div>
    </div>
</div>
@endsection
