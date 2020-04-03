
<footer class="footer-area section-gap">
    <div class="container">
        <div class="row">

            <div class="col-lg-1  col-md-1 col-sm-1">
                <div class="single-footer-widget">


                </div>
            </div>

            <div class="col-lg-5 col-md-6 col-sm-6">
                <div class="single-footer-widget">

                    <p style="color:white;">
                        @yield('copyright')
                    </p>


                </div>
            </div>


            <div class="col-lg-3  col-md-3 col-sm-3">
                <div class="single-footer-widget">


                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6 social-widget">
                <div class="single-footer-widget">
                    <h6>Follow Us</h6>
                    <p>Let us be social</p>
                    <div class="footer-social d-flex align-items-center">
                        <a href="@yield('fb')"><img src="{{ asset('Photos/Icons/fb.png') }}"></a>
                        <a href="@yield('tw')"><img src="{{ asset('Photos/Icons/twitter.png') }}"></a>
                        <a href="@yield('in')"><img src="{{ asset('Photos/Icons/ins.png') }}"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
