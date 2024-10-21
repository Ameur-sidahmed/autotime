<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href={{ asset('frontend/css/stylex.css') }}>
    <title>CT | @yield('title')</title>
    <!--bootstarp-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>

    <!-- Main Sidebar Container -->
    @include('controle_tech_layout.sidebar')
    <!-- /.Main Sidebar Container -->

    <!-- header -->
    <div class="content">
       @include('controle_tech_layout.header')
       {{-- start content --}}
           @yield('content')
       {{-- end content --}}
    </div>
    <!-- /.header -->

    <script src="{{ asset('frontend/js/indexx.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

