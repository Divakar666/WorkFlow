<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function Employee()
    {
        $employees = Employee::where('is_active', 1)->get()->toArray();
        return view('Employeee/list', ['employees' => $employees]);
    }
    public function storeEmployee(Request $request)
    {
        $input = $request->all();
        unset($input['_token']);
        $id = Employee::updateOrInsert(
            ['id' => $request->id],
            $input
        );
        if ($id) {
            return redirect('employee')->with('success', "Employee Stored successfully.");
        } else {
            return redirect()->back()->withErrors(['error' => ['Insert Error']]);
        }
    }

    public function deleteEmployee(Request $request)
    {
        $id = $request->id;
        $employee_update = Employee::where("id", $id)->update(["is_active" => 0]);
        echo json_encode($employee_update);
    }
}
