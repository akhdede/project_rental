    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="<?php echo base_url();?>assets/bootstrap/js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url();?>assets/bootstrap/js/admin.js"></script>
  <script src="<?php echo base_url();?>assets/bootstrap/js/holder.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery&#45;validate/1.17.0/jquery.validate.js"></script> -->
	<script type="text/javascript">
    $(function() {
        countOrdered();
    });

    function countOrdered() {
        setTimeout(countOrdered,1000);
        $.get('<?php echo base_url('admin/ordered/count_ordered'); ?>', function(data) {
            $('#count_ordered').html(data);    
        });
    }

	$(window).load(function() {
    $(".loading").fadeOut("slow");
	});

  function upperCaseF(a){
      setTimeout(function(){
          a.value = a.value.toUpperCase();
      }, 1);
  }

  $("#danger-alert").fadeTo(4000, 500).slideUp(500, function(){
      $("#danger-alert").alert(".close");
  });

  $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
      $("#success-alert").alert(".close");
  });
  
  $('#plat').inputmask("AA 9999 AA");

  $('#tanggal').inputmask("99");

  $('#bulan').inputmask("99");

  $('#tahun').inputmask("9999");

  $(document).ready(function() {
    $("#myForm").validate();
  })

	$(document).ready(function () {

			$('#myForm').validate({
					ignore: [],
					rules: {
							fupl: {
									required: true,
									accept: 'jpg|jpeg|png'
							}
					}
			});

	});

	</script>
  </body>
</html>
