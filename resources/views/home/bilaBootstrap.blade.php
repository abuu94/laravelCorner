bila bootstrap
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Blog App</title>
    @vite(['../resources/css/app.css', '../resources/js/app.js'])

</head>
<body class="bg-light">
    @yield('content')

    
    @auth
    <p>Hongera , Umo ndani ...</p>
    <form action="/logout" method="POST">
    @csrf
    <button>Log out</button>
    </form>

    <div style="border: 3px solid black;">
           <h2>Create a New Post</h2>
           <form action="/create-post" method="POST">
           @csrf
           <input name="title" type="text" placeholder="post title">
           <textarea name="body" placeholder="body content..."> </textarea>
           <button>Save Post</button>
           </form>
    </div>
     <div style="border: 3px solid black;">
           <h2>All Posts</h2>
           @foreach ($posts as $post)
            <div style="background-color: gray; padding: 10px; margin: 10px;">
                    <h3>{{$post['title']}} by Author:{{$post->user->name}} </h3>
                     {{$post['body']}}
                    <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
                     <form action="/delete-post/{{$post->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>Delete</button>
                    </form>

            </div>   
           @endforeach
       </div>




    @else
    <div class="container mt-5">
        <div style="border: 3px solid black;">
           <h2>Register</h2>
           <form action="/register" method="POST">
           @csrf
           <input name="name" type="text" placeholder="name">
           <input name="email" type="text" placeholder="email">
           <input name="password" type="password" placeholder="password">
           <button>Register</button>
           </form>
       </div>

 

    </div>
     <div class="container mt-5">
        <div style="border: 3px solid black;">
           <h2>Login</h2>
           <form action="/login" method="POST">
           @csrf
           <input name="loginname" type="text" placeholder="name">
           <input name="loginpassword" type="password" placeholder="password">
           <button>Login</button>
           </form>
       </div>

 

    </div>

    @endauth

   

   
</body>
</html>











 <div class="container py-5">
        <div class="row justify-content-center">
            <!-- Login Form -->
            <div class="col-md-5">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white text-center">
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">
                        <form action="/login" method="POST">
                            @csrf
                            <div class="mb-3">
                                {{-- <label for="loginEmail" class="form-label">Username </label> --}}
                                <input type="text" name="loginname" id="loginname" class="form-control" placeholder="Enter email" required>
                            </div>
                            <div class="mb-3">
                                {{-- <label for="loginPassword" class="form-label">Password</label> --}}
                                <input type="password" name="loginpassword" id="loginpassword" class="form-control" placeholder="Enter password" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Login</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Register Form -->
            <div class="col-md-5">
                <div class="card shadow-sm">
                    <div class="card-header bg-success text-white text-center">
                        <h4>Register</h4>
                    </div>
                    <div class="card-body">
                        <form action="/register" method="POST">
                            @csrf
                            <div class="mb-3">
                                {{-- <label for="registerName" class="form-label">Name</label> --}}
                                <input type="text" name="name" id="registerName" class="form-control" placeholder="Enter name" required>
                            </div>
                            <div class="mb-3">
                                {{-- <label for="registerEmail" class="form-label">Email address</label> --}}
                                <input type="email" name="email" id="registerEmail" class="form-control" placeholder="Enter email" required>
                            </div>
                            <div class="mb-3">
                                {{-- <label for="registerPassword" class="form-label">Password</label> --}}
                                <input type="password" name="password" id="registerPassword" class="form-control" placeholder="Enter password" required>
                            </div>
                          
                            <button type="submit" class="btn btn-success w-100">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




      <div class="container py-5">
        <div class="row justify-content-center">
            <!-- Login Form -->
            <div class="col-md-5">
                <div class="card shadow-sm">
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
            <div class="col-md-5">
                <div class="card shadow-sm">
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


    <html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
   @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light">

  <h1>Edit Post</h1>
  <form action="/edit-post/{{$post->id}}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="title" value="{{$post->title}}">
    <textarea name="body">{{$post->body}}</textarea>
    <button>Save Changes</button>
  </form>
  
</body>
</html>


