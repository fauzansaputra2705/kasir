{{-- <script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script> --}}
<script src="{{ asset('DataTables/datatables.js') }}"></script>
<script src="{{ asset('pace/pace.js') }}"></script>

	<!-- General JS Scripts -->
{{-- <script src="{{ asset('assets/modules/jquery.min.js') }}"></script> --}}
<script src="{{ asset('assets/modules/popper.js') }}"></script>
<script src="{{ asset('assets/modules/tooltip.js') }}"></script>
<script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('assets/modules/moment.min.js') }}"></script>
<script src="{{ asset('assets/js/stisla.js') }}"></script>

<!-- JS Libraies -->
<script src="{{ asset('assets/modules/simple-weather/jquery.simpleWeather.min.js') }}"></script>
<script src="{{ asset('assets/modules/chart.min.js') }}"></script>
<script src="{{ asset('assets/modules/jqvmap/dist/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('assets/modules/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
<script src="{{ asset('assets/modules/summernote/summernote-bs4.js') }}"></script>
<script src="{{ asset('assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('assets/js/page/index-0.js') }}"></script>

<!-- Template JS File -->
<script src="{{ asset('assets/js/scripts.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>

<script src="{{ asset('assets/validator/validator.min.js') }}"></script>
<script src="{{ asset('assets/validator/validator.js') }}"></script>
<script src="{{ asset('assets/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets/js/ie-emulation-modes-warning.js') }}"></script>
<script src="{{ asset('assets/js/ie10-viewport-bug-workaround.js') }}"></script>


@yield('addscript')
</body>
</html>