<!DOCTYPE html>
<html>
<head>

    <title>Manage Docker</title>
    <link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}">
    <script src="{{asset("js/bootstrap.bundle.min.js")}}"></script>

</head>
<body>
<div class="container mt-5">
    <div class="row">
        @if (session('status'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link {{check_current_route_name('containers') ? 'active' : ''}}"
                   href="{{route('containers.index')}}">Containers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{check_current_route_name('images') ? 'active' : ''}}"
                   href="{{route('images.index')}}">Images</a>
            </li>
        </ul>
        <div class="card border-top-0 rounded-0">
            @yield('main')
        </div>
    </div>
</div>
</body>

</html>
