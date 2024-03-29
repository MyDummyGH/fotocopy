<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('pageTitle')</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('/template/assets/img/favicon/favicon.ico') }}" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('/template/assets/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('/template/assets/vendor/fonts/tabler-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('/template/assets/vendor/fonts/flag-icons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('/template/assets/vendor/css/rtl/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('/template/assets/vendor/css/rtl/theme-default.css') }}" />
    <link rel="stylesheet" href="{{ asset('/template/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('/template/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('/template/assets/vendor/libs/node-waves/node-waves.css') }}" />
    <link rel="stylesheet" href="{{ asset('/template/assets/vendor/libs/typeahead-js/typeahead.css') }}" />
    <link rel="stylesheet" href="{{ asset('/template/assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('/template/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('/template/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('/template/assets/vendor/libs/animate-css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('/template/assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('/template/assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('/template/assets/js/config.js') }}"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            @yield('sidebar')

            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                @yield('navbar')

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <!-- Main Content -->
                            @yield('mainContent')
                            <!-- /Main Content -->

                            <!-- Footer -->
                            @yield('footer')
                            <!-- / Footer -->

                            <div class="content-backdrop fade"></div>
                        </div>
                        <!-- Content wrapper -->
                    </div>
                    <!-- / Layout page -->
                </div>

                <!-- Overlay -->
                <div class="layout-overlay layout-menu-toggle"></div>

                <!-- Drag Target Area To SlideIn Menu On Small Screens -->
                <div class="drag-target"></div>
            </div>
            <!-- / Layout wrapper -->

            <!-- Core JS -->
            <!-- build:js assets/vendor/js/core.js -->
            <script src="{{ asset('/template/assets/vendor/libs/jquery/jquery.js') }}"></script>
            <script src="{{ asset('/template/assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
            <script src="{{ asset('/template/assets/vendor/libs/popper/popper.js') }}"></script>
            <script src="{{ asset('/template/assets/vendor/js/bootstrap.js') }}"></script>
            <script src="{{ asset('/template/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
            <script src="{{ asset('/template/assets/vendor/libs/node-waves/node-waves.js') }}"></script>
            <script src="{{ asset('/template/assets/vendor/libs/hammer/hammer.js') }}"></script>
            <script src="{{ asset('/template/assets/vendor/libs/i18n/i18n.js') }}"></script>
            <script src="{{ asset('/template/assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>
            <script src="{{ asset('/template/assets/vendor/libs/select2/select2.js') }}"></script>

            <script src="{{ asset('/template/assets/vendor/js/menu.js') }}"></script>
            <!-- endbuild -->

            <!-- Vendors JS -->
            <script src="{{ asset('/template/assets/vendor/libs/masonry/masonry.js') }}"></script>
            <script src="{{ asset('/template/assets/vendor/libs/datatables/jquery.dataTables.js') }}"></script>
            <script src="{{ asset('/template/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
            <script src="{{ asset('/template/assets/vendor/libs/datatables-responsive/datatables.responsive.js') }}"></script>
            <script src="{{ asset('/template/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js') }}"></script>

            <!-- Main JS -->
            <script src="{{ asset('/template/assets/js/main.js') }}"></script>

            <!-- Page Js -->

            <!-- sweetalert2 -->
            <script>
                document.getElementById('formSuratTugas').addEventListener('submit', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Berhasil!',
                        text: 'Data berhasil ditambahkan, silahkan tunggu dan periksa halaman riwayat mahasiswa terkait disetujui/ditolak surat yang diajukan.',
                        icon: 'success',
                        customClass: {
                            confirmButton: 'btn btn-primary'
                        },
                        buttonsStyling: false
                    }).then(() => {
                        this.submit();
                        setTimeout(function() {
                            window.location.href = '/';
                        }, 2000);
                    });
                });
            </script>

            <!-- dataTable -->
            <script>
                $('#myTable').dataTable({});
                // Initialize Select2
                $('#select2Product').select2({
                    templateResult: formatState
                });
            </script>

            <!-- select2 -->
            <script>
                // select2 prodi
                $(document).ready(function() {
                    $('#select2IconsProdi').select2({
                        templateResult: formatOption,
                        templateSelection: formatOption,
                    });

                    // Fungsi untuk mengatur tampilan opsi dengan ikon
                    function formatOption(option) {
                        if (!option.id) {
                            return option.text;
                        }

                        var iconClass = $(option.element).data('icon');
                        if (iconClass) {
                            // Jika opsi memiliki data-icon, tambahkan ikon ke dalam teks opsi
                            return $('<span><i class="' + iconClass + '"></i> ' + option.text + '</span>');
                        }

                        return option.text;
                    }
                });

                // select2 dospem
                $(document).ready(function() {
                    $('#select2IconsDospem').select2({
                        templateResult: formatOption,
                        templateSelection: formatOption,
                    });

                    // Fungsi untuk mengatur tampilan opsi dengan ikon
                    function formatOption(option) {
                        if (!option.id) {
                            return option.text;
                        }

                        var iconClass = $(option.element).data('icon');
                        if (iconClass) {
                            // Jika opsi memiliki data-icon, tambahkan ikon ke dalam teks opsi
                            return $('<span><i class="' + iconClass + '"></i> ' + option.text + '</span>');
                        }

                        return option.text;
                    }
                });
            </script>

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    let inputNumeric = document.querySelectorAll('.numeric-input');
                    let inputNPM = document.querySelectorAll('.npm');
                    let inputAlphabet = document.querySelectorAll('.alphabet-input');

                    inputNumeric.forEach(function(input) {
                        input.addEventListener("input", function() {
                            // Hapus karakter selain angka
                            this.value = this.value.replace(/\D/g, '');
                        });
                    });

                    inputAlphabet.forEach(function(input) {
                        input.addEventListener("input", function() {
                            this.value = this.value.replace(/[^a-zA-Z\s]/g, '');
                        });
                    });

                    inputNPM.forEach(function(input) {
                        input.addEventListener("input", function() {
                            let inputValue = input.value;

                            // Hapus karakter yang tidak valid
                            let validValue = inputValue.replace(/[^0-9]/g, '');

                            // Batasi panjang string menjadi 13 karakter
                            if (validValue.length > 13) {
                                validValue = validValue.slice(0, 13);
                            }

                            // Setel nilai input dengan string yang sudah valid
                            input.value = validValue;

                        });
                    });
                });
            </script>

            <script>
                // Wait for the document to be ready
                $(document).ready(function() {

                    // Add an event listener for the change event on the select element
                    $('#select2Product').on('change', function() {
                        // Get the selected value from the select element
                        var selectedProduct = $(this).val();

                        // Make an Ajax request to fetch data
                        $.ajax({
                            url: '/getharga/' + selectedProduct,
                            type: 'GET',
                            success: function(data) {
                                // Update the content of the result element with the fetched data
                                // $('#hargaResult').html('Harga: ' + data.harga);
                                var totalHarga = data.harga;
                                // Add an event listener for the input element
                                $('#total').on('input', function() {
                                    // Get the value from the input element
                                    var totalValue = $(this).val();
                                    console.log('Total Value:', totalHarga * totalValue);
                                    $('#harga').val(totalHarga * totalValue);
                                });
                            },
                            error: function(error) {
                                console.error('Error fetching data:', error);
                            }
                        });
                    });



                });
            </script>
</body>

</html>
