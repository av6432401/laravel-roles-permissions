<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Role</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 50px;
        }
        .container {
            max-width: 600px;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        .card {
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-group label {
            font-weight: bold;
        }
        .checkbox-group {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .checkbox-group label {
            background-color: #fff;
            border: 1px solid #ced4da;
            border-radius: 4px;
            padding: 10px;
            display: flex;
            align-items: center;
            gap: 5px;
            cursor: pointer;
        }
        .checkbox-group input[type="checkbox"] {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    @if(session('status'))
    <div class="alert alert-success">{{session('status')}}</div>
    @endif
    </div>
    <div class="container">
        <h1>Role: {{ $role->name }}</h1>
        <div class="text-center mb-4">
            <a href="{{ url('roles') }}" class="btn btn-secondary">Back</a>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ url('roles/'.$role->id.'/give-permissions') }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        @error('permission')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        <label for="name">Permissions</label>
                        <div class="checkbox-group">
                            @foreach($permissions as $permission)
                            <label>
                                <input type="checkbox" name="permission[]" value="{{ $permission->name}}"
                                {{in_array($permission->id,$rolePermissions) ? 'checked':''}}
                                />
                                {{ $permission->name }}
                            </label>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS and dependencies --> 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
