@extends('layouts/adminLayout')

@section('title', 'Blogs')

@section('content')
    <section class="create-custom-page">
        <div class="container">
            <div class="white-bg">
                <div class="add-custom-page-heading">
                    <h3>EMD USERS</h3>
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
            data: {!! json_encode($users) !!},
            columns: [{
                    data: 'id',
                    title: 'Id'
                },
                {
                    data: null,
                    title: 'Name',
                    render: function(data, type, row) {
                        return '<a href=" /emd/users/' + data.id + '/edit">' + data.name + '</a>';
                    }
                },
                {
                    data: null,
                    title: 'Email',
                    render: function(data, type, row) {
                        return data.email;
                    }
                },
                {
                    data: null,
                    title: 'Hash',
                    render: function(data, type, row) {
                        return data.hash;
                    }
                },
                {
                    data: null,
                    title: 'Role',
                    render: function(data, type, row) {
                        let userTypeMap = {
                            0: 'Admin',
                            1: 'Support',
                            2: 'Product Manager',
                            3: 'Developer',
                            4: 'Other'
                        };
                        let badgeClassMap = {
                            0: 'badge-admin',
                            1: 'badge-support',
                            2: 'badge-product-manager',
                            3: 'badge-developer', 
                            4: 'badge-other'
                        };
                        let userType = userTypeMap[data.user_type];
                        let badgeClass = badgeClassMap[data.user_type];
                        return `<span class="badge ${badgeClass}">${userType}</span>`;
                    }
                },
                {
                    data: null,
                    title: 'Delete',
                    render: function(data, type, row) {
                      const deleteUrl = `/emd/users/${data.id}`;
                        return `
                          <form action="${deleteUrl}" method="POST" style="display:inline;">
                                <input type="hidden" name="_method" value="DELETE">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                            </form>
                        `
                    }
                }
            ]
        });
    </script>
@endpush