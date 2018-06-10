<div class="container" style="margin: 100px auto;">
    <div class="col-md-6 offset-md-3" style="padding: 20px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 10px 0 rgba(0, 0, 0, 0.10);">
        <form action="<?php echo base_url('user/signup_action'); ?>" method="post">
            <div class="form-group">
                <label for="email">Alamat email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Alamat email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="nama_lengkap">Nama lengkap</label>
                <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" placeholder="Nama lengkap">
            </div>
            <div class="form-group">
                <label for="nomor_handphone">Nomor handphone</label>
                <input type="text" name="nomor_handphone" class="form-control" id="nomor_handphone" placeholder="Nomor handphone">
            </div>
            <div class="form-group">
                <label for="prov">Provinsi</label>
                <select name="provinsi" class="select form-control" id="provinsi">
                    <option>- Pilih Provinsi -</option>
                    <?php foreach($provinsi as $prov){
                        echo '<option value="'.$prov->id.'">'.$prov->nama.'</option>';
                    } ?>
                </select>
            </div>
            
            <div class="form-group">
                <label for="kabupaten">Kabupaten/Kota</label>
                <select name="kabupaten" class="select form-control" id="kabupaten">
                    <option value=''>Pilih Kabupaten</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="kecamatan">Kecamatan</label>
                <select name="kecamatan" class="select form-control" id="kecamatan">
                    <option>Pilih Kecamatan</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="desa">Desa/Kelurahan</label>
                <select name="desa" class="select form-control" id="desa">
                    <option>Pilih Desa</option>
                </select>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" name="alamat" id="alamat" rows="3" placeholder="Alamat"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Daftar</button>
        </form>
    </div>
</div>
