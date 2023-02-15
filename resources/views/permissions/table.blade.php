<div class="table-responsive">
    <table class="table" id="permissions-table">
        <thead>
        <tr>
            <th >Nombre</th>

            
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($permissions as $permissions)
            <tr>
                <th>{{ $permissions->name }}</th>
                
                <td width="120">
                    {!! Form::open(['route' => ['permissions.destroy', $permissions->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('permissions.show', [$permissions->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('permissions.edit', [$permissions->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
