@extends('layout.template')
@section('pagetitle', 'Grade Course')
@section('pagina', 'Create Grade')
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
<div class="container mt-4">

    <form method="POST" action="{{route('grades.insert')}}">
        @csrf

        <div class="row mb-4">
            <select class="form-select" aria-label="Default select example" name="id_course" id="id_course">
                <option selected>Select Course</option>
                @foreach ($courses as $course)
                    <option value="{{$course->id}}">{{$course->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="row mb-4">
            <select class="form-select" aria-label="Default select example" name="id_student" id="id_student">
                <option selected>Select Student</option>
                @foreach ($students as $student)
                    <option value="{{$student->id}}">{{$student->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="row mb-4">
            <select class="form-select" aria-label="Default select example" name="id_teacher" id="id_teacher">
                <option selected>Select Teacher</option>
                @foreach ($teachers as $teacher)   
                    <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                @endforeach
            </select>
        </div>
            
        <div class="row mb-4">
            <div class="col-md-2 text-end"><label for="grade">Grade</label></div>
            <div class="col-md-4"><input type="number" class="form-control" name="grade" id="grade" required></div>
        </div>       
        
        <div class="row mb-4">
            <div class="col-md-2 text-end"><label for="status">Status</label></div>
            <div class="col-md-4"><input type="number" class="form-control" name="status" id="status" required></div>
        </div>
        
        <div class="row mb-4">
            <div class="col-md-2 text-end"></div>
            <div class="col-md-4 text-start"><button type="submit" class="btn btn-primary mb-4">Enviar</button></div>
        </div>
    </form>
</div>

      
@endsection
 