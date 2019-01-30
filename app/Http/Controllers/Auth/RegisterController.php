<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/acasa';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Send data to form for user to choose from.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $user_roles = DB::table('user_roles')->get();
        $departments = DB::table('departments')->get();
        $functions = DB::table('functions')->get();

        return view('auth.register')->with('user_roles', $user_roles)
                                    ->with('departments', $departments)
                                    ->with('functions', $functions);
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'user_role_id' => 'required|boolean',
            'department_id' => 'required|boolean',
            'function_id' => 'required|boolean',

            'first_name' => 'required|max:45',
            'middle_name' => 'nullable|max:45',
            'last_name' => 'required|max:45',

            'email' => 'required|email|max:128|unique:users',
            'password' => 'required|min:8|confirmed',
            
            'date_hired' => 'nullable|date',
            'active' => 'required|boolean',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'company_id' => isset($data['company_id']),
            'department_id' => isset($data['department_id']),
            'function_id' => isset($data['function_id']),

            'first_name' => $data['first_name'],
            'middle_name' => $data['middle_name'],
            'last_name' => $data['last_name'],

            'email' => $data['email'],
            'password' => bcrypt($data['password']),

            'date_hired' => isset($data['date_hired']),
            'active' => $data['1'],
        ]);
    }
}
