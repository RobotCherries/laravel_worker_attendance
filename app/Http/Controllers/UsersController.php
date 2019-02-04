<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\User;

class UsersController extends Controller
{

    /**
     * Require authentication in order to view page
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')
        ->join('departments', 'users.department_id', '=', 'departments.department_id')
        ->join('functions', 'users.function_id', '=', 'functions.function_id')
        ->select('users.*', 'departments.department_name', 'functions.function_name')
        ->simplePaginate(6);

        return view('dashboard.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $user_role = DB::table('user_roles')->where('user_role_id', $user->user_role_id)->value('user_role');
        $user_department = DB::table('departments')->where('department_id', $user->department_id)->value('department_name');
        $user_function = DB::table('functions')->where('function_id', $user->function_id)->value('function_name');

        return view('dashboard.users.show', compact('user', 'user_role', 'user_department', 'user_function'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function clocking($id)
    {
        $user = User::findOrFail($id);
        $user_department = DB::table('departments')->where('department_id', $user->department_id)->value('department_name');
        $user_function = DB::table('functions')->where('function_id', $user->function_id)->value('function_name');

        return view('dashboard.users.clocking', compact('user', 'user_department', 'user_function'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $user_department = DB::table('departments')->where('department_id', $user->department_id)->value('department_name');
        $user_function = DB::table('functions')->where('function_id', $user->function_id)->value('function_name');
        $departments = DB::table('departments')->orderBy('department_id', 'asc')->pluck('department_name', 'department_id');
        $functions = DB::table('functions')->where('department_id', $user->department_id)->pluck('function_name', 'function_id');

        return view('dashboard.users.edit', compact('id', 'user', 'user_department', 'user_function', 'departments', 'functions'));
    }

    /**
     * Get functions based on seleced department.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getFunctions($id, $department_id)
    {
        $functions = DB::table('functions')->where('department_id', $department_id)->pluck('function_name', 'function_id');
   
        return json_encode($functions);
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
        // Validation
        $rules = array(
            'department' => 'required|numeric',
            'function' => 'required|numeric',

            'first_name' => 'required|max:45',
            'middle_name' => 'nullable|max:45',
            'last_name' => 'required|max:45',

            'email' => 'required|email|max:128',
            'date_hired' => 'nullable|date',
            'active' => 'required|boolean',
        );
        $validator = Validator::make(Input::all(), $rules);

        // Process validation
        if ($validator->fails()) {
            return Redirect::to('panou/muncitori/' . $id . '/modifica')
                ->withErrors($validator)
                ->withInput(Input::all());
        } else {
            // store
            $user = User::find($id);
            $user->department_id  = Input::get('department');
            $user->function_id  = Input::get('function');

            $user->first_name  = Input::get('first_name');
            $user->middle_name = Input::get('middle_name');
            $user->last_name   = Input::get('last_name');

            $user->email       = Input::get('email');
            $user->date_hired  = Input::get('date_hired');
            $user->active      = Input::get('active');
            $user->save();

            // redirect
            Session::flash('message', 'Date angajat modificate cu success!');
            return Redirect::to('panou/muncitori');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Delete
        $user = User::findOrFail($id);
        $user->delete();

        // redirect
        Session::flash('message', 'Angajatul a fost șters cu success!');
        return redirect()->route('panel_users');
    }
}
