<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class rolesController extends Controller
{
    public function index(){
        $roles = Role::all();
        return view('auth.roles', compact('roles'));
    }

    public function delete($id){
        try {
            $role = Role::findOrFail($id);
            $role->delete();

            return redirect()->back()->with('msg', 'Role deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete role. Please try again.');
        }
    }

    public function edit($id){
        $role = Role::find($id);
        $permissions = Permission::all();
        return view('auth.editRole', compact('role', 'permissions'));
    }

    public function update(request $req, $id){
        $req->validate([
            'name' => "required|unique:roles,name," . $id,
        ]);

        $role = Role::find($id);
        $role->name = $req->name;
        $role->save();

        return back()->with('msg', "Role updated");
    }

    public function assignPermissions(request $req, $id){
        $role = Role::findOrFail($id);
        $permissions = $req->input('permissions', []);

        $role->syncPermissions($permissions);

        return redirect()->back()->with('msg', 'Permissions updated successfully.');
       }
}
