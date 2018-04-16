<!-- ========================================== start of footer ========================================== -->
<?php if($this->uri->segment(2) != 'get_provinsi') { ?>
    <footer class="text-muted">
        <div class="container">
            <p>Copyright &copy; <a href="https://newgarudajayatotabuan.com">New Garuda Jaya Totabuan</a></p>
            <p>Jl. Hi. Zakaria Imban, Kel. Molinow, Kec. Kotamobagu Barat, Kota Kotamobagu.</p>
        </div>
    </footer>
<?php } ?>
<!-- ========================================== end of footer ========================================== -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/holder.min.js"></script>

    <!-- select2 links -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <!-- select2 script -->
    <script type="text/javascript">
    $(".js-example-placeholder-single1").select2({
        placeholder: "Nama Provinsi",
        allowClear: true
    });
    
    $(".js-example-placeholder-single2").select2({
        placeholder: "Nama Kabupaten/Kota",
        allowClear: true
    });
    </script>

<script type="text/javascript">
<script type="text/javascript">
    $(document).ready(function(){
        $('#id_provinces').change(function(){
            var id=$(this).val();
            $.ajax({
                url : "<?php echo base_url();?>user/get_regencies",
                method : "POST",
                data : {id_province: id_province},
                async : false,
                dataType : 'json',
                success: function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option>'+data[i].name+'</option>';
                    }
                    $('.id_regencies').html(html);
                     
                }
            });
        });
    });
</script>
</script>

</body>
</html>
