<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Users;
use App\Clockings;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class ClockingsController extends Controller
{
    /**
     * Display listing of the resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
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
                                           ->paginate(30);

        return view('dashboard.users.clocking.create', compact('id', 'user', 'user_role_id', 'user_department_id', 'user_function_id', 'user_role', 'user_department', 'user_function', 'clocking_types', 'clockings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    { 
        // Validation
        $rules = array(
            'user' => 'required|numeric',
            'user_role' => 'required|numeric',
            'department' => 'required|numeric',
            'function' => 'required|numeric',

            'clocking_type' => 'required|numeric|min:1',
            'clocking_date' => 'required|string|unique:clockings',
            'clocking_hours' => 'required|numeric',
            
            'clocking_presence' => 'required|boolean',
            'clocking_overtime' => 'required|boolean',
            'clocking_weekend' => 'required|boolean',
        );

        // Retrieve all form data
        foreach($_POST as $key => $val) { 

            $clockingDates = Input::get('clocking_date');

            echo 'Field name : '.$key .', Value : '.$val.'<br>'; 
            $data[$key] = $val;

        } 
        
        // Split input string and get the 2 dates
        $myArray = explode(' / ', $clockingDates);
        $start = Carbon::createFromFormat('Y-m-d', $myArray[0]);
        $end = Carbon::createFromFormat('Y-m-d', $myArray[1]);
        $period = [];
        $date = $start;
        
        // If the 2 dates differ
        if($start != $end) {
            // Retrieve all the dates between and filter out the weekend ones
            while ($date <= $end) {    
                if (!$date->isSaturday() && !$date->isSunday()) {
                    $period[] = $date->copy()->format('Y-m-d');
                }
                $date->addDays(1);
            }
        } else {
            while ($date <= $end) {    
                if (!$date->isSunday()) {
                    $period[] = $date->copy()->format('Y-m-d');
                }
                $date->addDays(1);
            }
        }

        $validator = Validator::make(Input::all(), $rules);

        // Process validation
        if ($validator->fails()) {
            return Redirect::to('panou/muncitori/' . $id . '/pontare')
                ->withErrors($validator)
                ->withInput(Input::all());
        } else {
            foreach($period as $key => $value) {
                // store
                $clocking = new Clockings;
                $clocking->user_id           = Input::get('user');
                $clocking->user_role_id      = Input::get('user_role');
                $clocking->department_id     = Input::get('department');
                $clocking->function_id       = Input::get('function');
                $clocking->clocking_type_id  = Input::get('clocking_type');
                if($clocking->clocking_date === null) {
                    $clocking->clocking_date     = $value;
                }
                $clocking->clocking_hours    = Input::get('clocking_hours');
                $clocking->clocking_presence = Input::get('clocking_presence');
                $clocking->clocking_overtime = Input::get('clocking_overtime');
                $clocking->clocking_weekend  = Input::get('clocking_weekend');
                $clocking->save();
            }

            // redirect
            Session::flash('message', 'Pontaj adăugat cu success!');
            return back();
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $clocking_id)
    {
        // Delete
        $clocking = DB::table('clockings')->where('clocking_id', $clocking_id);
        $clocking->delete();

        // redirect
        Session::flash('message', 'Pontajul a fost șters cu success!');
        return redirect()->route('panel_users_clockings', $id);
    }
}
