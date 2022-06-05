<footer class="footer">

        
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
<script src="{{ asset('js/jquery.js') }}"></script>
<script>
$(document).ready(function(){
    
    $('ul#querylist li').click(function(e) 
    { 
        let currentid = $('ul#querylist li.active').attr('id');
        let selectedid = $(this).attr('id');
        let selcontn = $(this).find('#qcon').text();
        if((currentid === 'undefined' ) || (currentid != selectedid)){
        $('ul#querylist li.active').removeClass("active");
        $(this).addClass("active");
        }
        $('.chat-history p#dcont').text(selcontn);
    });
    

});
</script>


</body>
</html>