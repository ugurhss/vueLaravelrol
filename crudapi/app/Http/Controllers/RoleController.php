<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          return Inertia::render("rol/index", [
            "rol" => Role::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render("rol/create", [
        "permi" => Permission::pluck("name", "id")->all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
        'name' => 'required|string|max:255|unique:roles,name',
        'permissions' => 'array',
        'permissions.*' => 'exists:permissions,id',
    ]);


    $role = Role::create(['name' => $validated['name']]);
dd($role);
    if (!empty($validated['permissions'])) {
        $role->syncPermissions($validated['permissions']);
    }

    return redirect()->route('rol.index')->with('success', 'Rol oluşturuldu.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
