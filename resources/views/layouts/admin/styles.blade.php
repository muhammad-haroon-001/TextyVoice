<!-- BEGIN: Theme CSS-->
<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap" rel="stylesheet">
 <!-- Include DataTables CSS -->
 <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

 <!-- Optionally include DataTables CSS for Bootstrap integration -->
 <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('assets/vendors/fonts/materialdesignicons.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendors/libs/node-waves/node-waves.css') }}" />
<!-- Core CSS -->
<link rel="stylesheet" href="{{ asset('assets/vendors/css/core.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendors/css/theme-default.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/admin/css/demo.css') }}" />
<!-- Vendors CSS -->
<link rel="stylesheet" href="{{ asset('assets/vendors/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/admin/css/admin.css')}}">

<!-- Vendor Styles -->
@stack('vendor-style')


<!-- Page Styles -->
@stack('page-style')
