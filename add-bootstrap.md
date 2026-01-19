Great choice 👍 — using Bootstrap assets locally (instead of a CDN) gives you more control and works offline. Here’s how you can set it up inside your Laravel project:

---

## 🔹 Step 1: Install Bootstrap via npm
Laravel ships with Node.js tooling (Vite in Laravel 9+ or Mix in older versions). Use npm to install Bootstrap:

```bash
npm install bootstrap @popperjs/core
```

This will add Bootstrap to your `node_modules` folder.

---

## 🔹 Step 2: Import Bootstrap in your assets
Depending on your Laravel version:

- **Laravel 9+ (Vite)**  
  Open `resources/css/app.css` (or `app.scss`) and add:
  ```css
  @import "bootstrap/dist/css/bootstrap.min.css";
  ```

  Open `resources/js/app.js` and add:
  ```js
  import 'bootstrap';
  ```

- **Laravel 8 or older (Mix/Webpack)**  
  In `resources/sass/app.scss`:
  ```scss
  @import "~bootstrap/scss/bootstrap";
  ```
  In `resources/js/app.js`:
  ```js
  require('bootstrap');
  ```

---

## 🔹 Step 3: Compile assets
Run the build process so Laravel bundles Bootstrap into your app:

```bash
npm run dev
```

For production:
```bash
npm run build
```

---

## 🔹 Step 4: Include compiled assets in Blade
In your main layout file (e.g. `resources/views/layouts/app.blade.php`), include the compiled CSS and JS:

```html
<!DOCTYPE html>
<html>
<head>
    <title>To-Do App</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- Laravel 9+ -->
    {{-- For Laravel Mix (older versions): --}}
    {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
    {{-- <script src="{{ mix('js/app.js') }}"></script> --}}
</head>
<body>
    @yield('content')
</body>
</html>
```

---

## 🔹 Step 5: Use Bootstrap classes
Now you can style your To‑Do app with Bootstrap components:

```html
<div class="container mt-5">
    <h1 class="text-center text-primary mb-4">My Tasks</h1>

    <form method="POST" action="/tasks" class="d-flex justify-content-center mb-4">
        @csrf
        <input type="text" name="title" class="form-control w-50 me-2" placeholder="New Task">
        <button type="submit" class="btn btn-success">Add</button>
    </form>

    <ul class="list-group">
        @foreach($tasks as $task)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span>
                    <strong>{{ $task->title }}</strong>
                    <span class="badge {{ $task->completed ? 'bg-success' : 'bg-warning text-dark' }}">
                        {{ $task->completed ? 'Done' : 'Pending' }}
                    </span>
                </span>
                <div>
                    <form method="POST" action="/tasks/{{ $task->id }}" class="d-inline">
                        @csrf @method('PUT')
                        <button type="submit" class="btn btn-sm btn-info">Toggle</button>
                    </form>
                    <form method="POST" action="/tasks/{{ $task->id }}" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>
```

---

✅ That’s it — now Bootstrap is bundled into your Laravel project without relying on a CDN.  

Would you like me to also show you how to **customize Bootstrap (e.g., change colors, spacing)** using SCSS inside Laravel’s build pipeline?
