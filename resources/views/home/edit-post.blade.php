<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
   @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">
                    <h4 class="mb-0">Edit Post</h4>
                </div>
                <div class="card-body">
                    <form action="/edit-post/{{$post->id}}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Title -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Post Title</label>
                            <input type="text" name="title" id="title" 
                                   value="{{$post->title}}" 
                                   class="form-control" required>
                        </div>

                        <!-- Body -->
                        <div class="mb-3">
                            <label for="body" class="form-label">Post Content</label>
                            <textarea name="body" id="body" rows="5" 
                                      class="form-control" required>{{$post->body}}</textarea>
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-between">
                            <a href="/" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-info text-white">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

  {{-- <h1>Edit Post</h1>
  <form action="/edit-post/{{$post->id}}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="title" value="{{$post->title}}">
    <textarea name="body">{{$post->body}}</textarea>
    <button>Save Changes</button>
  </form> --}}
  
</body>
</html>