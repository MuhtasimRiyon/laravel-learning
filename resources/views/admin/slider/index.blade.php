@extends('admin.admin_master')

@section('admin_body')

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        @endif
                        <div class="card-header">
                            All Slider
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">SL No</th>
                                    <th scope="col">Slider title</th>
                                    <th scope="col">Slider description</th>
                                    <th scope="col">Slider image</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($slider as $value)
                                <tr>
                                    <td scope="row"> {{ $slider->firstItem()+$loop->index }} </td>
                                    <td> {{ $value->title }} </td>
                                    <td> {{ $value->description }} </td>
                                    <td> <img src="{{ asset($value->image) }}" style="height:100px; width:150px"> </td>
                                    <td> 
                                        <a href="{{ url('slider/edit/'.$value->id) }}" class="btn btn-info"> Edit </a> 
                                        <a href="{{ url('slider/delete/'.$value->id) }}" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger"> Delete </a> 
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $slider->links() }}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Add Slider
                        </div>
                        <div class="card-body">
                            <form action=" {{ route('store.slider') }} " method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Add Title</label>
                                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    @error('brand_name')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror

                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Add description</label>
                                    <textarea id="description" name="description" rows="5" cols="32">Add description </textarea>
                                    @error('brand_image')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror

                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Slider Image</label>
                                    <input type="file" name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    @error('brand_image')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Add Slider</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 