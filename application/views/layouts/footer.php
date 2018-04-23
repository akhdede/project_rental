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
    <script src="<?php echo base_url(); ?>assets/js/select2.min.js"></script>

    <!-- select2 script -->
    <script type="text/javascript">
        $(".select").select2({
        });
    </script>
	<script>
        $(document).ready(function(){
            $("#provinsi").change(function (){
                var url = "<?php echo site_url('user/add_ajax_kab');?>/"+$(this).val();
                $('#kabupaten').load(url);
                return false;
            })
			
			$("#kabupaten").change(function (){
                var url = "<?php echo site_url('user/add_ajax_kec');?>/"+$(this).val();
                $('#kecamatan').load(url);
                return false;
            })
			
			$("#kecamatan").change(function (){
                var url = "<?php echo site_url('user/add_ajax_des');?>/"+$(this).val();
                $('#desa').load(url);
                return false;
            })
        });
    </script>
    <script type="text/javascript">

    $(function() {
        startRefresh();
    });

    function startRefresh() {
        setTimeout(startRefresh,1000);
        $.get('<?php echo base_url('welcome/kursi_tersedia'); ?>', function(data) {
            $('#responsecontainer').html(data);    
        });
        $.get('<?php echo base_url('Order/kursi_order/'.$this->uri->segment(3)); ?>', function(data) {
            $('#responsecontainer2').html(data);    
        });
    }
    </script>
</body>
</html>
