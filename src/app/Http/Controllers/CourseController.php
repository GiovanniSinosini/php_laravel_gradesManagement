<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Grade;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //show all courses
    public function index(){

        $courses=Course::orderby('name', 'asc')->paginate();
        return view('courses.index', ['courses'=>$courses]);

    }

    //create course
    public function create()
    {
        return view('courses.create');
        
    }

    //add course to database
    public function insert(Request $request){

        $course=new Course();
        $course->name=$request->name;
        $course->description=$request->description;
        $course->credits=$request->credits;
        $course->save();
        return redirect()->route('courses.index');

    }

    //update course
    public function edit(Course $course){

        return view('courses.edit',['course'=>$course]);

    }

    //update course in database
    public function save(Request $request, Course $course){

        $course->name=$request->name;
        $course->description=$request->description;
        $course->credits=$request->credits;
        $course->save();
        return redirect()->route('courses.index');

    }

    //delete course
    public function delete(Course $course){
  
        $course->delete();
        return redirect()->route('courses.index');

    }

    public function modal ($id){

        $courses=course::orderby('name', 'asc')->paginate();
        return view('courses.index', ['courses'=>$courses, 'id'=>$id]);

    }

    //remove course from database
    public function remove($id){

        $courses=Course::orderby('name', 'asc')->paginate();
        return view('courses.index', ['courses'=>$courses, 'id'=>$id]);

    }
}
