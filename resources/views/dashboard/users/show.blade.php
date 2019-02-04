@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-header">Vizualizare utilizator</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <h2 class="text-center mt-5">{{$user->first_name}} {{$user->last_name}}</h2>

                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ route('panel_users_clocking', $user->user_id) }}" class="btn btn-warning">
                        <i class="fas fa-user-edit mr-1"></i>
                        Pontează
                    </a>
                    <a href="{{ route('panel_users_edit', $user->user_id) }}" class="btn btn-warning">
                        <i class="fas fa-user-edit mr-1"></i>
                        Modifică
                    </a>
                    {{ Form::open(['method' => 'delete', 'route' => ['panel_users_delete', $user->user_id], 'class' => 'pull-right']) }}
                        {{ Form::button('<i class="fas fa-trash mr-1"></i> Șterge', ['type' => 'submit', 'class' => 'btn btn-danger rounded-right', 'style' => 'border-radius: 0;']) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
