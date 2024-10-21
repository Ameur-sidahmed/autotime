<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>client | @yield('title')</title>
    <link rel="stylesheet" href="{{asset('frontend/css/style1.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/style2.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/style3.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/style4.css')}}">
    <!--bootstarp-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!--icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!--font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Belanosima:wght@600;700&family=Comfortaa:wght@300&family=Hind:wght@300&family=Montserrat&family=Noto+Sans:ital,wght@0,100;1,300&family=Open+Sans:ital,wght@0,300;0,400;1,400&family=Outfit:wght@100;200&family=PT+Sans+Caption&family=Poppins:wght@100;300&family=Quicksand:wght@300;500;600&family=Raleway:wght@100&family=Roboto:ital,wght@0,100;1,300;1,400;1,900&family=Rubik+Iso&family=Rubik:ital,wght@0,300;0,400;1,300&family=Ubuntu:ital,wght@0,300;1,300&display=swap" rel="stylesheet">
</head>

<body>

    {{-- start content --}}
    @yield('content')
    {{-- end content --}}

    <!-- footer -->
    @include('client_layout.footer')
    <!-- /.end footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{asset('frontend/js/script.js')}}"></script>
    <script src="{{asset('frontend/js/script2.js')}}"></script>
</body>
