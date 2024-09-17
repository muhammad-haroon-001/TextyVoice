@extends('layouts/adminLayout')

@section('title', 'User Trash')

@section('content')
    <section class="trash-tools">
        <div class="container">
            <div class="white-bg">
                <div class="index-tools-wrapper">
                    <div class="tools">
                        <div class="add-tool-heading">
                            <h3>Trash User:</h3>
                        </div>
                        <table id="tools_table" class="table table-responsive">
                            <thead>
                                <tr></tr>
                            </thead>
                            <tbody></tbody>
                        </table>
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
            data: {!! json_encode($users) !!},
            columns: [{
                    data: 'id',
                    title: 'Id'
                },
                {
                    data: null,
                    title: 'Name',
                    render: function(data, type, row) {
                        return data.title + ' <br> ' + data.email;
                    }
                },

                {
                    data: null,
                    title: 'Actions',
                    render: function(data, type, row) {
                        var restoreUrl = `/emd/restore-user/${data.id}`;
                        return '<form action="' + restoreUrl + '" method="POST">' +
                            '<input type="hidden" name="_method" value="PUT">' +
                            '@csrf' +
                            '<button type="submit" class="restore-tool btn btn-primary" data-tool_id="' + data.id + '" >Restore</button>' +
                            '</form>';
                    }}
            ]


        });
    </script>
@endpush