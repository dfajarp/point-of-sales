@extends('layouts.app')

@section('title', 'Role')

@section('content')

    <div class="pagetitle">
        <h1>Role</h1>
    </div>

    <section class="section dashboard">
        <div class="col-lg-12">
            @include('_message')
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="">
                            <h5 class="card-title">Role list</h5>
                        </div>
                        <div class="text-center align-middle">
                            @if (!empty($permission_add))
                                <a href="{{ url('panel/role/add') }}" class="btn btn-primary text-end">Add Role</a>
                            @endif
                        </div>
                    </div>

                    <!-- Table with stripped rows -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Date</th>
                                @if (!empty($permission_edit) || !empty($permission_delete))
                                    <th scope="col">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($getRecord as $value)
                                <tr>
                                    <th scope="row">{{ $value->id }}</th>
                                    <th>{{ $value->name }}</th>
                                    <th>{{ $value->created_at }}</th>
                                    <th>
                                        @if (!empty($permission_edit))
                                            <a href="{{ url('panel/role/edit/' . $value->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                        @endif

                                        @if (!empty($permission_delete))
                                            <a href="{{ url('panel/role/delete/' . $value->id) }}"
                                                class="btn btn-danger btn-sm">Delete</a>
                                        @endif

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
