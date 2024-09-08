@extends('layouts/adminLayout')
@section('title', 'Add Blog')

@section('content')
    <section class="blog-page">
        <div class="container">
            <div class="white-bg">
                <div class="blog-page-heading">
                    <h3>Add Blog</h3>
                </div>
                <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="pageName" class="form-label">Title</label>
                                <input type="text" name="title" class="form-control" id="blogTitle"
                                    placeholder="Title">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-3">
                                <label for="pageSlug" class="form-label">Slug</label>
                                <input type="text" name="slug" class="form-control" id="blogSlug"
                                    placeholder="slug">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-3">
                                <label for="metaTitle" class="form-label">Meta Title</label>
                                <input type="text" name="meta_title" class="form-control" id="metaTitle"
                                    placeholder="Meta Title">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-3">
                                <label for="meta_description" class="form-label">Meta Description</label>
                                <input type="text" name="meta_description" class="form-control" id="meta_description"
                                    placeholder="Meta Description">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3 col-12">
                            <label for="language" class="form-label">Language</label>
                            <select name="language" id="language" class="form-select">
                                @foreach ($languageData['languages'] as $lang)
                                    <option value="{{ $lang['code'] }}">{{ $lang['name'] }}
                                        ({{ $lang['code'] }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3 col-12">
                            <label for="parent_id" class="form-label">Parent</label>
                            <select name="parent_id" id="parent_id" class="form-select">
                                <option value="0">This is Parent</option>
                                @foreach ($blogs as $item)
                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-3">
                                <label for="meta_description" class="form-label">Image</label>
                                <input type="file" name="image" class="form-control" id="image">
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-3 col-12">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-select">
                                <option value="1">Active</option>
                                <option value="0">Non-active</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="status" class="form-label">Description</label>
                            <textarea name="description" class="tool_textarea"></textarea>
                        </div>

                        <div class="col-12"></div>
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

@push('page-script')
    <script>
        $('label').on('click', function() {
            $(this).next().focus();
        });
        $("#blogTitle").bind('keyup change input', function() {
            let val = $(this).val().toLowerCase().trim();
            val = val.replaceAll(" ", "-");
            $('#blogSlug').val(val.replaceAll("/", "-"));
        });
        init_tinymce();
    </script>
@endpush