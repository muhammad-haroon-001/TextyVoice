@extends('layouts/adminLayout')

@section('title', 'Users Contact List')

@section('content')
    <section class="create-custom-page">
        <div class="container">
            <div class="white-bg">
                <div class="add-custom-page-heading">
                    <h3>Users Contact List</h3>
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
            data: {!! json_encode($contacts) !!},
            columns: [{
                    data: 'id',
                    title: 'Id'
                },
                {
                    data: null,
                    title: 'Name',
                    render: function(data, type, row) {
                        return data.name;
                    }
                },
                {
                    data: null,
                    title: 'Email',
                    render: function(data, type, row) {
                        return '<a href=" /contact/' + data.id + '">' + data.email + '</a>';
                    }
                },
                {
                    data: null,
                    title: 'Message',
                    render: function(data, type, row) {
                        return data.message;
                    }
                },
                {
                    data: null,
                    title: 'Status',
                    render: function(data, type, row) {
                        let userTypeMap = {
                            0: 'read',
                            1: 'unread',
                        };
                        let badgeClassMap = {
                            0: 'badge-primary',
                            1: 'badge-danger',
                        };
                        let userType = userTypeMap[data.read];
                        let badgeClass = badgeClassMap[data.read];
                        return `<span class="badge ${badgeClass}">${userType}</span>`;
                    }
                },
                {
                    data: null,
                    title: 'Delete',
                    render: function(data, type, row) {
                      const deleteUrl = `/contact/${data.id}`;
                        return `
                          <form action="${deleteUrl}" method="POST" style="display:inline;">
                                <input type="hidden" name="_method" value="DELETE">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this contact message?')">Delete</button>
                            </form>
                        `
                    }
                }
            ]
        });
    </script>
@endpush