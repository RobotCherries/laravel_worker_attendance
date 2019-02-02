@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-header">Dashboard</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <h1>Users View</h1>
                
                <table class="table table table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Full name</th>
                            <th scope="col">Department</th>
                            <th scope="col">Function</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <th><a href="{{ route('panel_users_show', $user->user_id) }}">{{ $user->user_id }}</a></th>
                        <td><a href="{{ route('panel_users_show', $user->user_id) }}">{{ $user->first_name }} {{ $user->last_name }}</a></td>
                        <td>{{ $user->department_name }}</td>
                        <td>{{ $user->function_name }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
