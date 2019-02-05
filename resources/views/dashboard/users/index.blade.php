@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-header text-center">Vizualizare utilizatori</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                @endif
                
                {{-- Users table --}}
                <table class="table table-striped table-hover rounded overflow-hidden">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nume întreg</th>
                            <th scope="col">Departament</th>
                            <th scope="col">Funcție</th>
                            <th scope="col" colspan="3">Actiuni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            @if($user->deleted_at !== null)
                                <tr class="table-danger">
                            @else
                                <tr>
                            @endif
                                <th class="align-middle p-1 text-center text-black-50">{{ $user->user_id }}</th>
                                <td class="align-middle p-1">
                                    <a href="{{ route('panel_users_show', $user->user_id) }}">
                                        {{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}
                                        @if($user->user_id == $current_user->user_id)
                                            <span class="badge badge-pill badge-success">tu</span>
                                        @endif
                                    </a>
                                </td>
                                <td class="align-middle p-1">{{ $user->department_name }}</td>
                                <td class="align-middle p-1">{{ $user->function_name }}</td>
                                <td class="align-middle p-1">
                                    <a href="{{ route('panel_users_clockings', $user->user_id) }}" class="btn btn-sm btn-primary text-light">
                                        <i class="far fa-calendar-check"></i>
                                    </a>
                                </td>
                                <td class="align-middle p-1">
                                    <a href="{{ route('panel_users_edit', $user->user_id) }}" class="btn btn-sm btn-secondary text-light">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                </td>
                                <td class="align-middle p-1">
                                    {{ Form::open(['method' => 'delete', 'route' => ['panel_users_delete', $user->user_id], 'class' => 'pull-right']) }}
                                        {{ Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger text-light']) }}
                                    {{ Form::close() }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                {{-- Pagination prev & next buttons --}}
                <hr>
                <div class="d-flex justify-content-center">{{ $users->links() }}</div>
            </div>

            {{-- Card footer --}}
            <div class="card-footer text-muted text-center">
                Utilizatori
            </div>
        </div>
    </div>
</div>
@endsection
