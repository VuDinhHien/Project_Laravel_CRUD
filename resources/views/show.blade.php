<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xem chi tiết</title>
    <link rel="stylesheet" href="{{asset('assets/bootstrap-5.3.2/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/fontawesome/css/all.min.css')}}">
</head>
<body>
    <h2 class="text-center text-uppercase text-decoration-underline text-success">Details Student</h2>

    <div class="container">
        <div class="row">
            <h3 class="text-center text-success">Student</h3>
            <table class="table table-dark table-striped align-middle">
                <thead>
                    <tr>
                        <th class="col-6" scope="col">Thuộc tính</th>
                        <th class="col-6" scope="col">Giá trị</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Student ID </td>
                        <td>{{$student->id}}</td>
                    </tr>
                    <tr>
                        <td>Full Name</td>
                        <td>{{$student->name}}</td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>{{$student->gender}}</td>
                    </tr>
                    <tr>
                        <td>BirthDay</td>
                        <td>{{$student->birthday}}</td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>{{$student->address}}</td>
                    </tr>
                    <tr>
                        <td>Phone Number</td>
                        <td>{{$student->phone}}</td>
                    </tr>
                    
                    <tr>
                        <td>Class ID</td>
                        <td>{{$student->courseId}}</td>
                    </tr>
                
                </tbody>
            </table>       
        </div>
        <div class="row">
            <h3 class="text-center text-success">Class Name</h3>
            <table class="table table-dark table-striped align-middle">
                <thead>
                    <tr>
                        <th class="col-6" scope="col">Thuộc tính</th>
                        <th class="col-6" scope="col">Giá trị</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>CourseId</td>
                        <td>{{$course->id}}</td>
                    </tr>
                    <tr>
                        <td>Class Name</td>
                        <td>{{$course->courseName}}</td>
                    </tr>
                    <tr>
                        <td>Teacher</td>
                        <td>{{$course->teacher}}</td>
                    </tr>
                    
                
                </tbody>
            </table>       
        </div>
        <p class="d-flex justify-content-end"><a href="{{route('students.index', ['student' => $student->id, 'pageIndex' => $pageIndex])}}" class=""><button class="btn btn-primary fw-bold">Trở lại</button></a></p>
    </div>
    
    <script src="{{asset('assets/fontawesome/js/all.min.js')}}"></script>
    <script src="{{asset('assets/bootstrap-5.3.2/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>