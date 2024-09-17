@extends('layouts/adminLayout')
@section('title', 'Add Users')

@section('content')
    <section class="blog-page">
        <div class="container">
            <div class="white-bg">
                <div class="blog-page-heading">
                    <h3>Add Users</h3>
                </div>
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="pageName" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control"
                                    placeholder="Name">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    placeholder="Email Address">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password"
                                    placeholder="Password must be 8 characters">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3 col-12">
                            <label for="user_type" class="form-label">Role</label>
                            <select name="user_type" id="user_type" class="form-select">
                                <option value="0">Admin</option>
                                <option value="1">Support</option>
                                <option value="2">Product Manager</option>
                                <option value="3">Developer</option>
                                <option value="4">Other</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <div class="mt-5">
                                <button type="submit" class="btn btn-primary ms-auto d-flex waves-effect waves-light">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection