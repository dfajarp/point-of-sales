<?php

namespace App\Http\Controllers;

use App\Models\PermissionModel;
use App\Models\PermissionRoleModel;
use App\Models\RoleModel;
use Auth;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function list()
    {
        $permission_role = PermissionRoleModel::getPermission('Role', Auth::user()->role_id);
        if (empty($permission_role)) {
            abort(404);
        }

        $data['permission_add'] = PermissionRoleModel::getPermission('Add Role', Auth::user()->role_id);
        $data['permission_edit'] = PermissionRoleModel::getPermission('Edit Role', Auth::user()->role_id);
        $data['permission_delete'] = PermissionRoleModel::getPermission('Delete Role', Auth::user()->role_id);

        $data['getRecord'] = RoleModel::getRecord();
        return view('panel.role.list', $data);
    }

    public function add()
    {
        $permission_role = PermissionRoleModel::getPermission('Add Role', Auth::user()->role_id);
        if (empty($permission_role)) {
            abort(404);
        }

        $getPermission = PermissionModel::getRecord();
        $data['getPermission'] = $getPermission;
        return view('panel.role.add', $data);

    }

    public function insert(Request $request)
    {

        $permission_role = PermissionRoleModel::getPermission('Add Role', Auth::user()->role_id);
        if (empty($permission_role)) {
            abort(404);
        }

        $save = new RoleModel;
        $save->name = $request->name;
        $save->save();

        PermissionRoleModel::InsertUpdateRecord($request->permission_id, $save->id);

        return redirect('panel/role')->with('success', 'Role successfully created');
    }

    public function edit($id)
    {

        $permission_role = PermissionRoleModel::getPermission('Edit Role', Auth::user()->role_id);
        if (empty($permission_role)) {
            abort(404);
        }

        $data['getRecord'] = RoleModel::getSingle($id);

        $data['getPermission'] = PermissionModel::getRecord();
        $data['getRolePermission'] = PermissionRoleModel::getRolePermission($id);
        return view('panel.role.edit', $data);

    }

    public function update($id, Request $request)
    {

        $permission_role = PermissionRoleModel::getPermission('Edit Role', Auth::user()->role_id);
        if (empty($permission_role)) {
            abort(404);
        }

        $save = RoleModel::getSingle($id);
        $save->name = $request->name;
        $save->save();

        PermissionRoleModel::InsertUpdateRecord($request->permission_id, $save->id);

        return redirect('panel/role')->with('success', 'Role successfully updated');
    }

    public function delete($id)
    {

        $permission_role = PermissionRoleModel::getPermission('Delete Role', Auth::user()->role_id);
        if (empty($permission_role)) {
            abort(404);
        }

        $save = RoleModel::getSingle($id);
        $save->delete();

        return redirect('panel/role')->with('success', 'Role successfully deleted');
    }
}
