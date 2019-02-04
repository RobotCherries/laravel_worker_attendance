@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-header">
                {{-- Actions --}}
                <ul class="nav nav-tabs card-header-tabs justify-content-center">
                    <li class="nav-item">
                        <a href="{{ route('panel_users_show', $user->user_id) }}" class="nav-link">
                            <i class="fas fa-user mr-1"></i>
                            Vizualizează
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('panel_users_clocking', $user->user_id) }}" class="nav-link active">
                            <i class="fas fa-calendar-check mr-1"></i>
                            Pontează
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('panel_users_edit', $user->user_id) }}" class="nav-link">
                            <i class="fas fa-user-edit mr-1"></i>
                            Modifică
                        </a>
                    </li>
                    <li class="nav-item">
                        {{ Form::open(['method' => 'delete', 'route' => ['panel_users_delete', $user->user_id], 'class' => 'pull-right']) }}
                            {{ Form::button('<i class="fas fa-trash mr-1"></i> Șterge', ['type' => 'submit', 'class' => 'nav-link btn btn-link text-muted text-muted', 'style' => 'border-radius: 0;']) }}
                        {{ Form::close() }}
                    </li>
                </ul>
            </div>

            {{-- Card body --}}
            <div class="card-body py-5 px-4">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                {{-- Title --}}
                <div class="text-center">
                    <h3 class="card-title">{{ $user->first_name }} {{ $user->last_name }}</h3>
                    <h5 class="card-subtitle font-weight-light text-muted">Departamentul {{ $user_department }}</h5>
                </div>
            </div>

            {{-- Card footer --}}
            <div class="card-footer text-muted text-center">
                Pontare utilizator
            </div>
        </div>
    </div>
</div>
@endsection
