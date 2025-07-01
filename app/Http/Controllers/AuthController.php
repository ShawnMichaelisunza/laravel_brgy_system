<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    public function index()
    {
        $roles = Role::orderBy('created_at', 'DESC');
        return view('auth.auth', ['roles' => $roles->paginate(5)]);
    }

    public function create()
    {
        return view('auth.role-create');
    }

    public function store(Request $req)
    {
        $val = $req->validate([
            'name' => ['required'],
            'description' => ['required'],
        ]);

        $storeRole = new Role();
        $storeRole->name = strtolower($req->name);
        $storeRole->description = strtolower($req->description);
        $storeRole->givePermissionTo(
            $req->view_clearance,
            $req->create_clearance,
            $req->edit_clearance,
            $req->delete_clearance,

            $req->view_user,
            $req->create_user,
            $req->edit_user,
            $req->delete_user,

            $req->view_announcement,
            $req->create_announcement,
            $req->edit_announcement,
            $req->delete_announcement,

            $req->view_role,
            $req->create_role,
            $req->edit_role,
            $req->delete_role,
        );
        $storeRole->save();

        return redirect()->route('auth.index')->with('success', 'Created Role is Successfully !');
    }

    public function view($id)
    {
        $decrypt = decrypt($id);

        $role = Role::findOrFail($decrypt);
        return view('auth.role-view', ['role' => $role]);
    }

    public function edit($id)
    {
        $decrypt = decrypt($id);

        $role = Role::findOrFail($decrypt);
        return view('auth.role-edit', ['role' => $role]);
    }

    public function update($id, Request $req)
    {
        $decrypt = decrypt($id);
        $val = $req->validate([
            'name' => ['required'],
            'description' => ['required'],
        ]);

        $updateRole = Role::findOrFail($decrypt);
        $updateRole->name = strtolower($req->name);
        $updateRole->description = strtolower($req->description);
        $updateRole->syncPermissions(
            $req->view_clearance,
            $req->create_clearance,
            $req->edit_clearance,
            $req->delete_clearance,

            $req->view_user,
            $req->create_user,
            $req->edit_user,
            $req->delete_user,

            $req->view_announcement,
            $req->create_announcement,
            $req->edit_announcement,
            $req->delete_announcement,

            $req->view_role,
            $req->create_role,
            $req->edit_role,
            $req->delete_role,
        );

        $updateRole->update();
        $updateRole->save();

        return redirect()->route('auth.index')->with('success', 'Updated Role Successfully !');
    }

    public function destroy($id)
    {
        $decrypt = decrypt($id);
        $role = Role::findOrFail($decrypt);
        $role->delete();

        return redirect()->back()->with('success', 'Deleted Role is Successfully !');
    }
}
