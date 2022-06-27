@extends('admin.admin_master')

@section('admin_body')

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    @endif

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-4 ">
                    <div class="card">
                        <div class="card-header">
                            Edit Slider
                        </div>
                        <div class="card-body">
                            <form action=" {{ url('/slider/update/'.$sliders->id) }} " method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="old_image" value="{{ $sliders->image }}">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Update title</label>
                                    <input type="text" name="slider_title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value=" {{ $sliders -> title }} ">
                                    @error('slider_title')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Update description</label>
                                    <input type="text" name="slider_description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value=" {{ $sliders -> description }} ">
                                    @error('slider_description')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Update Image</label>
                                    <input type="file" name="slider_image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value=" {{ $sliders -> image }} ">
                                    @error('slider_image')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <img src="{{ asset($sliders->image) }}" style="width:170px; height:120px">
                                </div>
                                <button type="submit" class="btn btn-primary">Update Slider</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 