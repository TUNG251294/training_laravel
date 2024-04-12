<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        if(Auth::check()){
            $users = User::all();
            return view('users.index', compact('users'));
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    } 

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        if(Auth::check()){
            return view('users.create');
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    } 
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUser $request) : RedirectResponse
    {
        $validated = $request->validated();
        $data = $request -> all();
        $data['password'] = Hash::make($request->password);
        User::create($data);
        return redirect('/users');
        // echo "success create user!";
        // dd($request->all());
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
        if(Auth::check()){
            $user = User::findOrFail($id);
            return view('users.update', compact('user'));
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    } 

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUser $request, string $id) : RedirectResponse
    {
        $user = User::findOrFail($id);
        $validated = $request->validated();
        $data = $request -> all();
        if ($request->has('password')) {
            $data['password'] = Hash::make($request->password);
        }
        $user->update($data);
        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {   
        if (Auth::check()) {
            $user = User::findOrFail($id);
            return view('users.delete', compact('user'));
        }
        
        return redirect("login")->with('error', 'You are not allowed to access');
    } 

    public function destroy(string $id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/users')->with('success', 'User deleted successfully');
    }
}
