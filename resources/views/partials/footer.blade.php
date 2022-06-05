   <!-- Start Footer Area -->
   <footer class="footer">
        <!-- Start Middle Top -->
        <div class="footer-middle">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-5 col-12">
                        <!-- Single Widget -->
                        <div class="f-about single-footer">
                            <div class="logo">
                                <a href="index.html"><img src="{{ asset('images/logo.svg') }}" alt="#"></a>
                            </div>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has been the industry.</p>
                            <div class="footer-social">
                                <ul>
                                    <li><a href="#"><i class="lni lni-facebook-filled"></i></a></li>
                                    <li><a href="#"><i class="lni lni-twitter-original"></i></a></li>
                                    <li><a href="#"><i class="lni lni-linkedin-original"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-5 col-md-7 col-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-6">
                                <!-- Single Widget -->
                                <div class="single-footer f-link">
                                    <h3>Company</h3>
                                    <ul>
                                        <li><a href="#">About Comapny</a></li>
                                        <li><a href="#">Privacy Policy</a></li>
                                    </ul>
                                </div>
                                <!-- End Single Widget -->
                            </div>
                            <div class="col-lg-6 col-md-6 col-6">
                                <!-- Single Widget -->
                                <div class="single-footer f-contact f-link">
                                    <h3>Contact Us</h3>
                                    <p>Untrammelled & nothing preven our being able</p>
                                    <ul class="footer-contact">
                                        <li><i class="lni lni-phone"></i> <a href="#">+092 (345) 6789</a></li>
                                        <li><i class="lni lni-envelope"></i> <a
                                                href="mailto:support@gmail.com">support@traderslink.pk</a></li>
                                        <li><i class="lni lni-map-marker"></i> Pakistan</li>
                                        
                                    </ul>
                                </div>
                                <!-- End Single Widget -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer gallery">
                            <h3>Photo Gallery</h3>
                            <ul class="list">
                                <li><a href="#"><img src="{{ asset('images/gallery1.jpg') }}" alt="#"><i
                                            class="lni lni-instagram"></i></a></li>
                                <li><a href="#"><img src="{{ asset('images/gallery2.jpg') }}" alt="#"><i
                                            class="lni lni-instagram"></i></a></li>
                                <li><a href="#"><img src="{{ asset('images/gallery3.jpg') }}" alt="#"><i
                                            class="lni lni-instagram"></i></a></li>
                                <li><a href="#"><img src="{{ asset('images/gallery4.jpg') }}" alt="#"><i
                                            class="lni lni-instagram"></i></a></li>
                                <li><a href="#"><img src="{{ asset('images/gallery5.jpg') }}" alt="#"><i
                                            class="lni lni-instagram"></i></a></li>
                                <li><a href="#"><img src="{{ asset('images/gallery6.jpg') }}" alt="#"><i
                                            class="lni lni-instagram"></i></a></li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Footer Middle -->
        <!-- Start Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="inner">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="left">
                                <p>Designed and Developed by<a href="#" rel="nofollow"
                                        target="_blank">MathTech</a></p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="right">
                                <p>All Right Reserved Design By Traderslink</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Middle -->
    </footer>
    <!--/ End Footer Area -->
    <a href="#" class="scroll-top btn-hover">
        <i class="lni lni-chevron-up"></i>
    </a>
    <script src="{{ asset('js/count-up.min.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/tiny-slider.js') }}"></script>
    <script src="{{ asset('js/glightbox.min.js') }}"></script>
    <script src="{{ asset('js/imagesloaded.min.js') }}"></script>
    <script src="{{ asset('js/isotope.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script type="text/javascript">

            var slider = new tns({
            container: '.home-slider',
            slideBy: 'page',
            autoplay: false,
            mouseDrag: true,
            gutter: 0,
            items: 1,
            nav: true,
            controls: false,
            controlsText: [
                '<i class="lni lni-arrow-left prev"></i>',
                '<i class="lni lni-arrow-right next"></i>'
            ],
            responsive: {
                1200: {
                    items: 1,
                },
                992: {
                    items: 1,
                },
                0: {
                    items: 1,
                }

            }
        });
    </script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
        $('#type').change(function () {
            if($(this).prop("checked") == true){
                console.log("Checkbox is checked.");
                $("#vencity").css("display", "block");
            }else{
                $("#vencity").css("display", "none");
            }
        });
        });
    </script>
</body>
</html>
