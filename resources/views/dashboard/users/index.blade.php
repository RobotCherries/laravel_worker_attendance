@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-header">Vizualizare utilizatori</div>

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
                <table class="table table-hover">
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
                                <th class="align-middle">
                                    <a href="{{ route('panel_users_show', $user->user_id) }}">
                                        {{ $user->user_id }}
                                    </a>
                                </th>
                                <td class="align-middle">
                                    <a href="{{ route('panel_users_show', $user->user_id) }}">
                                        {{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}
                                    </a>
                                </td>
                                <td class="align-middle">{{ $user->department_name }}</td>
                                <td class="align-middle">{{ $user->function_name }}</td>
                                <td class="align-middle">
                                    <a href="#" class="btn btn-sm btn-primary">
                                        <i class="far fa-calendar-check"></i>
                                    </a>
                                </td>
                                <td class="align-middle">
                                    <a href="{{ route('panel_users_edit', $user->user_id) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-user-edit"></i>
                                    </a>
                                </td>
                                <td class="align-middle">
                                    {{ Form::open(['method' => 'delete', 'route' => ['panel_users_delete', $user->user_id], 'class' => 'pull-right']) }}
                                        {{ Form::button('<i class="fas fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger']) }}
                                    {{ Form::close() }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                {{-- Pagination prev & next buttons --}}
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
