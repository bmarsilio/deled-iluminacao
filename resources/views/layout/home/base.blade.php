<!DOCTYPE html>
<html lang="en">

@include('layout.home.head')

<body>

@include('home.header')

<div id="content">

    @yield('content')

</div>

@include('layout.home.footer')

</body>
</html>