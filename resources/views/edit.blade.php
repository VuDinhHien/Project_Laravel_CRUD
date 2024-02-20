<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm</title>
    <link rel="stylesheet" href="{{asset('assets/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/bootstrap-5.3.2/css/bootstrap.min.css')}}">
</head>
<body>
   <div class="container">
    <div class="row p-3">
        <h4 class="text-uppercase text-decoration-underline text-center fw-bold text-success">Edit Student</h4>
        <form class="bg-info border border-2 border-success rounded-3" method="POST" action="{{route('students.update', ['student' => $student->id, 'pageIndex' => $pageIndex])}}">
            @csrf
            @method('PUT')
            <div class="input-group mt-3">
                <span class="input-group-text fw-bold bg-light">Full Name</span>
                <input value = '{{$student->name}}' required name = 'name' type="text" class="form-control" placeholder="">
            </div>
            <div class="input-group mt-2">
                <span class="input-group-text fw-bold bg-light">Gender</span>
                <select class="form-select" name='gender'>  
                  <option value = '{{$student->name}}'>{{$student->gender}}</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                  <option value="other">Other</option>
                </select>
            </div>
            <div class="input-group mt-3">
                <span class="input-group-text fw-bold bg-light">BirthDay</span>
                <input value = '{{$student->birthday}}' required name = 'birthday' type="date" class="form-control" placeholder="">
            </div>
            <div class="input-group mt-3">
                <span class="input-group-text fw-bold bg-light">Address</span>
                <input value = '{{$student->address}}' required name = 'address' type="text" class="form-control" placeholder="">
            </div>
            <div class="input-group mt-3">
                <span class="input-group-text fw-bold bg-light">Phone Mumber</span>
                <input value = '{{$student->phone}}' required name = 'phone' type="number" class="form-control" placeholder="">
            </div>
            
            <div class="input-group mt-2">
                <span class="input-group-text fw-bold bg-light">Course</span>
                <select class="form-select" name='courseId'>
                <option value="{{$student->courseId}}">{{$student->getCourseName()}}</option>
                     @foreach($courses as $item)
                        <option value="{{$item->id}}">{{$item->courseName}}</option>
                    @endforeach
                </select>
            </div>
        
            <button type="submit" class="btn btn-primary my-3 ">Thêm</button>
        </form>
    </div>
   </div>

    <script src="{{asset('assets/fontawesome/js/all.min.js')}}"></script>
    <script src="{{asset('assets/bootstrap-5.3.2/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/jquery-3.7.1.min.js')}}"></script>
</body>
</html>