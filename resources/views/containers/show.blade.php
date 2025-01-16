<html>
<head>
    <title>Manage Docker Containers</title>
    <link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}">
    <script src="{{asset("js/bootstrap.bundle.min.js")}}"></script>
</head>
<body>

<div class="container mt-5">
    <div class="row">
        @if (session('status'))
            <div class="alert alert-info">
                {{ session('status') }}
            </div>
        @endif
        <div class="card p-0">
            <div class="card-body p-0">
                @for($i = 0;$i < count($data['header']);$i++)
                    <div class="d-flex mb-4 border-bottom py-2 px-2">
                        <p>
                            {{$data['header'][$i]}} :
                        </p>
                        <p>
                            {{array_key_exists($i , $data['data']) ? $data['data'][$i] : null}}
                        </p>
                    </div>
                @endfor
            </div>
            <div class="card-footer">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{route("containers.index")}}" class="btn btn-primary">Back</a>
                    <a href="{{route("containers.stop" , ['id' => $data['id']])}}" class="btn btn-warning text-white">Stop</a>
                    <a href="{{route("containers.remove" , ['id' => $data['id']])}}" class="btn btn-danger">Remove</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
