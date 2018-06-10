<!-- ========================================== start of main ========================================== -->
<main role="main">
    <div class="album py-5 bg-light" style="margin-top: -30px;">
        <div class="container">
            <div class="row">
                <!-- start album -->
                    <div class="col-md-8 offset-md-2" style="margin-top:20px; padding: 20px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 10px 0 rgba(0, 0, 0, 0.10);">
                    <h5>Message</h5><hr>
                    <?php
                    foreach($message->result() as $m){
                        echo $m->isi_pesan.'<br>';
                        echo '<small class="text-muted">'.$m->tanggal_message.'</small><hr style="margin-bottom: -5px;"><br>';
                    }
                    ?>
                    </div>
                <!-- end album -->
            </div>
        </div>
    </div>
</main>
<!-- ========================================== end of main ========================================== -->


