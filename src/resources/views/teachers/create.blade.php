@extends('layout.template')
@section('pagetitle', 'Create Teacher')
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
    <h1>Edit Teacher</h1>
    <form method="POST" action="{{route('teachers.insert')}}">
        @csrf
        <div class="row mb-4">
            <div class="col-md-2 text-end"><label for="name">Name</label></div>
            <div class="col-md-4"><input type="text" name="name" class="form-control" id="name" required ></div>
        </div>
        <div class="row mb-4">
            <div class="col-md-2 text-end"><label for="email">Email</label></div>
            <div class="col-md-4"><input type="email" name="email" class="form-control" id="email" required ></div>
        </div>   
        <div class="row mb-4">
            <div class="col-md-2 text-end"></div>
            <div class="col-md-4 text-start"><button type="submit" class="btn btn-primary mb-4">Enviar</button></div>
        </div>
    </form>

      
@endsection