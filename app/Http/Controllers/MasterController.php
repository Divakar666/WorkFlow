<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use App\Models\Designation;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function Departments(){
        $departments = Departments::where('is_active', 1)->get()->toArray();
        return view('Departments/list',['departments'=>$departments]);
    }
    public function store_department(Request $request){
        $input=$request->all();
        unset($input['_token']);
        $id=Departments::updateOrInsert(
            ['id' => $request->id],
            $input
        );
        if ($id) {
            return redirect('departments')->with('success', "Department Stored successfully.");
        } else {
            return redirect()->back()->withErrors(['error' => ['Insert Error']]);
        }
    }

    public function deleteDepartment(Request $request)
    {
        $id = $request->id;
        $department_update = Departments::where("id", $id)->update(["is_active" => 0]);
        echo json_encode($department_update);
    }


    public function Designation(){
        $designation = Designation::where('is_active', 1)->get()->toArray();
        return view('Designation/list',['designation'=>$designation]);
    }
    public function store_designation(Request $request){
        $input=$request->all();
        unset($input['_token']);
        $id=Designation::updateOrInsert(
            ['id' => $request->id],
            $input
        );
        if ($id) {
            return redirect('designation')->with('success', "Designation Stored successfully.");
        } else {
            return redirect()->back()->withErrors(['error' => ['Insert Error']]);
        }
    }

    public function deleteDesignation(Request $request)
    {
        $id = $request->id;
        $designation_update = Designation::where("id", $id)->update(["is_active" => 0]);
        echo json_encode($designation_update);
    }

}
