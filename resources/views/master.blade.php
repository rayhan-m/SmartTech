@php
    $setting=App\GeneralSetting::where('active_status',1)->first();
@endphp

@include('include.header')

@yield('mainContent')

@include('include.footer')      