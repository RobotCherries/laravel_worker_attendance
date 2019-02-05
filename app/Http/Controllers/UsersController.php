<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Users;
use App\Clockings;

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
        $users = DB::table('users')->orderBy('user_id', 'asc')
        ->join('departments', 'users.department_id', '=', 'departments.department_id')
        ->join('functions', 'users.function_id', '=', 'functions.function_id')
        ->select('users.*', 'departments.department_name', 'functions.function_name')
        ->simplePaginate(10);
        $current_user = Auth::user();

        return view('dashboard.users.index', compact('current_user', 'users'));
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
        $user = Users::findOrFail($id);
        $user_role = DB::table('user_roles')->where('user_role_id', $user->user_role_id)->value('user_role');
        $user_department = DB::table('departments')->where('department_id', $user->department_id)->value('department_name');
        $user_function = DB::table('functions')->where('function_id', $user->function_id)->value('function_name');

        return view('dashboard.users.show', compact('user', 'user_role', 'user_department', 'user_function'));
    }

    /**
     * Create clockings.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function clockings($id)
    {
        $user = Users::findOrFail($id);
        $user_role_id = DB::table('departments')->where('department_id', $user->department_id)->value('department_id');
        $user_department_id = DB::table('departments')->where('department_id', $user->department_id)->value('department_id');
        $user_function_id = DB::table('functions')->where('function_id', $user->function_id)->value('function_id');
        
        $user_role = DB::table('user_roles')->where('user_role_id', $user->user_role_id)->value('user_role');
        $user_department = DB::table('departments')->where('department_id', $user->department_id)->value('department_name');
        $user_function = DB::table('functions')->where('function_id', $user->function_id)->value('function_name');
        
        $clocking_types = DB::table('clocking_types')->select(DB::raw("CONCAT(clocking_type_tag, ' - ', clocking_type) AS clocking_type, clocking_type_id"))->pluck('clocking_type', 'clocking_type_id');
        $clockings = DB::table('clockings')->where('user_id', $id)
                                           ->join('clocking_types', 'clockings.clocking_type_id', '=', 'clocking_types.clocking_type_id')
                                           ->select('clockings.*', 'clocking_types.clocking_type_tag')
                                           ->orderBy('clocking_date', 'asc')
                                           ->simplePaginate(3);

        return view('dashboard.users.clocking', compact('id', 'user', 'user_role_id', 'user_department_id', 'user_function_id', 'user_role', 'user_department', 'user_function', 'clocking_types', 'clockings'));
    }

    /**
     * Store clockings.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function clockings_store($id)
    {
        // Validation
        $rules = array(
            'user' => 'required|numeric',
            'user_role' => 'required|numeric',
            'department' => 'required|numeric',
            'function' => 'required|numeric',

            'clocking_type' => 'required|numeric|min:1',
            'clocking_date' => 'required|date',
            'clocking_hours' => 'required|numeric',
            
            'clocking_presence' => 'required|boolean',
            'clocking_overtime' => 'required|boolean',
            'clocking_weekend' => 'required|boolean',
        );
        $validator = Validator::make(Input::all(), $rules);

        // Process validation
        if ($validator->fails()) {
            return Redirect::to('panou/muncitori/' . $id . '/pontare')
                ->withErrors($validator)
                ->withInput(Input::all());
        } else {
            // store
            $clocking = new Clockings;
            $clocking->user_id           = Input::get('user');
            $clocking->user_role_id      = Input::get('user_role');
            $clocking->department_id     = Input::get('department');
            $clocking->function_id       = Input::get('function');
            $clocking->clocking_type_id  = Input::get('clocking_type');

            $clocking->clocking_date     = Input::get('clocking_date');
            $clocking->clocking_hours    = Input::get('clocking_hours');

            $clocking->clocking_presence = Input::get('clocking_presence');
            $clocking->clocking_overtime = Input::get('clocking_overtime');
            $clocking->clocking_weekend  = Input::get('clocking_weekend');
            $clocking->save();

            // redirect
            Session::flash('message', 'Pontaj adăugat cu success!');
            return back();
        }
    }

    /**
     * Remove clocking from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function clockings_destroy($id, $clocking_id)
    {
        // Delete
        $clocking = DB::table('clockings')->where('clocking_id', $clocking_id);
        $clocking->delete();

        // redirect
        Session::flash('message', 'Pontajul a fost șters cu success!');
        return redirect()->route('panel_users_clockings', $id);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Users::findOrFail($id);
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
            $user = Users::find($id);
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
        $user = Users::findOrFail($id);
        $user->delete();

        // redirect
        Session::flash('message', 'Angajatul a fost șters cu success!');
        return redirect()->route('panel_users');
    }
}
