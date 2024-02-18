<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Employee;

class EmployeeController extends Controller
{
    //
    public function index(){
        $employees = Employee::all();
        return view("employee.index",compact("employees"));
    }
    public function create(){
        return view("employee.create");
    }
    public function store(Request $request){
        $this->validate($request, [
            'name'=> 'required|min:5|max:20',
            'age'=> 'required|numeric|min:21',
            'address'=> 'required|min:10|max:40',
            'phone'=> 'required|regex:/^08[0-9]{7,10}$/'
        ]);

        $slug=Str::slug($request->name);
        
        Employee::create([
            'name'=> $request->name,
            'slug'=> $slug,
            'age'=> $request->age,
            'address'=> $request->address,
            'phone'=> $request->phone
        ]);

        return redirect()->route('employee.index');

    } 

    public function show($slug){
      $employee = Employee::where('slug',$slug)->first();
      return view('employee.show',compact('employee'));
    }

    public function edit($slug){
        $employee = Employee::where('slug',$slug)->first();
        return view('employee.edit',compact('employee'));
    }

    public function update(Request $request, $slug){
        $this->validate($request, [
            'name'=> 'required|min:5|max:20',
            'age'=> 'required|numeric|min:21',
            'address'=> 'required|min:10|max:40',
            'phone'=> 'required|regex:/^08[0-9]{7,10}$/'
        ]);

        $employee = Employee::where('slug',$slug)->first();
        $slug=Str::slug($request->name);
        $employee->update([
            'name'=> $request->name,
            'slug'=> $slug,
            'age'=> $request->age,
            'address'=> $request->address,
            'phone'=> $request->phone
        ]);
        
        return redirect()->route('employee.index');
    }

    public function delete($slug){
        $employee = Employee::where('slug',$slug)->first();
        $employee->delete();
        return redirect()->route('employee.index');
    }

}
