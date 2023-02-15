<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRolesRequest;
use App\Http\Requests\UpdateRolesRequest;
use App\Repositories\RolesRepository;
use App\Repositories\PermissionsRepository;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class RolesController extends AppBaseController
{
    /** @var RolesRepository $rolesRepository*/
    private $rolesRepository;

     /** @var PermissionsRepository $rolesRepository*/
    private $permissionsRepository;

    public function __construct(RolesRepository $rolesRepo,
    PermissionsRepository $permissionsRepo
    )
    {
        $this->middleware('auth');

        $this->rolesRepository = $rolesRepo;
        $this->permissionsRepository = $permissionsRepo;
    }

    /**
     * Display a listing of the Roles.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $roles = $this->rolesRepository->all();

        return view('roles.index')
            ->with('roles', $roles);
    }

    /**
     * Show the form for creating a new Roles.
     *
     * @return Response
     */
    public function create()
    {
        $permissions = $this->permissionsRepository->pluck('name','id');


        return view('roles.create')->with('permissions', $permissions);
    }

    /**
     * Store a newly created Roles in storage.
     *
     * @param CreateRolesRequest $request
     *
     * @return Response
     */
    public function store(CreateRolesRequest $request)
    {
        $input = $request->all();
        $input['guard_name']="web";


        $role = new Role;
        $role->name= $input['name'];
        $role->guard_name = $input['guard_name'];
        $role->save();
        $role->syncPermissions($request->permissions);

         Flash::success('Roles saved successfully.');


        return redirect(route('roles.index'));
    }

    /**
     * Display the specified Roles.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $roles = $this->rolesRepository->find($id);

        if (empty($roles)) {
             Flash::error('Roles not found');

            return redirect(route('roles.index'));
        }

        return view('roles.show')->with('roles', $roles);
    }

    /**
     * Show the form for editing the specified Roles.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $roles = $this->rolesRepository->find($id);
        $permissions = $this->permissionsRepository->pluck('name','id');


        if (empty($roles)) {
             Flash::error('Roles not found');


            return redirect(route('roles.index'));
        }

        return view('roles.edit')->with('roles', $roles)->with('permissions', $permissions);
    }

    /**
     * Update the specified Roles in storage.
     *
     * @param int $id
     * @param UpdateRolesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRolesRequest $request)
    {
        $roles = $this->rolesRepository->find($id);
          $roles->permissions()->detach();

        $roles->syncPermissions($request->permissions);


        if (empty($roles)) {
            Flash::error('Roles not found');


            return redirect(route('roles.index'));
        }

        $roles = $this->rolesRepository->update($request->all(), $id);

         Flash::success('Roles updated successfully.');

        return redirect(route('roles.index'));
    }

    /**
     * Remove the specified Roles from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $roles = $this->rolesRepository->find($id);

        if (empty($roles)) {
             Flash::error('Roles not found');


            return redirect(route('roles.index'));
        }

        $this->rolesRepository->delete($id);

        Flash::success('Roles deleted successfully.');


        return redirect(route('roles.index'));
    }
}
