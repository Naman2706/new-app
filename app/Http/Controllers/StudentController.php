<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{


	public function __construct()
	{
	    $this->middleware('auth');
	}

    public function index(){

    		$students = Student::all();

    		return view('student.index',[
    			'students' => $students,
    			'message'=>"",
                'flag'=>""
    		]);
    }

    public function create(){

    		return view('student.create');
    }


    public function show($id){

    		$student = Student::find($id);

    		
    		return view('student.show' ,[
    			'student' => $student,
    			'temp'=>1
    		]
    	);
    }

    public function store(){

    		$student = new Student();

    		$student->name = request('name');
    		$student->email = request('email');
    		$student->address = request('address');
    		$student->contactno = request('contactno');
    		$student->percentage = request('percentage');

    		$student->save();

            $students = Student::all();


    		return view('student.index',[
                'students' => $students,
                'message'=>"",
                'flag'=>""
            ]);
    }

     public function destroy($id){


     		$student = Student::findorfail($id);
     		$student->delete();

            $students = Student::all();

    		return view('student.index' ,[
                'students' => $students,
                'message'=>"Data Deleted Successfully!!",
                'flag'=>"Delete"
            ]
        );
    }

    public function update($id){

    		$student = Student::findorfail($id);

    		$student->name = request('name');
    		$student->email = request('email');
    		$student->address = request('address');
    		$student->contactno = request('contactno');
    		$student->percentage = request('percentage');

    		$student->save();


    		$students = Student::all();


    		return view('student.index' ,[
    			'students' => $students,
    			'message'=>"Data Updated Successfully!!",
                'flag'=>"Update"
    		]
    	);


}

}
