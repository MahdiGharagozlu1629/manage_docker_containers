@extends('master')
@section('main')
    <div class="card-title py-3 border-bottom">
        <div class="d-flex justify-content-between">
            <p class="mb-0">Your Docker Containers</p>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add_container">
                Add New Container
            </button>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-hover table-bordered">
            <thead>
            <tr>
                @foreach($data['header'] as $header)
                    <td>{{$header}}</td>
                @endforeach
                <td>
                    Operation
                </td>
            </tr>
            </thead>
            <tbody>
            @foreach($data['data'] as $body)
                <tr>
                    @for($i = 0;$i<count($body);$i++)
                        <td>{{$body[$i]}}</td>
                    @endfor
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{route('containers.show' , ['id' => $body[0]])}}" class="btn btn-primary">Show</a>
                            <a href="{{route("containers.stop" , ['id' => $body[0]])}}" class="btn btn-warning text-white">Stop</a>
                            <a href="{{route("containers.remove" , ['id' => $body[0]])}}" class="btn btn-danger">Remove</a>
                        </div>
                    </td>
                </tr>
            @endforeach
                    </tbody>
                </table>
            </div>
    {{-- Add New Container --}}
    <div class="modal fade" id="add_container" tabindex="-1" aria-labelledby="add_containerLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add_containerLabel">New message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('containers.add')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="image" class="col-form-label">Image :</label>
                            <select class="form-select" name="image" id="image">
                                @foreach($images_list as $image)
                                    <option value="{{$image[0]}}">{{$image[0]}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="port" class="col-form-label">Port :</label>
                            <div class="d-flex justify-content-between align-items-center">
                                <input required type="number" class="form-control" name="system_port">
                                <span class="mx-3"> : </span>
                                <input required type="number" class="form-control" name="image_port">
                            </div>
                        </div>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
