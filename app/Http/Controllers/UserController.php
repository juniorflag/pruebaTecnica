<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Roles;
use App\Repositories\RolesRepository;
use Spatie\Permission\Models\Role;
use App\Models\User;


use Illuminate\Http\Request;
use Flash;
use Response;

class UserController extends AppBaseController
{
    /** @var UserRepository $userRepository*/
    private $userRepository;

     /** @var RolesRepository $rolesRepository*/
    private $rolesRepository;

    public function __construct(UserRepository $userRepo,
     RolesRepository $rolesRepo
    )
    {
        $this->userRepository = $userRepo;
        $this->rolesRepository = $rolesRepo;

    }

    /**
     * Display a listing of the User.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $users = $this->userRepository->all();

        return view('users.index')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
            $roles = $this->rolesRepository->all()->pluck('name', 'id');

 return view('users.create')->with('roles', $roles);
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all();

        $user = $this->userRepository->create($input);
        $user->assignRole($input['rol']);

        Flash::success('User saved successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->find($id);
            $roles = $this->rolesRepository->all()->pluck('name', 'id');

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.edit')->with('user', $user)->with('roles',$roles);
    }

    /**
     * Update the specified User in storage.
     *
     * @param int $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        $user = $this->userRepository->find($id);
        $input= $request->all();

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $user = $this->userRepository->update($request->all(), $id);
        $user->roles()->detach();

            $user->assignRole($input['rol']);

        Flash::success('User updated successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('User deleted successfully.');

        return redirect(route('users.index'));
    }

    public function respuestas()
    {
        $users = User::whereHas("roles", function($q){ $q->where("name", "Role 1")->orWhere("name",'Role 2'); })->get();

        $roles = Role::find(1);
        $role = Role::all();

        $roleSegundoP=[];


        foreach($role as $r)
        {
            if($r->hasPermissionTo('Segundo Permiso'))
            {
                $roleSegundoP[]=$r;              
                $userRole []= User::role($r->name)->get();
              
            
            }   


        }

       


   

      

        return view('users.respuesta')->with('users',$users)->with('roles',$roles)->with('userRole',$userRole)->with('roleSegundoP',$roleSegundoP);
    }
}
