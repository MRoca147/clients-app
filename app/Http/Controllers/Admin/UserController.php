<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SetPassRequest;
use App\Http\Requests\UserRequest;
use App\Mail\CompleteRegister;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $model)
    {
        return view('pages.users.index', ['users' => $model->paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = User::create($request->all());
        Mail::to($user->email)->send(new CompleteRegister($user));
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('pages.users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        if($request->password == ''){
            $user->update(['name' => $request->name, 'email' => $request->email]);
        }else{
            $inputs = $request->all();
            $inputs['password'] = Hash::make($request->password);
            $user->update($inputs);
        }
        return redirect()->route('users.edit', $user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }

    public function viewPassword(Request $request)
    {
        $user = User::where('email', $request->email)
        ->where('confirmed_token', $request->token)->first();
        return view('auth.completeRegister.setPassword', ['user' => $user]);
    }

    public function setPassword(SetPassRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->confirmed_token = null;
        $user->email_verified_at = Carbon::now()->toDateTimeString();
        $user->update();
        return redirect()->route('login');
    }
}
