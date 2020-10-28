<?php include 'head.php'; ?>
<div class="container-fluid p-0">
    <div class="row">
        <div id="part1" class="col-6 p-0">
            <img class="img-fluid" src="<?php echo base_url(); ?>assets/images/gtr.jpg">
            <div id="hover1" class="hover hide">
                <p>Coches superdeportivos</p>
            </div>
        </div>
        <div id="part2" class="col-6 p-0">
            <img class="img-fluid" src="<?php echo base_url(); ?>assets/images/con_nissan.jpg">
            <div id="hover2" class="hover hide">
                <p>Concesionarios reconocidos</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div id="part3" class="col-6 p-0">
            <img class="img-fluid" src="<?php echo base_url(); ?>assets/images/con_mer.jpg">
            <div id="hover3" class="hover hide">
                <p>Instalaciones de éxito</p>
            </div>
        </div>
        <div id="part4" class="col-6 p-0">
            <img class="img-fluid" src="<?php echo base_url(); ?>assets/images/mercedes.jpeg">
            <div id="hover4" class="hover hide">
                <p>Coches de lujo</p>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
</body>
<script>
    $('#part1').hover(
        function() 
        {
            $('#hover1').toggleClass('hide',1200);
        }
    );

    $('#part2').hover(
        function() 
        {
            $('#hover2').toggleClass('hide',1200);
        }
    );

    $('#part3').hover(
        function() 
        {
            $('#hover3').toggleClass('hide',1200);
        }
    );

    $('#part4').hover(
        function() 
        {
            $('#hover4').toggleClass('hide',1200);
        }
    );
</script>
</html>