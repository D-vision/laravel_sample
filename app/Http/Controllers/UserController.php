<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller {

    protected $validationRules = [
        'name' => 'required|max:255',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'min:6|confirmed',
        'isAdmin' => 'boolean',
    ];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('can:admin');
    }

    public function index()
    {
        return view('users', ['users' => User::all()]);
    }

    public function create()
    {
        return view('userCreate');
    }

    public function store(Request $request)
    {
        $this->validationRules['password'] .= '|required';
        $this->validate($request, $this->validationRules);

        $user = User::create($request->all());
        return redirect()->route('user.show', ['user' => $user->id]);
    }

    public function show(User $user)
    {
        return view('user', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $this->validationRules['email'] .= ',email,' . $user->id;
        $this->validate($request, $this->validationRules);

        $user->update($request->all());
        return redirect()->route('user.show', ['user' => $user->id]);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index');
    }
}
