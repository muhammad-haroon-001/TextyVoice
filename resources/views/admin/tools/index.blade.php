@extends('layouts/adminLayout')
@section('title', 'Tools')
@push('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
@endpush
@push('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
@endpush
@section('content')
    <section class="tool-index">
        <div class="container">
            <div class="white-bg">
                <div class="index-tools-wrapper">
                    <div class="tools">
                        <div class="add-tool-heading">
                            <h3>All Tools:</h3>
                            @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                        </div>
                        
                        <div class="table-responsive">
                            <table id="tools_table" class="table table-responsive">
                                <thead>
                                    <tr>

                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('page-script')
<script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
<script>
    $("#tools_table").DataTable({
        data: {!! json_encode($tools) !!},
        columns: [{
                data: 'id',
                title: 'Id'
            },
            {
                data: null,
                title: 'Name/Slug',
                render: function(data, type, row) {
                    return '<a href=" /emd/edit-tool/' + data.tool_slug + '">' + data.tool_name + '</a> <br> ' + data.tool_slug;
                }
            },
            {
                data: null,
                title: 'Parent',
                render: function(data, type, row) {
                    return data.parent ? data.parent.tool_name : data.tool_name;
                }
            },
            {
                data: null,
                title: 'Language',
                render: function(data, type, row) {
                    return data.language;
                }
            },
            {
                data: null,
                title: 'Actions',
                orderable: false,
                searchable: false,
                render: function(data, type, row) {
                    var deleteUrl = `/emd/delete-tool/${data.id}`;
                    return `
               <form action="${deleteUrl}" method="POST" style="display:inline;">
                       <input type="hidden" name="_method" value="DELETE">
                       @csrf
                       <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this tool?')">Delete</button>
                   </form>
           `;
                }
            }
        ],
        paging: true,
        pageLength: 10,
        lengthMenu: [5, 10, 25, 50, 100],
        ordering: true,
        search: true,
        responsive: true
    });
</script>
@endpush
