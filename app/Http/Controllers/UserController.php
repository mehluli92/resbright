<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Contact;
use App\Role;
use Illuminate\Support\Facades\Hash;
use App\Events\UserRegistered;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $user = Auth::user();

        return view('users.index')->with('users', $users)
                                    ->with('user', $user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();

        return view('users.create')->with('user', $user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;

        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->role = $request->role;

        $user->password = Hash::make($request->mobile);

        $user->save();

        $message = "You have been registered on Resbright portal with success";

        event(new UserRegistered($user->email, $user->mobile, $user->name, $message));
        
        return redirect()->route('users.show', ['user' => $user->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        $contact = Contact::where('user_id', $id)->latest()->get();

        $roles = Role::all();
        return view('users.show')->with('user', $user)
                                 ->with('contact',$contact)
                                 ->with('roles', $roles); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->role = $request->role;

        $user->save();
        
        return redirect()->route('users.show', ['user' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        $user = Auth::user();

        return redirect()->route('users.index')->with('user', $user);
    }

    public function search(Request $request)
    {
         // Get the search value from the request
        $mobile = $request->input('mobile');

        // Search in the title and body columns from the posts table
        $user = User::query()
            ->where('email', 'LIKE', "%{$mobile}%")
            ->get();
        
        return back()->with('user', $user);
    }
}
