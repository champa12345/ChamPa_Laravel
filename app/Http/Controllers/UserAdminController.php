<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\PasswordReset;
use App\Http\Requests\UserRequest;
use Carbon\Carbon;
use Hash;

class UserAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(config('app.paginates'));

        return view('admin.users.listUser', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        if ($req->hasFile('avatar')) {
            $file = $req->file('avatar');
            $name = $file->getClientOriginalName();
            $nameAva = str_random(4) . "_". $name;
            $file->move(config('app.link_users'), $nameAva);
            $user->avatar = $nameAva;
        }
        else {
            $user->avatar = "";
        }


        $user->name = $req->Username;
        $user->phone = $req->Phone;
        $user->address = $req->Address;
        $user->note = $req->Note;
        $user->role = $req->role;

        if (isset($req->Password)) {
            $user->password = bcrypt($req->Password);
        }
        $user->save();

        return redirect('listusers.edit' . $id)->with('message', trans('home_admin.success'));
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
         $user = new User;
        $user->name = $req->Username;
        $user->email = $req->Email;
        $user->password = bcrypt($req->Password);
        $user->phone = $req->Phone;
        $user->address = $req->Address;
        $user->note = $req->Note;
        $user->role = $req->role;

        if ($req->hasFile('avatar')) {
            $file = $req->file('avatar');
            $name = $file->getClientOriginalName();
            $nameAva = str_random(4)."_".$name;
            $file->move(config('app.link_users'), $nameAva);
            $user->avatar = $nameAva;
        }
        else {
            $user->avatar = "";
        }
        $user->save();

        return redirect('listuser.index')->with('message', trans('home_admin.success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::destroy($id);
        
        return redirect('listusers.index')->with('message', trans('home_admin.success'));
    }
}
