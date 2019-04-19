<script src="vendor/components/jquery/jquery.min.js"></script>
<script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
<script>
    $('.nav-link').each(function(){
        var el = $(this);
        var parent = el.parent();
        if(window.location.pathname == el.attr('href')){
            parent.addClass('active')
        }
    })
</script>
</body>

</html> 