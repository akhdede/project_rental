<div class="container" style="margin: 100px auto;">
    <div class="col-md-4 offset-md-4" style="padding: 20px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 10px 0 rgba(0, 0, 0, 0.10);">
        <form>
            <div class="form-group">
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Alamat Email" style="border-radius: 0px;">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" id="password" placeholder="Password" style="border-radius: 0px;">
            </div>
            <div class="form-group">
                <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" aria-describedby="emailHelp" placeholder="Nama Lengkap" style="border-radius: 0px;">
            </div>
            <div class="form-group">
                <input type="text" name="nomor_handphone" class="form-control" id="nomor_handphone" aria-describedby="emailHelp" placeholder="Nomor Handphone" style="border-radius: 0px;">
            </div>
            <div class="form-group">
				<select id="id_provinces" name="id_provinces" class="js-example-placeholder-single1 js-provinces form-control">
                    <option value=""></option>
                        <?php foreach($provinces as $p) { ?>
                            <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
                        <?php } ?>
                </select>
            </div>
            <div class="form-group">
				<select id="id_regencies" name="id_regencies" class="js-example-placeholder-single2 js-regencies form-control">
                    <option value=""></option>
                        <?php foreach($regencies as $r) { ?>
                            <option value="<?php echo $r->id; ?>"><?php echo $r->name; ?></option>
                        <?php } ?>
                </select>
            </div>
        </form>
    </div>
</div>
