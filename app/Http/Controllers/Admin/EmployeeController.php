<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use \DB, Session, Crypt, Hash;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();

        return view('admin.employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = DB::table('companies')->select('id', 'company_name')->get();

        return view('admin.employees.create-employee', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dadosEmpregado = $request->all();
        echo '<pre>';
        print_r($dadosEmpregado);
        echo '</pre>';

        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'first-name'  => 'required',
            'last-name'   => 'required',
            'company'     => 'required',
            'email'       => 'required',
            'phone'       => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        $this->validate($request, [
            'first-name'  => 'required',
            'last-name'   => 'required',
            'company'     => 'required',       
            'email'       => 'required',
            'phone'       => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            // store
            $employee = new Employee;
            $employee->employees_first_name = Input::get('first-name');
            $employee->employees_last_name = Input::get('last-name');
            $employee->company_id = Input::get('company');
            $employee->employees_email = Input::get('email');
            $employee->employees_phone = Input::get('phone');

            $employee->save();

            // redirect
            Session::flash('message', 'Employee registration success!');
            return Redirect::to(route('admin.employees'));
            
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
    public function destroy($id)
    {
        //
    }
}
