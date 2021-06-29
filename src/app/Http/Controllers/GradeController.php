<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    //show all Grades
    public function index(){

        $courses = Course::all();
        $students = Student::all();
        $teachers = Teacher::all();
        $grades=Grade::orderby('id', 'asc')->paginate();
        
        //return view('grades.index', ['grades'=>$grades], ['teachers'=>$teachers], ['courses'=>$courses], ['students'=>$students]);
        return view('grades.index',compact('courses','students', 'teachers', 'grades'));

    }

    //create Grade
    public function create()
    {

        $courses = Course::all();
        $students = Student::all();
        $teachers = Teacher::all();
        $grades=Grade::all();
        
      // return view('grades.create', ['grades'=>$grades], ['teachers'=>$teachers], ['courses'=>$courses], ['students'=>$students]);

       return view('grades.create',compact('courses','students', 'teachers', 'grades'));
        
    }

    //add Grade to database
    public function insert(Request $request){

        $grade=new Grade();
        $grade->id_course=$request->id_course;
        $grade->id_student=$request->id_student;
        $grade->id_teacher=$request->id_teacher;
        $grade->grade=$request->grade;
        $grade->status=$request->status;
        $grade->save();
        return redirect()->route('grades.index');

    }

    //update Grade
    public function edit(Grade $grade){

        $courses = Course::all();
        $students = Student::all();
        $teachers = Teacher::all();
        $grades=Grade::orderby('id', 'asc')->paginate();

        return view('grades.edit',compact('courses','students', 'teachers', 'grade'));
    }

    //update Grade in database
    public function save(Request $request, Grade $grade){

        $grade->id_course=$request->id_course;
        $grade->id_student=$request->id_student;
        $grade->id_teacher=$request->id_teacher;
        $grade->grade=$request->grade;
        $grade->status=$request->status;
        $grade->save();
        return redirect()->route('grades.index');

    }

    //delete Grade
    public function delete(Grade $grade){

        $grade->delete();
        return redirect()->route('grades.index');;

    }
    public function modal ($id){

        $grades=grade::orderby('id', 'asc')->paginate();
        return view('grades.index', ['grades'=>$grades, 'id'=>$id]);

    }

    //remove Grade from database
    public function remove($id){

        $grades=Grade::orderby('id', 'asc')->paginate();
        return view('grades.index', ['grades'=>$grades, 'id'=>$id]);

    }
}
