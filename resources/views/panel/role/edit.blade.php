@extends('layouts.app')

@section('title', 'Role')

@section('content')

    <div class="pagetitle">
        <h1>Edit Role</h1>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit role</h5>

                        <!-- General Form Elements -->
                        <form action="" method="post">
                            @csrf
                            <div class="row mb-3">
                                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-12">
                                    <input type="text" name="name" required class="form-control"
                                        value="{{ $getRecord->name }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputName"
                                    class="col-sm-2 col-form-label d-block mb-3"><b>Permission</b></label>

                                @foreach ($getPermission as $value)
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            {{ $value['name'] }}
                                        </div>
                                        <div class="col-md-9">
                                            <div class="row">
                                                @foreach ($value['group'] as $group)
                                                    @php
                                                        $checked = '';
                                                    @endphp
                                                    @foreach ($getRolePermission as $role)
                                                        @if ($role->permission_id == $group['id'])
                                                            @php
                                                                $checked = 'checked';
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                    <div class="col-md-3">
                                                        <label for=""><input type="checkbox" {{ $checked }}
                                                                value="{{ $group['id'] }}" name="permission_id[]">
                                                            {{ $group['name'] }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-12 text-end">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>

                        </form><!-- End General Form Elements -->

                    </div>
                </div>

            </div>

        </div>
    </section>

@endsection
