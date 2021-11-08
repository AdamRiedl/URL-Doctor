<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{

    public function show(Request $request, User $admin)
    {
        return $admin;
    }

    public function store(Request $request)
    {

        Validator::make($request->all(),[
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users','email')
            ],
            'date_of_birth' => 'required|date',
            'password' => 'required|string|min:6'
        ]);
        User::create([

            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'date_of_birth' => $request->date_of_birth,
            'password' => Hash::make($request->password)
        ]);

        return response()->json('OK',200);
    }

    public function update(Request $request, User $user)
    {

    }
}
