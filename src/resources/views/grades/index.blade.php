@extends('layout.template')
@section('pagetitle', 'Grades')
@section('pagina', 'Grades')
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
    <a href="{{route('grades.create')}}" type="button" class="btn btn-primary mt-4 mb-4">Insert Grade</a>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%">
                    <thead>
                        <tr>
                            <th>Course</th>
                            <th>Student</th>
                            <th>Teacher</th>
                            <th>Grade</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($grades as $grade)
                        <tr>
                            <td>   
                                @foreach ($courses as $course)
                                    @if ($grade->id_course == $course->id)
                                    {{$course->name}}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($students as $student)
                                    @if ($grade->id_student == $student->id)
                                    {{$student->name}}
                                    @endif
                                @endforeach                               
                            </td>
                          
                            <td>
                                @foreach ($teachers as $teacher)
                                    @if ($grade->id_teacher == $teacher->id)
                                    {{$teacher->name}}
                                    @endif
                                @endforeach
                            </td>
                            <td>{{$grade->grade}}</td>
                            <td>{{$grade->status}}</td>
                            <td>
                                <a href="{{route('grades.edit', $grade)}}"><i class="fas fa-edit text-info me-2"></i></a>
                                <a href="{{route('grades.modal', $grade)}}"><i class="fas fa-trash text-danger me-2"></i></a>
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
          <h5 class="modal-title" id="exampleModalLabel">Remove grade</h5>
          <a href="{{route('grades.index')}}" class="btn-close" aria-label="Close"></a>

        </div>
        <div class="modal-body">
            Do you really want to delete this grade?
        </div>
        <div class="modal-footer">
          <a href="{{route('grades.index')}}" class="btn btn-secondary">Cancel</a>
          <form method="POST" action="{{route('grades.delete', $id)}}">
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
    
