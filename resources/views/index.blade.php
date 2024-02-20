<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="{{asset('assets/bootstrap-5.3.2/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/fontawesome/css/all.min.css')}}">
</head>
<body>
    
    <h2 class="text-center text text-success my-4 text-uppercase text-decoration-underline"> List of Students</h2>


    <div class="container">
        
        <a href="{{route('students.create')}}">
            <button class="btn btn-success mb-3"><i class="fa-regular fa-square-plus"></i> Add Student</button>
        </a>
        <div class="row">

            <table class="table table-primary table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                    <th scope="col">Full Name</th>
                    <th scope="col">Gneder</th>
                    <th scope="col">Birthday</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Class Name</th>
                    <th scope="col" class="text-center" colspan="3">Action</th>

                    </tr>
                </thead>
                <tbody>
                        @foreach($students as $item)
                            <tr>
                                <th scope="row">{{$item->name}}</th>
                                <td>{{$item->gender}}</td>
                                <td>{{$item->birthday}}</td>
                                <td>{{$item->address}}</td>
    
                                <td>{{$item->phone}}</td>
                                <td>{{$item->getCourseName()}}</td>
                                
                                <td ><a class="btn btn-success" href="{{route('students.show', ['student' => $item->id, 'pageIndex' => $pageIndex])}}"><i class="fa-regular fa-eye"></i></a></td>
                                <td ><a class="btn btn-danger" href="{{route('students.edit', ['student' => $item->id, 'pageIndex' => $pageIndex])}}"><i class="fa-regular fa-pen-to-square"></i></a></td>
                                <td ><button class="btn btn-warning" data-bs-toggle='modal'   data-bs-target='#A{{$item->id}}'><i class="fa-regular fa-trash-can"></i></button></td>
                                

                                <!-- Modal -->
                                <div class='modal fade' id='A{{$item->id}}' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                    <div class='modal-dialog'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h1 class='modal-title fs-5' id='exampleModalLabel'>Xác nhận xóa</h1>
                                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                            </div>
                                            <div class='modal-body'>
                                                Bạn có muốn xoas sinh vien có id: {{$item->id}}
                                            </div>
                                            <div class='modal-footer'>
                                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Trở lại</button>
                                                <form action="{{route('students.destroy', ['pageIndex' => $pageIndex, 'student' => $item->id])}}" method="POST">
                                                    @csrf 
                                                    @method('DELETE')
                                                    <button type="submit"  class='btn btn-primary'>Đồng ý</button>
                                                </form>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>

                        @endforeach
                </tbody>
            </table>       
        </div>
    </div>

    <!-- paginating  -->
    @if($numberOfPage > 1)
    <div class="d-flex justify-content-center align-items-center my-2">
         <a class="btn btn-success" href="{{route('students.index', ['pageIndex' => $pageIndex - 1])}}">Trước</a>  
         @for($i = 1; $i <= $numberOfPage; $i++)
            @if($pageIndex == $i)
                <a class="btn btn-primary ms-2" href="{{route('students.index', ['pageIndex' => $i])}}">{{$i}}</a> 
            @else
                
                @if($i == 1 || $i == $numberOfPage || ($i <= $pageIndex + 4 && $i >= $pageIndex - 4))
                    <a class="btn btn-success ms-2" href="{{route('students.index', ['pageIndex' => $i])}}">{{$i}}</a>
                @elseif($i == $pageIndex - 5 || $i == $pageIndex + 5)
                    <a class="btn btn-success ms-2" href="{{route('students.index', ['pageIndex' => $i])}}">...</a>
                @endif
            @endif
         @endfor
         <a class="btn btn-success ms-2" href="{{route('students.index', ['pageIndex' => $pageIndex + 1])}}">Sau</a>
    </div>
    @endif


    <!-- modal inform -->

   
    <div id="myDialog" style="display: none;" class="px-5 py-3 rounded-3">
        <h4 class="text-primary fw-bold fs-4">Thông báo</h4>
        <p class="text-success">{{ session('mes') }}</p>
        <button id="confirmButton" class="float-end rounded-2">Đồng ý</button>
    </div>
    <style>
        #myDialog {
            position: fixed;
            width: 500px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #ffffff;
            padding: 20px;
            bstudent: 1px solid #ccc;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        #confirmButton {
        padding: 10px 20px;
        background: #007bff;
        color: #ffffff;
        bstudent: none;
        cursor: pointer;
        }
    </style>
    @if(session('mes'))
        <script>
            var dialog = document.getElementById("myDialog");
            var confirmButton = document.getElementById("confirmButton");

            dialog.style.display = "block";
            confirmButton.addEventListener("click", function() {
                dialog.style.display = "none";
            });
            // alert("{{ session('Success') }}")
        </script>
    @endif
    
    <script src="{{asset('assets/fontawesome/js/all.min.js')}}"></script>
    <script src="{{asset('assets/bootstrap-5.3.2/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>