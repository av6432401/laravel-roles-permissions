<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permissions</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 20px;
        }
        .card {
            margin-top: 20px;
        }
        .alert-success {
            margin-top: 20px;
        }
    </style>
</head>
<body>
@include('role-permission.nav-links')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        
        <div class="card">
            <div class="card-header">
                <h1>Permissions
                    <a href="{{ url('permissions/create') }}" class="btn btn-primary float-right">Add Permission</a>
                </h1>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($permissions as $permission)
                       
                        <tr>
                            <td>{{$permission->id}}</td>
                            <td>{{$permission->name}}</td>
                            <td>
                                <a href="{{url('permissions/'.$permission->id.'/edit')}}" class="btn btn-success">Edit</a>
                                <a href="{{url('permissions/'.$permission->id.'/delete')}}" class="btn btn-danger">Delete</a>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
