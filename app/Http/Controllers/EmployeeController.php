<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Empty_;
use Illuminate\Support\Facades\Session;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::orderby('id','desc')->paginate(10);
        return view('crud.index', ['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([ 
            'name' => 'required|regex:/^[A-Za-z\s]+$/|min:7',
            'email' => 'required|unique:employee,email',
            'gender' => 'required',
            'address' => 'required',
            'dob' => 'required',
            'salary' => 'required|min:1',
        ]);
        $employee = new Employee;
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->gender = $request->gender;
        $employee->address = $request->address;
        $employee->dob = $request->dob;
        $employee->age = $request->age;
        $employee->salary = $request->salary;
        $employee->save();
        return redirect()->route('employee.index');
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
        $employee = Employee::find($id);
        return view('crud.edit', ['employee' => $employee]);
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
        $validateData = $request->validate([
            'name' => 'required|regex:/^[A-Za-z\s]+$/',
            'email' => 'required|unique:employee,email',
            'gender' => 'required',
            'address' => 'required',
            'dob' => 'required',
            'salary' => 'required',

        ]);
        $employee = Employee::find($id);
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->gender = $request->gender;
        $employee->address = $request->address;
        $employee->dob = $request->dob;
        $employee->age = $request->age;
        $employee->salary = $request->salary;
        $employee->save();
        Session::flash('message', 'Employee Record Updated Successfully');
        Session::flash('class', 'success');
        return redirect()->route('employee.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        Session::flash('message', 'Employee Record Deleted Successfully');
        Session::flash('class', 'danger');
      return  redirect()->route('employee.index');
    }
}
