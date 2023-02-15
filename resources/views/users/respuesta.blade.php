@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Respuestas</h1>
                </div>
             
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
        <h2>Respuestas #1.</h2>
        <p class="px-2">Se instalo un paquete para la gestion de roles y permisos por lo tanto se crearon <br>
        los modelos, relaciones y tablas necesearias.
        </p>
        

            <h3 class="ml-5">Respuesta #1.1</h3>
            <p class="px-4">
                Se listan los usuarios con los roles 1 y 2.
                @foreach ($users as $user)

                <li class="px-5">{{ $user->name }}</li>
                    
                @endforeach
            </p>
        
            <h3 class="ml-5">Respuesta #1.2</h3>
            <p class="px-4">
                Se listan los permisos del rol 1

                @foreach ($roles->getPermissionNames() as $role )


                <li class="px-5">{{ $role }}</li>
                    
                @endforeach

            
            </p>

            <h3 class="ml-5">Respuesta #1.3</h3>
            <p class="px-4">
                Los roles que poseen el permiso numero dos son

                @foreach ($roleSegundoP as $r )


                <li class="px-5">{{ $r->name }}</li>
                    
                @endforeach
            </p>
            <p class="px-4">


                Los Usuario q poseen los roles listados.

                @foreach ($userRole as $key => $ur)
            

                <li class="px-5">{{ isset($ur[$key]->name) ? $ur[$key]->name :''}}</li>

              
                    
                @endforeach

            </p>

            
              <h2>Respuestas #2.</h2>
        <p class="px-2">Posee conocimientos basicos en el despliegues de aplicacione en la nube gestionando he instalando lo necesario para el funcionamiento <br>
        adecuado, los servidores que he tenido la oportunidad de gestionar son los siguientes droplet de digital oceam y instancias de aws. tambien he desplegado agunas aplicaciones <br>
        en Cpanel y direcAdmin.
        </p>

                   <h2>Respuestas #3.</h2>
        <p class="px-2">La respuesta es la A: ll.
        </p>

                    <h2>Respuestas #4.</h2>
        <p class="px-2">La solucion al error planteado fue cambiar la concatenacion con el signo + en el echo por un punto <br>


            @php
            $usuarios = array(
                array('nombre'=>'alex','apellido'=>'Escobar','telefono'=>'3212211222'),
                array('nombre'=>'jorge','apellido'=>'Gomez','telefono'=>'3212211222'),
                array('nombre'=>'gabriel','apellido'=>'Medina','telefono'=>'3212211222'),
                array('nombre'=>'jesus','apellido'=>'Mendez','telefono'=>'3212211222'),


           );
           foreach ($usuarios as $key => $usuario) {
            echo    $usuario['nombre']. ' ' .$usuario['apellido']. ' '.$usuario['telefono']." , ";
           }

                
            
            @endphp
        </p>
            
            



                <div class="card-footer clearfix">
                    <div class="float-right">
                        
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

