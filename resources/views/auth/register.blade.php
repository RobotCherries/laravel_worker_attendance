@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        {{-- User role --}}
                        <div class="form-group{{ $errors->has('user_role') ? ' has-error' : '' }}">
                            <label for="user_role" class="col-md-4 control-label">Rol utilizator *</label>

                            <div class="col-md-4">
                                <select id="user_role" name="user_role" class="custom-select custom-select-lg mb-3">
                                    @foreach ($user_roles as $user_role)
                                        <option value="{{ $user_role->user_role_id }}">
                                            {{ $user_role->user_role_id }} - {{ $user_role->user_role }}
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('department'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('department') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- Department --}}
                        <div class="form-group{{ $errors->has('department') ? ' has-error' : '' }}">
                            <label for="department" class="col-md-4 control-label">Departament *</label>

                            <div class="col-md-4">
                                <select id="department" name="department" class="custom-select custom-select-lg mb-3">
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->department_id }}">
                                            {{ $department->department_id }} - {{ $department->department_name }}
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('department'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('department') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- Function --}}
                        <div class="form-group{{ $errors->has('function') ? ' has-error' : '' }}">
                            <label for="function" class="col-md-4 control-label">Functie *</label>

                            <div class="col-md-6">
                                <select id="function" name="function" class="custom-select custom-select-lg mb-3">
                                    @foreach ($functions as $function)
                                        <option value="{{ $function->function_id }}">
                                            {{ $function->department_id }} - {{ $function->function_name }}
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('function'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('function') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- First name --}}
                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="first_name" class="col-md-4 control-label">Prenume *</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                        {{-- Middle name --}}
                        <div class="form-group{{ $errors->has('middle_name') ? ' has-error' : '' }}">
                            <label for="middle_name" class="col-md-4 control-label">Nume mijlociu</label>

                            <div class="col-md-6">
                                <input id="middle_name" type="text" class="form-control" name="middle_name" value="{{ old('middle_name') }}" placeholder="Optional" autofocus>

                                @if ($errors->has('middle_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('middle_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- Last name --}}
                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label for="last_name" class="col-md-4 control-label">Nume *</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" autofocus>

                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- Date hired --}}
                        <div class="form-group{{ $errors->has('date_hired') ? ' has-error' : '' }}">
                            <label for="date_hired" class="col-md-4 control-label">Data angajare</label>

                            <div class="col-md-6">
                                <input id="date_hired" type="date" class="form-control" name="date_hired"  disabled>

                                @if ($errors->has('date_hired'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date_hired') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- Password --}}
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Parola *</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- Password confirmation --}}
                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmare parola *</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
