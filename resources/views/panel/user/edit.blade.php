@extends('layouts.app')

@section('title', 'Role')

@section('content')

    <div class="pagetitle">
        <h1>Edit User</h1>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit User</h5>

                        <!-- General Form Elements -->
                        <form action="" method="post">
                            @csrf
                            <div class="row mb-3">
                                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-12">
                                    <input type="text" name="name" value="{{ $getRecord->name }}" required class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-12">
                                    <input type="email" name="email" value="{{ $getRecord->email }}" readonly required class="form-control">
                                    <div class="text-danger">{{ $errors->first('email') }}</div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-12">
                                    <input type="text" name="password" class="form-control">
                                    (Do you want to change password please add. Otherwise leave it)
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputRole" class="col-sm-2 col-form-label">Role</label>
                                <div class="col-sm-12">
                                   <select class="form-control" name="role_id" id="" required>
                                    <option value="">Select</option>
                                  @foreach ($getRole as $value)
                                      <option {{ ($getRecord->role_id == $value->id) ?'selected' : '' }} value="{{ $value->id }}">{{ $value->name }}</option>
                                  @endforeach
                                   </select>
                                </div>
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
