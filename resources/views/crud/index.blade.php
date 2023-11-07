<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="card">
                @if(Session::has('message'))
                <div class="alert alert-{{Session::get('class')}} justify-content-justify" role="alert">
                    {{ Session::get('message') }}
                </div>
                <script>
                    setTimeout(function() {
                        var alert = document.querySelector('.alert');
                        alert.style.display = 'none';
                    }, 4000);
                </script>
                @endif
                <div class="card-body">
                    <strong>Employee List</strong>
                    <a href="{{url('/employee/create')}}" class="btn btn-primary btn-xs py-0">Create Employee</a>
                    <table class="table  table-hover table-bordered table-stripped" style="margin-top:10px;">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Birth</th>
                                <th>age</th>
                                <th>salary</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $employee)
                            <tr>
                                <td>{{$employee->name}}</td>
                                <td>{{$employee->email}}</td>
                                <td>{{$employee->gender}}</td>
                                <td>{{$employee->dob}}</td>
                                <td>{{$employee->age}}</td>
                                <td>{{$employee->salary}}</td>
                                <td>{{$employee->address}}</td>
                                <td>
                                    <a href="{{url('/employee/edit')}}/{{$employee->id}}" class="btn btn-success btn-xs py-0">Edit</a>
                                    <a href="{{url('/employee/delete')}}/{{$employee->id}}" class="btn btn-danger btn-xs py-0">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>