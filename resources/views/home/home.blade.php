<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Blog App</title>
    @vite(['../resources/css/app.css', '../resources/js/app.js'])
    <!-- Add Bootstrap Icons --> <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <!-- Add Font Awesome --> <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Add Modal Utility --> <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body class="bg-light">
    @yield('content')

    
    @auth
     <!-- Top Bar -->
    <nav class="navbar navbar-light bg-info mb-4 ">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            
            <div class="d-flex align-items-center">
            <span class="navbar-brand mb-0 h1 text-success">Task To Do</span>
            
            </div>
            
            <div>
            <span class="me-6 text-primary">Welcome Abubakar</span>
            <button class="btn btn-primary me-2 " data-bs-toggle="modal" data-bs-target="#addPostModal" >
                 <i class="bi bi-plus-circle me-1"></i> Add Post 
            </button> 
            <button class="btn btn-outline-danger ">
                 <i class="bi bi-box-arrow-right me-1"></i> Logout
             </button>

             

          
            </div>
            
        </div>
    </nav>
        


<!-- Modal -->
<div class="modal fade" id="addPostModal" tabindex="-1" aria-labelledby="addPostModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <!-- Modal Header -->
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="addPostModalLabel">Add New Post</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <!-- Modal Body -->
      <form action="/create-post" method="POST">
          @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="postTitle" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="postTitle" placeholder="Enter post title">
            </div>
            <div class="mb-3">
                <label for="postContent" class="form-label">Content</label>
                <textarea class="form-control" name="body" id="postContent" rows="3" placeholder="Enter post content"></textarea>
            </div>
        </div>
        
        <!-- Modal Footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save Post</button>
        </div>
    </form>
      
    </div>
  </div>
</div>

      <!-- List of Posts -->
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">All Posts</h5>
        </div>
        <div class="card-body">
            @forelse($posts as $post)
                <div class="border rounded p-3 mb-3">
                    <h4>{{ $post->title }}</h4>
                    <p>{{ $post->body }}</p>
                    <small class="text-muted">By {{ $post->user->name }}</small>

                    <div class="mt-2">
                        <a href="/edit-post/{{$post->id}}" class="btn btn-sm btn-info">Edit</a>
                        <form action="/delete-post/{{$post->id}}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-muted">No posts yet. Create one above!</p>
            @endforelse
        </div>
    </div>
   
    @else

    <div class="container py-5 mt-5">
        <div class="row justify-content-center">
            <!-- Login Form -->
            <div class="col-md-5 d-flex">
                <div class="card shadow-sm h-100 w-100">
                    <div class="card-header bg-primary text-white text-center">
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">
                        <form action="/login" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input type="text" name="loginname" id="loginname" class="form-control" placeholder="Enter email" required>
                            </div>
                            <div class="mb-3">
                                <input type="password" name="loginpassword" id="loginpassword" class="form-control" placeholder="Enter password" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Login</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Register Form -->
            <div class="col-md-5 d-flex">
                <div class="card shadow-sm h-100 w-100">
                    <div class="card-header bg-success text-white text-center">
                        <h4>Register</h4>
                    </div>
                    <div class="card-body">
                        <form action="/register" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input type="text" name="name" id="registerName" class="form-control" placeholder="Enter name" required>
                            </div>
                            <div class="mb-3">
                                <input type="email" name="email" id="registerEmail" class="form-control" placeholder="Enter email" required>
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password" id="registerPassword" class="form-control" placeholder="Enter password" required>
                            </div>
                          
                            <button type="submit" class="btn btn-success w-100">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endauth   
</body>
</html>


