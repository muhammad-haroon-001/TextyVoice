@extends('layouts/adminLayout')

@section('title', 'Edit Blog')

@section('content')
    <section class="blog-page">
        <div class="container">
            <div class="white-bg">
                <div class="blog-page-heading">
                    <h3>Update Blog</h3>
                </div>
                <form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="pageName" class="form-label">Title</label>
                                <input type="text" name="title" class="form-control"value="{{ $blog->title }}"
                                    placeholder="Title">
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-3">
                                <label for="pageSlug" class="form-label">Slug</label>
                                <input type="text" name="slug" value="{{ $blog->slug }}" class="form-control bg-light" readonly
                                    placeholder="slug">
                                @error('slug')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-3">
                                <label for="metaTitle" class="form-label">Meta Title</label>
                                <input type="text" name="meta_title" value="{{ $blog->meta_title }}" class="form-control" id="metaTitle"
                                    placeholder="Meta Title">
                                    @error('meta_title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-3">
                                <label for="meta_description" class="form-label">Meta Description</label>
                                <input type="text" name="meta_description" value="{{ $blog->meta_description }}" class="form-control" id="meta_description"
                                    placeholder="Meta Description">
                                    @error('meta_description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-3">
                                <label for="meta_description" class="form-label">Language</label>
                                <input type="text" name="language" value="{{ $blog->language }}" class="form-control bg-light" readonly
                                    placeholder="Language">
                                    @error('language')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-3">
                                <label for="meta_description" class="form-label">Parent</label>
                                <input type="hidden" name="parent_id" 
                                value="@if ($blog->parent_id != 0) {{ $blog->parent_id }} @else 0 @endif" 
                                class="form-control bg-light" readonly
                                    placeholder="Language">
                                <input type="text" 
                                value="@if ($blog->parent_id != 0) {{ $blog->parent->title }} @else Parent Tool @endif" 
                                class="form-control bg-light" readonly>
                                @error('language')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-3">
                                <label for="meta_description" class="form-label">Image</label>
                                <input type="file" name="image" class="form-control" id="image">
                                @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-3 col-12">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-select">
                                <option {{ $blog->status == 1 ? 'selected' : '' }} value="1">Active
                                </option>
                                <option {{ $blog->status == 0 ? 'selected' : '' }} value="0">Non-active
                                </option>
                            </select>
                            @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="status" class="form-label">Description</label>
                            <textarea name="description" class="tool_textarea">{{ $blog->description }}</textarea>
                            @error('description')
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