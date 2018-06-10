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
        countMessage();
        linkMessage();
        startRefresh();
        getKursi();
        countOrder();
        linkOrder();
    });



    function countMessage() {
        setTimeout(countMessage,1000);
        $.get('<?php echo base_url('order/count_message'); ?>', function(data) {
            $('#count_message').html(data);    
        });
    }

    function update_message_status() {
        $.get('<?php echo base_url('order/update_message_status'); ?>', function(data) {
            $('#update_message_status').html(data);    
        });
    }

    function linkMessage() {
        setTimeout(linkMessage,1000);
        $.get('<?php echo base_url('order/link_message'); ?>', function(data) {
            $('#link_message').html(data);    
        });
    }

    function countOrder() {
        setTimeout(countOrder,1000);
        $.get('<?php echo base_url('order/count_order'); ?>', function(data) {
            $('#count_order').html(data);    
        });
    }

    function linkOrder() {
        setTimeout(linkOrder,1000);
        $.get('<?php echo base_url('order/link_order'); ?>', function(data) {
            $('#link_order').html(data);    
        });
    }

    function startRefresh() {
        setTimeout(startRefresh,1000);
        $.get('<?php echo base_url('welcome/kursi_tersedia'); ?>', function(data) {
            $('#responsecontainer').html(data);    
        });
    }

    function getKursi() {
        setTimeout(getKursi,1000);
        $.get('<?php echo base_url('order/kursi_order/').$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5); ?>', function(data) {
            $('#responsecontainer2').html(data);    
        });
    }

    function notLogin(){
        alert("Silahkan login terlebih dahulu");
    }

    function batalPesan(){
      return confirm('Apakah anda akan membatalkan pesanan ini?');
    }
    </script>
</body>
</html>
