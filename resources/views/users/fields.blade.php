    <div class="form-group col-sm-12 col-md-6">
        {!! Form::label('name', 'Nombre:', ['class' => 'bold']) !!}
        {!! Form::text('name', null, ['class' => 'form-control round']) !!}
        
    </div>
       <div class="form-group col-sm-12 col-md-6">
        {!! Form::label('email', 'Corro Electronico:', ['class' => 'bold']) !!}
        {!! Form::text('email', null, ['class' => 'form-control round']) !!}
        
    </div>
    





                <div class="input-group mb-3">
                    <input type="password"
                           name="password"
                           class="form-control @error('password') is-invalid @enderror"
                           placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input type="password"
                           name="password_confirmation"
                           class="form-control"
                           placeholder="Retype password">
                    <div class="input-group-append">
                        <div class="input-group-text"><span class="fas fa-lock"></span></div>
                    </div>
                </div>

                   <div class="col-12 col-md-6">
        <div class="form-group">
            {!! Form::label('rol', 'Rol:', ['class' => 'bold']) !!}
            {!! Form::select('rol', $roles,isset($user) ? $user->roles()->pluck('id'):[], ['class' => 'form-control round','placeholder' =>'Ingrese rol'], ['id' => 'disabledInput'],['disabled']) !!}
        </div>
    </div>