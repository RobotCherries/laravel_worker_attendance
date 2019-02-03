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
                
                {{-- Users table --}}
                <table class="table table table-bordered table-hover">
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
                            <tr>
                                <td>
                                    <a href="{{ route('panel_users_show', $user->user_id) }}">
                                        {{ $user->user_id }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('panel_users_show', $user->user_id) }}">
                                        {{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}
                                    </a>
                                </td>
                                <td>{{ $user->department_name }}</td>
                                <td>{{ $user->function_name }}</td>
                                <td>
                                    <a href="#" class="btn btn-small btn-success">
                                        <i class="far fa-calendar-check"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('panel_users_edit', $user->user_id) }}" class="btn btn-small btn-warning">
                                        <i class="fas fa-user-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-small btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </a>
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
