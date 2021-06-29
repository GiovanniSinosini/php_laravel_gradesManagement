@extends('layout.template')
@section('pagetitle', 'Create Course')
@section('pagina', 'New Course')
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

    <form method="POST" action="{{route('courses.insert')}}">
        @csrf
        <div class="row mb-4">
            <div class="col-md-2 text-end"><label for="name">Name</label></div>
            <div class="col-md-4"><input type="text" name="name" class="form-control" id="name" required></div>
        </div>
        <div class="row mb-4">
            <div class="col-md-2 text-end"><label for="description">Description</label></div>
            <div class="col-md-4"><textarea name="description" rows="3" class="form-control" id="description"></textarea></div>
        </div>
        <div class="row mb-4">
            <div class="col-md-2 text-end"><label for="credits">Credits</label></div>
            <div class="col-md-4"><input type="number" name="credits" id="credits" required></div>
        </div>        
        <div class="row mb-4">
            <div class="col-md-2 text-end"></div>
            <div class="col-md-4 text-start"><button type="submit" class="btn btn-primary mb-4">Enviar</button></div>
        </div>
    </form>
</div>
    
@endsection
    