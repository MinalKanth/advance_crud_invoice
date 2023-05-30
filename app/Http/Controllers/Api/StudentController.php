<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{

    //show all students
    public function index()
    {
        $students = Student::all();
        if ($students->count() > 0) {

            return response()->json([
                'status' => 200,
                'students' => $students
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Records Found'
            ], 200);
        }
    }

    //insert new student data
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191',
            'course' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'phone' => 'required|digits:10',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            $student  = Student::create([
                'name' => $request->name,
                'course' => $request->course,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);

            if ($student) {
                return response()->json([
                    'status' => 200,
                    'message' => "Student Created Successfully"
                ]);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => "Oops! Something went wrong."
                ]);
            }
        }
    }

    //show particular student
    public function show($id)
    {
        $student = Student::find($id);
        if ($student) {
            return response()->json([
                'status' => 200,
                'students' => $student
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No such Student Records Found'
            ], 200);
        }
    }

    //edit particular student
    public function edit($id)
    {
        $student = Student::find($id);
        if ($student) {
            return response()->json([
                'status' => 200,
                'students' => $student
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No such Student Records Found !"
            ], 200);
        }
    }

    //update particular student
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191',
            'course' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'phone' => 'required|digits:10',
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            $student  = Student::find($id);
            if ($student) {

                $student->update([
                    'name' => $request->name,
                    'course' => $request->course,
                    'email' => $request->email,
                    'phone' => $request->phone,
                ]);
                return response()->json([
                    'status' => 200,
                    'message' => "Student Updated Successfully"
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => "No such Student Records Found !"
                ]);
            }
        }
    }
    public function destroy($id)
    {
        $student = Student::find($id);
        if ($student) {
            $student->delete();
            return response()->json([
                'status' => 200,
                'message' => "Student Record Deleted Successfully !"
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No such Student Records Found !"
            ]);
        }
    }

}
