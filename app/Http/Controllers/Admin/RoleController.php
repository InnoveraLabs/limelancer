<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Role;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class RoleController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('admin.roles.index'), Response::HTTP_FORBIDDEN, '403 forbidden');

        $roles = Role::with('permissions')->get();
        $totalRole = Role::all()->count();
        return view('admin.roles.index', compact('totalRole', 'roles'));
    }

    public function create()
    {
        abort_if(Gate::denies('admin.roles.create'), Response::HTTP_FORBIDDEN, '403 forbidden');

        $modules = Module::with('permissions')->get();

        return view('admin.roles.form', compact('modules'));
    }

    public function store(Request $request)
    {
        $request->validate([
           'name' => 'required|unique:roles',
            'permissions' => 'required|array',
            'permissions.*' => 'integer'
        ]);

        Role::create([
           'name' => $request->name,
           'slug' => Str::slug($request->name),
        ])->permissions()->sync($request->input('permissions'), []);

        return redirect()->route('admin.roles.index');
    }

    public function edit(Role $role)
    {
        $modules = Module::with('permissions')->get();

        return view('admin.roles.form', compact('modules', 'role'));
    }

    public function update(Request $request, Role $role)
    {
        $role->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        $role->permissions()->sync($request->input('permissions'), []);

        return redirect()->route('admin.roles.index');
    }
}
