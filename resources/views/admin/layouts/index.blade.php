<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Majestic Admin</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="{{asset('administrator/vendors/mdi/css/materialdesignicons.min.css')}}">
        <link rel="stylesheet" href="{{asset('administrator/vendors/base/vendor.bundle.base.css')}}">
        <!-- endinject -->
        <!-- plugin css for this page -->
        <link rel="stylesheet" href="{{asset('administrator/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="{{asset('administrator/css/style.css')}}">
        <!-- endinject -->
        <link rel="shortcut icon" href="{{asset('administrator/images/favicon.png')}}" />

        <!-- plugins:js -->
        <script src="{{asset('administrator/vendors/base/vendor.bundle.base.js')}}"></script>
        <!-- endinject -->
        <!-- Plugin js for this page-->
        <script src="{{asset('administrator/vendors/chart.js/Chart.min.js')}}"></script>
        <script src="{{asset('administrator/vendors/datatables.net/jquery.dataTables.js')}}"></script>
        <script src="{{asset('administrator/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
        <!-- End plugin js for this page-->
        <!-- inject:js -->
        <script src="{{asset('administrator/js/off-canvas.js')}}"></script>
        <script src="{{asset('administrator/js/hoverable-collapse.js')}}"></script>
        <script src="{{asset('administrator/js/template.js')}}"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <script src="{{asset('administrator/js/dashboard.js')}}"></script>
        <script src="{{asset('administrator/js/data-table.js')}}"></script>
        <script src="{{asset('administrator/js/jquery.dataTables.js')}}"></script>
        <script src="{{asset('administrator/js/dataTables.bootstrap4.js')}}"></script>
        <!-- End custom js for this page-->
        <script src="{{asset('administrator/js/jquery.cookie.js')}}" type="text/javascript"></script>
    </head>
    <body>
        <div class="container-scroller">
            {{$slot}}
        </div>
    </body>
</html>
