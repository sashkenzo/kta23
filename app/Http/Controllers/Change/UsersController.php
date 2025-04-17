<?php

namespace App\Http\Controllers\Change;

use App\Http\Controllers\Controller;
use App\DataTables\UserDataTable;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UserDataTable $dataTable)
    {
        return $dataTable->render('dashboard.layouts.users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.layouts.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect(route('change.users',))->with('status','New user created successfully');
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
        $users = User::findOrFail($id);
        return view('dashboard.layouts.users.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $users = User::findOrFail($id);
        $users->fill($request->validate([
            'name' => ['required','string', 'max:255'],
            'role'=>['required','string'],
            'status'=>['required'],
        ]));
        $users->save();
        return redirect()->route('change.users')->with('status','User '.$users->email.' update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        return redirect()->route('change.users')->with('status','User '.$users->email.' deleted successfully');

    }
    public function changeStatusBtn(Request $request, string $id)
    {
        $users = User::findOrFail($id);
        $users->fill($request->validate([
            'status'=>['required'],]));
        $users->save();
        return redirect()->route('change.users')->with('status','User '.$users->email.' with ID '.$users->id.' status was updated successfully')->with('success','success');
    }
}
