<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
       return Student::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'FirstName' => 'required', 
            'LastName' => 'required',
            'Section' => 'required'
        ]
        );
        return Student::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return Student::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $student=Student::find($id);
        $student->update($request->all());
        return $student;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        return Student::destroy($id);
    }
    public function search($name)
    {

        return Student::where('FirstName', 'like', '%'.$name.'%')->orwhere('LastName', 'like', '%'.$name.'%')->get();
    }
}
