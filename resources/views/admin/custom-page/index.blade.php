@extends('layouts/adminLayout')

@section('title', 'Create')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
@endsection


@section('content')
    <section class="create-custom-page">
        <div class="container">
            <div class="white-bg">
                <div class="add-custom-page-heading">
                    <h3>EMD Custom Pages</h3>
                </div>
                <table id="custom_page_table" class="table">

                </table>
            </div>
        </div>
    </section>
@endsection
@push('page-script')
    <script>
        $("#custom_page_table").DataTable({
            data: {!! json_encode($customPages) !!},
            columns: [{
                    data: 'id',
                    title: 'Id'
                },
                {
                    data: null,
                    title: 'Name',
                    render: function(data, type, row) {
                        return '<a href=" /emd/custom-page/' + data.id + '/edit">' + data.name + '</a>';
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
                    title: 'page Key',
                    render: function(data, type, row) {
                        return data.page_key;
                    }
                },
                {
                    data: null,
                    title: 'Blade File',
                    render: function(data, type, row) {
                        return data.blade_view;
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
                      const deleteUrl = `/emd/custom-page/${data.id}`;
                        return `
                          <form action="${deleteUrl}" method="POST" style="display:inline;">
                                <input type="hidden" name="_method" value="DELETE">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this tool?')">Delete</button>
                            </form>
                        `
                    }
                }
            ]
        });
    </script>
@endpush
