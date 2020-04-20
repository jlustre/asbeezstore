@include('partials.admin.header')

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        @include('partials.admin.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                @include('partials.topbar')

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @yield('content')
                </div> <!-- End Page Content /.container-fluid -->
            </div> <!-- End of Main Content -->

            {{-- This is where the footer links and copyright --}}
            @include('partials.admin.footer1')
        </div> <!-- End of Content Wrapper -->
    </div> <!-- End of Page Wrapper -->

    <!-- Scroll Icon to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    @include('partials.admin.modal')
    @include('partials.admin.scripts')

</body>
</html>
