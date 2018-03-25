<?php

namespace App\Http\Controllers;

use App\RoleModel;
use App\User;
use App\UserModel;
use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{

    public function role(Request $request)
    {
        $user_id = $request->user_id;
        $role_id = $request->role_id;

        return (new User())->updateRole($user_id, $role_id);

    }


    public function index()
    {

        if (\Auth::check() && \Auth::user()->role_id == 1)

            return view('users.users', [
                "datas" => (new UserModel())->getUsers(),
                "roles" => (new RoleModel())->getRoles()
            ]);
    }

    public function edit()
    {
        $users = auth()->user();
        return view('users.userprofile', ['users' => $users]);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        $id = auth()->user()->id;
        $name = $request->name;
        $email = $request->email;
//        $phone = $request->phone;

        $password = $request->password == null ? auth()->user()->password : $request->password;
        $repassword = $request->repassword == null ? auth()->user()->password : $request->repassword;

        if ($password == $repassword) {
            if ((new User())->updateUserProfile($id, $name, $email, $password) == 1) {
                return redirect()->back()->with('status', 'Update Successfully');
            }
            return redirect()->back()->with('error', 'Faile to update');
        } else {
            return redirect()->back()->with('message', 'Password is not match');
        }
    }


}
