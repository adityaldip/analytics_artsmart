<!doctype html>
<html lang="en-US" dir="ltr" class="v2 fontawesome-i2svg-pending">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ARTSMART AI</title>

    <script src="/assets/js/jquery.min.js"></script>
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="https://artsmart.ai/ms-icon-144x144.png?v=21072301">
    <meta name="theme-color" content="#ffffff">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&family=Outfit:wght@100;200;300;400;500;600&display=swap" rel="stylesheet">
    <script>(function(w,r){w._rwq=r;w[r]=w[r]||function(){(w[r].q=w[r].q||[]).push(arguments)}})(window,'rewardful');</script>
    <script async src="https://r.wdfl.co/rw.js" data-rewardful="3293a2"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-40KWG0VX33"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cNoto+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="/vendors/overlayscrollbars/OverlayScrollbars.min.css" rel="stylesheet">
    <link href="/assets/css/theme.css?v=21072301" rel="stylesheet" id="style-default">
    <link href="/assets/css/user.css?v=21072301" rel="stylesheet" id="user-style-default">
    <link href="/assets/css/app.css?v=21072301" rel="stylesheet" id="app-style-default">
    <link href="/assets/css/custom.css?v=21072301" rel="stylesheet" id="app-custom-style">
    @yield('css')
</head>
<body style="background:#0b1727">
    <div id="device-size-detector">
        <div id="xs" class="d-block d-sm-none"></div>
        <div id="sm" class="d-none d-sm-block d-md-none"></div>
        <div id="md" class="d-none d-md-block d-lg-none"></div>
        <div id="lg" class="d-none d-lg-block d-xl-none"></div>
        <div id="xl" class="d-none d-xl-block"></div>
    </div>
    
    <main class="main">
        @include('layouts.sidebar') 
        @yield('content')
    </main>
</body>
</html>
