<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Permissions</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 50px;
        }
        .container {
            max-width: 500px;
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Create Permissions</h1>
        <div class="text-center mb-4">
            <a href="{{ url('permissions') }}" class="btn btn-secondary">Back</a>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ url('permissions') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Permission Name</label>
                        <input type="text" name="name" class="form-control" required />
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">Save</button>
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
