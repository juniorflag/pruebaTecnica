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

                @foreach ($userRole as $ur)


            

                <li class="px-5">{{ isset($ur[0]->name) ? $ur[0]->name :''}}</li>

              
                    
                @endforeach

            </p>

            
              <h2>Respuestas #2.</h2>
        <p class="px-2">Poseo conocimientos basicos en el despliegues de aplicacione en la nube gestionando he instalando lo necesario para el funcionamiento <br>
        adecuado, los servidores que he tenido la oportunidad de gestionar son los siguientes droplet de digital oceam y instancias de aws. tambien he desplegado agunas aplicaciones 
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

                   <h2>Respuestas #5.</h2>

                     <p class="px-2">
                        Se crearon todoas las funciones middleware solicitadas
                     </p>

                        <h3 class="ml-5">Explicacion del middleware #5.1</h3>

                        <p class="px-3">
                            Una vez logueado el usuario al tratar de ingresar a las rutas roles,permisos o users 
                            se somete a el middleware donde evaluo si existe algo en el campo email_verified_at de ser asi le muestra la ruta correspondiente si no le muestra una vista en donde <br>
                            le aparece un mensaje que verifique su email...la funcion verificar el email no funciona por la tanto la primera vez que se registre he inicie session no tendra nada <br>
                            en el campo email_verified_at para seguir evaluando el funciionamiento del sistema edite en base de datos la tabla users el usuario que acaba de registrar y agregue algo en ese campo .
                        </p>
                        <h3 class="ml-5">Explicacion del middleware #5.2</h3>

                        <p class="px-3">
                            se edito la tabla user para agregar dos campos una para determinar y dejar guardada la utima vez que el usuario inicio sesion
                            pero este campo se actualiza antes de que pase por el middleware por lo tanto se creo otro para y guardando alli el previous_conection antes de que lo actualizara el metodo <br>
                            por lo tanto es este ultimo campo que se usa en el middleware para redireccionar o no a la pagina de sesiones,


                        </p>

                         <h3 class="ml-5">Explicacion del middleware #5.3</h3>

                        <p class="px-3">
                            se deben cumplir los dos parametros para que funcione este middleware ,para ello una vez que se registre y edite la tabla email_verified_at <br>
                            podra acceder a la tabla users en el sistema puede editarlo en el boton edit y adentro puede seleccionar el rol 1 y asi podra hacer el testeo de este middleware
                      
                            

                        </p>

                          <h3 class="ml-5">Explicacion del middleware #5.4</h3>

                        <p class="px-3">
                            instale librerias y paquetes externos para cumplir esta tarea ,..cabe destacar que debido a que estan vinculados los usuarios registrados con mi google autenticador no podran acceder sin el otp
                            por eso ustedes deben gestionar su registro con la aplicacion google autenticador escanear el codigo y seguir los paso dura 30 minutos la sesion del codigo luego del paso de ese tiempo cada vez que inicie sesion le pedira el otp.
                            
                        </p>


            
            



                <div class="card-footer clearfix">
                    <div class="float-right">
                        
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

