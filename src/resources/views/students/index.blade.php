@extends('layout.template')
@section('pagetitle', 'Students')
@section('pagina', 'Students')
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
    <a href="{{route('students.create')}}" type="button" class="btn btn-primary mt-4 mb-4">Insert Student</a>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Birthday</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                        <tr>
                            <td>{{$student->name}}</td>
                            <td>{{$student->email}}</td>
                            <td>{{$student->birthday}}</td>
                            <td>
                                <a href="{{route('students.edit', $student)}}"><i class="fas fa-edit text-info me-2"></i></a>
                                <a href="{{route('students.modal', $student)}}"><i class="fas fa-trash text-danger me-2"></i></a>
                            
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
             
            </div>
        </div> 
    </div>
<script>
    $(document).ready(function(){
        $('#dataTable').DataTable();

    })
</script>   

@endsection
@section('footer')
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Remove student</h5>
          <a href="{{route('students.index')}}" class="btn-close" aria-label="Close"></a>

        </div>
        <div class="modal-body">
            Do you really want to delete this student?
        </div>
        <div class="modal-footer">
          <a href="{{route('students.index')}}" class="btn btn-secondary">Cancel</a>
          <form method="POST" action="{{route('students.delete', $id)}}">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Remove</button>
            </form>
        </div>
      </div>
    </div>
  </div>
  <?php
    if($id!=""){       

        echo"<script>
            var myModal=new bootstrap.Modal(document.getElementById('exampleModal'));
            myModal.show();
            </script>";
    }
    ?>
@endsection
