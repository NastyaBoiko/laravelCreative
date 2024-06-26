<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('main.index') }}">Main</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('post.index') }}">Posts</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('about.index') }}">About</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact.index') }}">Contacts</a>
                      </li>
                      @can('view', auth()->user())
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('admin.post.index') }}">Admin</a>
                        </li>
                      @endcan
                    </ul>
                  </div>
                </div>
            </nav>
        </div>
        @yield('content')
    </div>
</body>
</html>