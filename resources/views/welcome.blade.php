<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Blog App</title>
   

</head>
<body>
   
    <div class="container mt-5">
        <!-- Register Form -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">Register</div>
        <div class="card-body">
            <form method="POST" action="/register">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Register</button>
            </form>
        </div>
    </div>
    </div>
</body>
</html>


