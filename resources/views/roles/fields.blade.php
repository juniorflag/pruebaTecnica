
    <!-- Name Field -->
    <div class="form-group col-sm-12 col-md-6">
        {!! Form::label('name', 'Nombre:', ['class' => 'bold']) !!}
        {!! Form::text('name', null, ['class' => 'form-control round']) !!}
    </div>

  

    <!-- Permissions -->
    <div class="form-group col-sm-12 col-md-6">
        {!! Form::label('permissions', 'Permisos:', ['class' => 'bold']) !!}
        {!! Form::select('permissions', $permissions, null,
        ['required'=>'required','multiple'=>'multiple','name'=>'permissions[]','class' => ' form-control round', 'id'=>'permisos'] ) !!}
    </div>




