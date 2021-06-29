<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="  crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    
    <title>@yield('title')</title>
    
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="/">University</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="{{route('students.index')}}">Students</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('teachers.index')}}">Teachers</a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="{{route('courses.index')}}">Courses</a>
              </li>    
              <li class="nav-item">
                <a class="nav-link" href="{{route('grades.index')}}">Grades</a>
              </li>
              <?php
                @session_start();
                if(@$_SESSION['id']== null)
                {
                  ?>
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="{{route('courses.index')}}">Login</a>      
                </li>

                <?php
                }
                else {
                  ?>
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('users.logout')}}"><?=@$_SESSION['name'];?></a>      
                  </li>
                  <?php
                }
                ?>

            </ul>
          </div>
        </div>
      </nav>
      <header class="card mb-3"><h1>@yield('pagina')</h1></header>
      <div class="container">
        @yield('content')
      </div>
     
      <footer class="card mb-3">&copy; GCS Company</footer>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
      @yield('footer')
</body>
</html>