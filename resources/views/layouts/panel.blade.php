<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ $title ?? '' }} - {{ config('app.name') }}</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    
    <!-- Template CSS -->
    <link rel="stylesheet" href="/assets/stisla/style.css">
    <link rel="stylesheet" href="/assets/stisla/components.css">
    
    <!-- Specific Page CSS -->
    @stack('style')
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            @include('components.admin.navbar')
            @include('components.admin.sidebar')

            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>{{ $title ?? '' }}</h1>
                        @yield('header-breadcrumb')
                    </div>
                    <div class="section-body">
                        @yield('content')
                    </div>
                </section>
            </div>
            @include('components.admin.footer')
        </div>
    </div>
    
    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="/assets/stisla/stisla.js"></script>
    
    <!-- Template JS File -->
    <script src="/assets/stisla/scripts.js"></script>
    @include('components.utils.sweetalert')

    <!-- Specific Page JS -->
    @stack('script')

</body>
</html>
