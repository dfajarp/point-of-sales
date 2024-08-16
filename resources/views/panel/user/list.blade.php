@extends('layouts.app')

@section('title', 'User')

@section('content')

    <div class="pagetitle">
        <h1>User</h1>
    </div>

    <section class="section dashboard">
        <div class="col-lg-12">
            @include('_message')
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="">
                            <h5 class="card-title">User list</h5>
                        </div>
                        <div class="text-center align-middle"><a href="{{ url('panel/user/add') }}" class="btn btn-primary text-end">Add User</a></div>
                    </div>
                    <!-- Table with stripped rows -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($getRecord as $value)
                            <tr>
                                <th scope="row">{{ $value->id }}</th>
                                <th>{{ $value->name }}</th>
                                <th>{{ $value->email }}</th>
                                <th>{{ $value->role_name }}</th>
                                <th>{{ $value->created_at }}</th>
                                <th>
                                    <a href="{{ url('panel/user/edit/' . $value->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <a href="{{ url('panel/user/delete/' . $value->id) }}"
                                        class="btn btn-danger btn-sm">Delete</a>
                                </th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>


        </div>

    </section>

@endsection
