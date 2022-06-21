<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Category') }}   <br> 
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <!-- all category table -->
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
                            All Category
                        </div>
                        <!-- table -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">SL No</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- @php($i = 1) -->
                                @foreach($cat as $value)
                                <tr>
                                    <td scope="row"> {{ $cat -> firstItem()+$loop -> index }} </td>
                                    <td> {{ $value -> catagory_name }} </td>
                                    <td> {{ $value -> user -> name }} </td>
                                    <td> {{ $value -> created_at -> diffForHumans() }} </td>
                                    <td> 
                                        <a href="{{ url('catagory/edit/'.$value->id) }}" class="btn btn-info"> Edit </a> 
                                        <a href="{{ url('softdelete/catagory/'.$value->id) }}" class="btn btn-warning"> Trash </a> 
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $cat ->links() }}
                    </div>
                </div>
                <!-- add category field -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Add Category
                        </div>
                        <div class="card-body">
                            <form action=" {{ route('store.category') }} " method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Category Name</label>
                                    <input type="text" name="catagory_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    @error('catagory_name')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Add Category</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- trash table start -->
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            Trash list
                        </div>
                        <!-- trash table -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">SL No</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($trashCat as $value)
                                <tr>
                                    <td scope="row"> {{ $cat -> firstItem()+$loop -> index }} </td>
                                    <td> {{ $value -> catagory_name }} </td>
                                    <td> {{ $value -> user -> name }} </td>
                                    <td> {{ $value -> created_at -> diffForHumans() }} </td>
                                    <td> 
                                        <a href="{{ url('catagory/restore/'.$value -> id) }}" class="btn btn-success"> Restore </a> 
                                        <a href="{{ url('catagory/permanentDelete/'.$value -> id) }}" class="btn btn-danger"> Permanent Delete </a> 
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $trashCat ->links() }}
                    </div>
                </div>
                <!-- trash table end -->
            </div>
        </div>
    </div>
</x-app-layout>