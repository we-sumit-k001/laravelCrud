<!doctype html>
<html lang="en">
<head>
    @include('partial.header')
</head>

<body>

<header class="header">
    @include('partial.navbar')
</header>

<div class="main mt-5 mb-5">
    @yield('content')
</div>


<footer class="footer" style="background-color: #464e62 !important;">
    @include('partial.footer');
</footer>


</body>


@stack('scripts')


</html>

