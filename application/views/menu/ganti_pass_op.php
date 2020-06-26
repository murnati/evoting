<div class="container text-center mt-3">
    </br>
    </br>
    </br>
    <h3>Ganti Password</h3>
    <div class="card w-50 mx-auto">
        <div class="card-body">
            <form action="<?= base_url('menu/ganti_pass_op'); ?>" method="post">
                <!-- <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="inputPassword">
                    </div>
                </div> -->
                <div class="">
                    <label for="passlama">Password Lama</label>
                    <input type="text" name="passlama" class="form-control" id="passlama" placeholder="Masukkan Password Lama">
                    <small class="form-text text-danger"><?= form_error('passlama'); ?></small>
                </div>
                <div class="">
                    <label for="passbaru">Password Baru</label>
                    <input type="text" name="passbaru" class="form-control" id="passbaru" placeholder="Masukkan Password Baru">
                    <small class="form-text text-danger"><?= form_error('passbaru'); ?></small>
                </div>
                <div class="">
                    <label for="konfirmasi">Konfirmasi Password</label>
                    <input type="text" name="konfirmasi" class="form-control" id="konfirmasi" placeholder="Konfirmasi Password Baru">
                    <small class="form-text text-danger"><?= form_error('konsfirmasi'); ?></small>
                </div>
            </form>
            </br>
            <button type="submit" name="simpan" class="btn btn-primary float-right ml-4">Simpan</button>
            <button type="submit" name="batal" class="btn btn-primary float-right">Batal</button>
        </div>
    </div>

</div>