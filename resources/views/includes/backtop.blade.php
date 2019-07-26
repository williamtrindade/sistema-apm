<a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Voltar ao Topo" data-toggle="tooltip" data-placement="left"><i class="fas fa-chevron-up"></i></a>

<style>
    .back-to-top {
        cursor: pointer;
        position: fixed;
        bottom: 20px;
        right: 20px;
        display:none;
    }
</style>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $(window).scroll(function () {
                if ($(this).scrollTop() > 50) {
                    $('#back-to-top').fadeIn();
                } else {
                    $('#back-to-top').fadeOut();
                }
            });
            // scroll body to 0px on click
            $('#back-to-top').click(function () {
                $('#back-to-top').tooltip('hide');
                $('body,html').animate({
                    scrollTop: 0
                }, 800);
                return false;
            });
            
            $('#back-to-top').tooltip('show');

    });
</script>