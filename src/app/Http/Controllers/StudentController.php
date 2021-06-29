<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //show all students
    public function index(){

        $students=Student::orderby('name', 'asc')->paginate();
        return view('students.index', ['students'=>$students]);

    }

    //create student
    public function create()
    {
        return view('students.create');
        
    }

    //add student to database
    public function insert(Request $request){

        $student=new Student();
        $student->name=$request->name;
        $student->email=$request->email;
        $student->birthday=$request->birthday;
        $student->save();
        return redirect()->route('students.index');

    }

    //update student
    public function edit(Student $student){

        return view('students.edit',['student'=>$student]);

    }

    //update student in database
    public function save(Request $request, Student $student){

        $student->name=$request->name;
        $student->email=$request->email;
        $student->birthday=$request->birthday;
        $student->save();
        return redirect()->route('students.index');

    }

    //delete student
    public function delete(Student $student){
                
        $student->delete();
        return redirect()->route('students.index');;

    }
    public function modal ($id){

        $students=student::orderby('name', 'asc')->paginate();
        return view('students.index', ['students'=>$students, 'id'=>$id]);

    }

    //remove student from database
    public function remove($id){

        $students=Student::orderby('name', 'asc')->paginate();
        return view('students.index', ['students'=>$students, 'id'=>$id]);

    }
}
