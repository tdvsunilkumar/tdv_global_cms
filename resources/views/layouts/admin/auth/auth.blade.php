<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.admin.auth.head')
    @yield('content')
@include('layouts.admin.auth.footer_js')
</html>
