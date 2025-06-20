<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*
        Vue tarafındaki resources/js/Pages/Users/Index.vue adlı
        bileşeni çalıştır ve içine bazı
         veriler gönder.
        */

        return Inertia::render("users/index", [
            "users" => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render("users/create", [
            "user" => new User()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
  public function store(Request $request)
{
    $request->validate([
        "name" => "required|string|max:255",
        "email" => "required|string|email|max:255|unique:users",
        "password" => "required|string|min:8|confirmed"
    ]);

    User::create([
        "name" => $request->name,
        "email" => $request->email,
        "password" => Hash::make($request->password),
    ]);

    return redirect()->route("users.index")->with("success", "Kullanıcı oluşturuldu.");
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


        return Inertia::render("users/edit", [
            "user" => User::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request->validate([
        "name" => "required|string|max:255",
        "email" => "required|string|email|max:255|unique:users",
    ]);

    $user= User::findOrFail($id);
    $user->name = $request->name;
    $user->email = $request->email;

    if($request->filled("password")) {
        $request->validate([
            "password" => "required|string|min:8|confirmed"
        ]);
        $user->password = Hash::make($request->password);
    }
    $user->save();

    return redirect()->route("users.index")->with("success", "Kullanıcı düzenlendi.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
