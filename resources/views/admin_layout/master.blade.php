<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Admin | @yield('title') </title>
    <!--bootstarp-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- css -->
    <link rel="stylesheet" href={{asset('frontend/css/style.css')}}>
</head>

<body>

     <!-- Main Sidebar Container -->
        @include('admin_layout.sidebar')
     <!-- /.Main Sidebar Container -->

     <!-- header -->
     <div class="content">
        @include('admin_layout.header')
        {{-- start content --}}
            @yield('content')
        {{-- end content --}}
     </div>
     <!-- /.header -->

    <script src="{{asset('frontend/js/index.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
