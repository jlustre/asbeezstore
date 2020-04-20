@include('partials.header')

<body class="bg-gradient-primary">
    <!-- container  -->
    <div class="container">
            <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">
                <!-- Start of card -->
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            @yield('content')
                        </div> <!-- End of row -->
                    </div> <!-- End of card-body -->

                </div> <!-- End of card -->
            </div> <!-- End of col-xl-10 -->
        </div> <!-- End of row -->
    </div> <!-- End of container -->

    @include('partials.footer')

</body>
</html>
