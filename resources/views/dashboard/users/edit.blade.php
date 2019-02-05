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
                        <a href="{{ route('panel_users_clockings', $user->user_id) }}" class="nav-link">
                            <i class="fas fa-calendar-check mr-1"></i>
                            Pontează
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('panel_users_edit', $user->user_id) }}" class="nav-link active">
                            <i class="fas fa-user-edit mr-1"></i>
                            Modifică
                        </a>
                    </li>
                    <li class="nav-item">
                        {{ Form::open(['method' => 'delete', 'route' => ['panel_users_delete', $user->user_id], 'class' => 'pull-right']) }}
                            {{ Form::button('<i class="fas fa-trash mr-1"></i> Șterge', ['type' => 'submit', 'class' => 'nav-link btn btn-link text-muted', 'style' => 'border-radius: 0;']) }}
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

                <!-- if there are creation errors, they will show here -->
                {{ Html::ul($errors->all()) }}

                {{ Form::model($user, array('route' => array('panel_users_update', $id), 'method' => 'PUT')) }}
                
                {{-- Company data --}}
                <h5 class="text-muted mt-5">Date companie</h5>
                <div class="form-group">
                    <div class="row">
                        {{-- Department--}}
                        <div class="col">
                            {{ Form::label('department', 'Departament *', ['class' => 'control-label']) }}
                            {{ Form::select('department', $departments, $user->department_id, ['id' => 'js-department', 'class' => 'custom-select', 'autofocus', 'required']) }}
                        </div>
                        {{-- Function--}}
                        <div class="col">
                            {{ Form::label('function', 'Funcție *', ['class' => 'control-label']) }}
                            {{ Form::select('function', $functions, $user->function_id, ['id' => 'js-function', 'class' => 'custom-select', 'autofocus', 'required']) }}
                        </div>
                    </div>
                </div>

                {{-- Personal data --}}
                <h5 class="text-muted mt-5">Date personale</h5>
                <div class="form-group">
                    <div class="row">
                        {{-- First name --}}
                        <div class="col">
                            {{ Form::label('first_name', 'Prenume *', ['class' => 'control-label']) }}
                            {{ Form::text('first_name', $user->first_name, ['id' => 'js-first-name', 'class' => 'form-control', 'autofocus', 'required']) }}
                        </div>
                        {{-- Middle name --}}
                        <div class="col">
                            {{ Form::label('middle_name', 'Nume mijlociu', ['class' => 'control-label']) }}
                            {{ Form::text('middle_name', $user->middle_name, ['id' => 'js-middle-name', 'class' => 'form-control', 'autofocus', 'placeholder' => 'Optional']) }}
                        </div>
                        {{-- Last name --}}
                        <div class="col">
                            {{ Form::label('last_name', 'Nume *', ['class' => 'control-label']) }}
                            {{ Form::text('last_name', $user->last_name, ['id' => 'js-last-name', 'class' => 'form-control', 'autofocus', 'required']) }}
                        </div>
                    </div>
                </div>

                {{-- Account data --}}
                <h5 class="text-muted mt-5">Date cont</h5>
                <div class="form-group">
                    <div class="row">
                        {{-- Email --}}
                        <div class="col">
                            {{ Form::label('email', 'Adresă de email *', ['class' => 'control-label']) }}
                            {{ Form::email('email', $user->email, ['class' => 'js-email form-control', 'autofocus', 'required']) }}
                        </div>
                        {{-- Date hired--}}
                        <div class="col">
                            {{ Form::label('date_hired', 'Dată angajare', ['class' => 'control-label']) }}
                            {{ Form::date('date_hired', \Carbon\Carbon::createFromFormat('Y-m-d', $user->date_hired), ['class' => 'form-control', 'required']) }}
                        </div>
                        {{-- Active --}}
                        <div class="col-auto">
                            {{ Form::label(null, 'Angajat activ', ['class' => 'control-label']) }}
                            <div class="custom-control custom-switch mt-1 mr-sm-2">
                                {{ Form::hidden('active', '0', false, ['id' => 'active', 'class' => 'custom-control-input']) }}
                                @if ($user->active === 1)
                                    {{ Form::checkbox('active', '1', true, ['id' => 'active', 'class' => 'custom-control-input']) }}
                                    {{ Form::label('active', 'Da', ['class' => 'custom-control-label']) }}
                                @else
                                    {{ Form::checkbox('active', '1', false, ['id' => 'active', 'class' => 'custom-control-input']) }}
                                    {{ Form::label('active', 'Nu', ['class' => 'custom-control-label']) }}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group text-center mt-5">
                    {{ Form::submit('Aplică modificările', ['class' => 'btn btn-primary']) }}
                </div>

                {{ Form::close() }}
            </div>

            {{-- Card footer --}}
            <div class="card-footer text-muted text-center">
                Modificare utilizator
            </div>
        </div>
    </div>
</div>
@endsection
