<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}   <br> 
        </h2>
        Hi <b> <font color="YellowGreen"> {{ Auth::user()->name }} </font> </b>
            <b style="float:right">
                Total Users
                <span class="badge badge-danger">{{ count($users) }}</span>
            </b>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">SL No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i = 1)
                    @foreach($users as $user)
                    <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            </div>
        </div>
    </div>
</x-app-layout>
