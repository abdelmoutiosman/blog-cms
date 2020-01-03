<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\User;
use App\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:super_admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records=User::where('admin',0)->get();
        return view('users.index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=Role::all();
        return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|unique:users,name',
            'email'=>'required',
            'password'=>'required|confirmed',
            'roles_list'=>'required'
        ]);
        $request->merge(['password' => bcrypt($request->password)]);
        $user=User::create($request->all());
        $user->save();
        $user->attachRole($request->roles_list);
        flash()->success("Added Successfuly");
        return redirect()->route('user.index');
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
        $model=User::find($id);
        return view('users.edit',compact('model'));
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
        $this->validate($request,[
            'name'=>'required|unique:users,name,'.$id,
            'email'=>'required',
            'password'=>'required|confirmed',
            'roles_list'=>'required|array|min:1'
        ]);
        $user=User::findOrFail($id);
        $user->syncRoles($request->roles_list);
        $request->merge(['password' => bcrypt($request->password)]);
        $user->update($request->all());
        flash()->success("Edited Successfuly");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();
        flash()->success("Deleted Successfuly");
        return redirect(route('user.index'));
    }
    public function admin($id)
    {
        $user=User::find($id);
        $user->admin=1;
        $user->save();
        return redirect()->back();
    }
    public function notadmin($id)
    {
        $user=User::find($id);
        $user->admin=0;
        $user->save();
        return redirect()->back();
    }
}
