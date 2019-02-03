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

                <h1>User Show</h1>
                <h3>{{$user->first_name}} {{$user->last_name}}</h3>

                <a href="{{ route('panel_users_edit', $user->user_id) }}" class="btn btn-small btn-warning">
                    <i class="fas fa-user-edit mr-1"></i>
                    Modifică
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
