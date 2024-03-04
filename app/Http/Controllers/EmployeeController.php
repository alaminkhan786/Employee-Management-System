<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_employee()
    {
        return view('employees.create_employee');
    }

    public function store_employee(Request $request)
    {
        try {
            $data_insert = Employees::create([
                'employee_id' => $request->employee_id,
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,
                'salary' => $request->salary,
                'created_by' => Auth::user()->id,
            ]);
            return redirect()->route('create.employee')->with('success', "Employee Added Successfully");
        } catch (\Exception $e) {
            return redirect()->route('create.employee')->with('fail', "Employee Add Failed");
        }
    }

    public function employee_list()
    {
        $employees = Employees::all();
        return view('employees.employee_list', compact('employees'));
    }

    public function employee_edit($id)
    {
        $employee = Employees::find($id);
        return view('employees.employee_edit', compact('employee', 'id'));
    }

    public function employee_update(Request $request, $id)
    {
        try {
            $data = Employees::find($id);
            $data->employee_id = $request->employee_id;
            $data->name = $request->name;
            $data->phone = $request->phone;
            $data->email = $request->email;
            $data->address = $request->address;
            $data->salary = $request->salary;
            $data->save();

            return redirect()->route('employee.edit', $id)->with('success', "Employee Updated Successfully");
        } catch (\Exception $e) {
            return redirect()->route('employee.edit', $id)->with('fail', "Employee Update Failed");
        }
    }

    public function employee_delete($id)
    {
        try {
            $data = Employees::find($id);
            $data->delete();

            return redirect()->route('employee.list')->with('success', "Employee Deleted Successfully");
        } catch (\Exception $e) {
            return redirect()->route('employee.list')->with('fail', "Employee Delete Failed");
        }
    }
}
