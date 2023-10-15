<x-guest-layout>
<x-slot name="css">
	<link rel="icon" href="{{ asset('assets/images/dashboard/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/dashboard/favicon.png') }}" type="image/x-icon">

    <!-- Google font-->
    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,500;1,600;1,700;1,800;1,900&display=swap">

    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">


    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/font-awesome.css') }}">

    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/flag-icon.css') }}">

    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/icofont.css') }}">

    <!-- Prism css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">

    <!-- Chartist css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/chartist.css') }}">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/bootstrap.css') }}">

    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
</x-slot>
<x-slot name="js">
	<script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>

    <!-- Bootstrap js-->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- feather icon js-->
    <script src="{{ asset('assets/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/icons/feather-icon/feather-icon.js') }}"></script>

    <!-- Sidebar jquery-->
    <script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>

    <!--chartist js-->
    <script src="{{ asset('assets/js/chart/chartist/chartist.js') }}"></script>

    <!--chartjs js-->
    <script src="{{ asset('assets/js/chart/chartjs/chart.min.js') }}"></script>

    <!-- lazyload js-->
    <script src="{{ asset('assets/js/lazysizes.min.js') }}"></script>

    <!--copycode js-->
    <script src="{{ asset('assets/js/prism/prism.min.js') }}"></script>
    <script src="{{ asset('assets/js/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom-card/custom-card.js') }}"></script>

    <!--counter js-->
    <script src="{{ asset('assets/js/counter/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/counter/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/counter/counter-custom.js') }}"></script>

    <!--peity chart js-->
    <script src="{{ asset('assets/js/chart/peity-chart/peity.jquery.js') }}"></script>

    <!-- Apex Chart Js -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <!--sparkline chart js-->
    <script src="{{ asset('assets/js/chart/sparkline/sparkline.js') }}"></script>

    <!--Customizer admin-->
    <script src="{{ asset('assets/js/admin-customizer.js') }}"></script>

    <!--dashboard custom js-->
    <script src="{{ asset('assets/js/dashboard/default.js') }}"></script>

    <!--right sidebar js-->
    <script src="{{ asset('assets/js/chat-menu.js') }}"></script>

    <!--height equal js-->
    <script src="{{ asset('assets/js/height-equal.js') }}"></script>

    <!-- lazyload js-->
    <script src="{{ asset('assets/js/lazysizes.min.js') }}"></script>

    <!--script admin-->
    <script src="{{ asset('assets/js/admin-script.js') }}"></script>
</x-slot>
</x-guest-layout>
