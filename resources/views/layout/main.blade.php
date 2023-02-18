@include('layout.header')
@include('layout.authentication')
@include('layout.toggler')
<div id="main">
    <div class="container">
        @yield('main_container')
    </div>
</div>
@include('layout.footer')