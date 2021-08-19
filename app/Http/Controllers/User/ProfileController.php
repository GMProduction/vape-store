<?php

namespace App\Http\Controllers\User;

use App\Helper\CustomController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends CustomController
{
    //

    public function index(){
        if (\request()->isMethod('POST')){
            $fieldPassword = $this->request->validate([
                'password' => 'required|string|confirmed',
            ]);

            $field          = $this->request->validate(
                [
                    'username' => 'required|string',
                    'nama'   => 'required|string',
                    'alamat' => 'required',
                    'no_hp'  => 'required',
                ]
            );
            $cekUser        = User::where([['id', '!=', Auth::id()], ['username', '=', $field['username']]])->first();
            if ($cekUser) {
                return response()->json(
                    [
                        "msg" => "The username has already been taken.",
                    ],
                    '201'
                );
            }
            $user = User::find(Auth::id());

            $user->update($field);
            if (strpos($fieldPassword['password'], '*') === false) {
                $user->update(
                    [
                        'password' => Hash::make($fieldPassword['password']),
                    ]
                );
            }

            return response()->json('berhasil', 200);
        }
        $user = User::find(Auth::id());
        return view('user.profil')->with(['data' => $user]);
    }
}
