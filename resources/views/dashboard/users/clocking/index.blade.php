
    {{-- Users table --}}
    <div class="clockings-table__container">
        <table class="table table-striped table-hover table-sm">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tip</th>
                    <th scope="col">Dată pontaj</th>
                    <th scope="col">Ore</th>
                    <th scope="col">Supl</th>
                    <th scope="col">Prez</th>
                    <th scope="col">Weekend</th>
                    <th scope="col">Acțiuni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clockings as $key => $value)
                    <tr>
                        <th class="align-middle p-1 text-center text-black-50">{{ $key + 1 }}</th>
                        <td class="align-middle p-1">{{ $value->clocking_type_tag }}</td>
                        <td class="align-middle p-1">{{ $value->clocking_date }}</td>
                        <td class="align-middle p-1">{{ $value->clocking_hours }}</td>
                        <td class="align-middle p-1">{{ $value->clocking_overtime }}</td>
                        <td class="align-middle p-1">{{ $value->clocking_presence }}</td>
                        <td class="align-middle p-1">{{ $value->clocking_weekend }}</td>
                        <td class="align-middle p-1">
                            {{ Form::open(['method' => 'delete', 'route' => ['panel_users_clockings_delete', $id, $value->clocking_id], 'class' => 'pull-right']) }}
                                {{ Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger text-light']) }}
                            {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        {{-- Pagination prev & next buttons --}}
        <div class="d-flex justify-content-center">{{ $clockings->links() }}</div>
    </div>