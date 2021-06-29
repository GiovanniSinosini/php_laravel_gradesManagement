@extends('layout.template')
@section('pagetitle', 'Edit Grade')
@section('pagina', 'Edit Grade')
@section('content')



<?php
@session_start();
if(@$_SESSION['id']==null){

    echo "<script>window.location='./'</script>";
}
    if (!isset($id)) {
        $id = "";
    }
?>
    <form method="POST" action="{{route('grades.save', $grade)}}">
        @csrf
        @method('put')
        <div class="row mb-4">
            <select class="form-select" aria-label="Default select example" name="id_course" id="id_course">
                @foreach ($courses as $course)
                    <option value="{{$course->id}}">{{$course->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="row mb-4">
            <select class="form-select" aria-label="Default select example" name="id_student" id="id_student">
                @foreach ($students as $student)
                    <option value="{{$student->id}}">{{$student->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="row mb-4">
            <select class="form-select" aria-label="Default select example" name="id_teacher" id="id_teacher">
                @foreach ($teachers as $teacher)   
                    <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                @endforeach
            </select>
        </div>
            
        <div class="row mb-4">
            <div class="col-md-2 text-end"><label for="grade">Grade</label></div>
            <div class="col-md-4"><input type="number" name="grade" id="grade" required value="{{$grade->grade}}"></div>
        </div>       
        
        <div class="row mb-4">
            <div class="col-md-2 text-end"><label for="status">Status</label></div>
            <div class="col-md-4"><input type="number" name="status" id="status" required value="{{$grade->status}}"></div>
        </div>
        
        <div class="row mb-4">
            <div class="col-md-2 text-end"></div>
            <div class="col-md-4 text-start"><button type="submit" class="btn btn-primary mb-4">Enviar</button></div>
        </div>
    </form>

      
@endsection
