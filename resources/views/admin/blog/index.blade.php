@extends('layouts/adminLayout')

@section('title', 'Blogs')

@section('content')
    <section class="create-custom-page">
        <div class="container">
            <div class="white-bg">
                <div class="add-custom-page-heading">
                    <h3>EMD Blogs</h3>
                </div>
                <div class="table-responsive">
                    <table id="custom_page_table" class="table"></table>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('page-script')
    <script>
        $("#custom_page_table").DataTable({
            data: {!! json_encode($blogs) !!},
            columns: [{
                    data: 'id',
                    title: 'Id'
                },
                {
                    data: null,
                    title: 'Title',
                    render: function(data, type, row) {
                        return '<a href=" /emd/blog/' + data.id + '/edit">' + data.title + '</a>';
                    }
                },
                {
                    data: null,
                    title: 'Slug',
                    render: function(data, type, row) {
                        return data.slug;
                    }
                },
                {
                    data: null,
                    title: 'Meta Title',
                    render: function(data, type, row) {
                        return data.meta_title;
                    }
                },
                {
                    data: null,
                    title: 'Meta Title',
                    render: function(data, type, row) {
                        return data.meta_description;
                    }
                },
                {
                    data: null,
                    title: 'Delete',
                    render: function(data, type, row) {
                      const deleteUrl = `/emd/blog/${data.id}`;
                        return `
                          <form action="${deleteUrl}" method="POST" style="display:inline;">
                                <input type="hidden" name="_method" value="DELETE">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this blog?')">Delete</button>
                            </form>
                        `
                    }
                }
            ]
        });
    </script>
@endpush