@extends('layouts/adminLayout')

@section('title', 'Edit User')

@section('content')
    <section class="blog-page">
        <div class="container">
            <div class="white-bg">
                <div class="blog-page-heading">
                    <h3>Update User</h3>
                </div>
                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="pageName" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control"value="{{ $user->name }}"
                                    placeholder="Name">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-3">
                                <label for="pageSlug" class="form-label">Email</label>
                                <input type="email" name="email" value="{{ $user->email }}" class="form-control" placeholder="email">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3 col-12">
                            <label for="user_type" class="form-label">Role</label>
                            <select name="user_type" id="user_type" class="form-select">
                                <option value="1" {{ $user->user_type == 0 ? 'selected' : '' }}>Admin</option>
                                <option value="1" {{ $user->user_type == 1 ? 'selected' : '' }}>Support</option>
                                <option value="2" {{ $user->user_type == 2 ? 'selected' : '' }}>Product Manager</option>
                                <option value="3" {{ $user->user_type == 3 ? 'selected' : '' }}>Developer</option>
                                <option value="4" {{ $user->user_type == 4 ? 'selected' : '' }}>Other</option>
                            </select>                            
                            @error('user_type')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-12"></div>
                            <div class="mt-5">
                                <button type="submit" class="btn btn-primary ms-auto d-flex waves-effect waves-light">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@push('page-script')
    <script>
        $('label').on('click', function() {
            $(this).next().focus();
        });
        init_tinymce();
    </script>
@endpush