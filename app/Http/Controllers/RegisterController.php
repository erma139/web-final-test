<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tutor;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register() {
        return view('register');
    }
    
    public function postRegister(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:tutors',
            'phone' => 'required',
            'address' => 'required',
            'state' => 'required',
            'password' => 'required|min:8',
        ]);
        $data = $request->all();
        $check = $this->create($data);
        $check->save();
        return redirect('register')->with('success', 'Your account has been created successfully.')->withErrors('fail', 'Something went wrong, try again!');
    }

    public function create(array $data) {
        return Tutor::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'state' => $data['state'],
            'password' => Hash::make($data['password'])
        ]);
    }
}
