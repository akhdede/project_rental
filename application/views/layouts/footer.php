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
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/vendor/popper.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/vendor/holder.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/jquery.autocomplete.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $( function() {
    var availableTags = [
      "ActionScript",
      "AppleScript",
      "Asp",
      "BASIC",
      "C",
      "C++",
      "Clojure",
      "COBOL",
      "ColdFusion",
      "Erlang",
      "Fortran",
      "Groovy",
      "Haskell",
      "Java",
      "JavaScript",
      "Lisp",
      "Perl",
      "PHP",
      "Python",
      "Ruby",
      "Scala",
      "Scheme"
    ];
    $( "#provinsi" ).autocomplete({
      source: availableTags
    });
  } );
  </script>
</body>
</html>
