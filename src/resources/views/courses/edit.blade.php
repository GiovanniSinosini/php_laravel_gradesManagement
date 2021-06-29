@extends('layout.template')
@section('pagetitle', 'Edit Course')
@section('pagina', 'Edit course')
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
    <h1>Edit Course</h1>
    <form method="POST" action="{{route('courses.save', $course)}}">
        @csrf
        @method('put')
        <div class="row mb-4">
            <div class="col-md-2 text-end"><label for="name">Name</label></div>
            <div class="col-md-4"><input type="text" name="name" class="form-control" id="name" required value="{{$course->name}}"></div>
        </div>
        <div class="row mb-4">
            <div class="col-md-2 text-end"><label for="description">Description</label></div>
            <div class="col-md-4"><textarea name="description" rows="3" class="form-control" id="description">{{$course->description}}</textarea></div>
        </div>
        <div class="row mb-4">
            <div class="col-md-2 text-end"><label for="credits">Credits</label></div>
            <div class="col-md-4"><input type="number" name="credits" id="credits" required value="{{$course->credits}}"></div>
        </div>        
        <div class="row mb-4">
            <div class="col-md-2 text-end"></div>
            <div class="col-md-4 text-start"><button type="submit" class="btn btn-primary mb-4">Enviar</button></div>
        </div>
    </form>

      
@endsection
    