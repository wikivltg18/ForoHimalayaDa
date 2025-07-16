<?php

namespace App\Http\Controllers\Desarrollo\Permisos;

use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Role;

class permissionsController
{
    public function index(Request $request){
        $roles = Role::all();
        $selectRoleId = $request->query('selected_role', $roles->first()->id ?? null);
        $role = Role::find($selectRoleId);
        $permisos = Permission::all();
        $nameRoute= \Route::currentRouteName();
        return view('Desarrollo.Permisos.permisos',compact('nameRoute','permisos','roles','role'));

    }

    public function assignPermissions(Request $request, String $id)
    {
        $validatedData = $request->validate([
            'permissions' => 'required|array',
            'permissions.*' => 'exists:permissions,id',
        ]);

        $role = Role::findOrFail($id);

        $role->permissions()->sync($validatedData['permissions']);

        return redirect()->route('Roles')->with('success', 'Permisos asignados correctamente.');
    }

}
