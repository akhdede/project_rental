<!-- ========================================== start of main ========================================== -->
<main role="main">
    <div class="album py-5 bg-light" style="margin-top: -30px;">
        <div class="container">
            <div class="row">
                <!-- start album -->
                <div class="col-md-8 offset-md-2" style="padding: 20px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 10px 0 rgba(0, 0, 0, 0.10);">
                    <?php
                    foreach($bayar as $b){
                        echo $b->harga.'<br>';
                    }
                    echo date('dmy').'001';
                    ?>
                </div>
                <!-- end album -->
            </div>
        </div>
    </div>
</main>
<!-- ========================================== end of main ========================================== -->


