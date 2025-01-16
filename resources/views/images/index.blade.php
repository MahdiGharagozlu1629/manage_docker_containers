@extends('master')
@section('main')
    <div class="card-title py-3 border-bottom d-flex justify-content-between">
        <p class="mb-0">Your Docker Images</p>
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add_image">
            Add New Image
        </button>
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
                            <a href="{{route("images.remove" , ['reference' => str_replace('/' ,' ' ,$body[0])])}}"
                               class="btn btn-danger">Remove</a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{-- Add Image --}}
    <div class="modal fade" id="add_image" tabindex="-1" aria-labelledby="add_imageLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add_containerLabel">New message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('images.add')}}" method="post">
                        @csrf

                        <div class="mb-3">
                            <label for="port" class="col-form-label">Image Name :</label>
                            <input required type="text" class="form-control" name="name">
                        </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
