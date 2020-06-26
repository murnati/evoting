<div class="container text-center mt-5">
    <h3>Ganti Password</h3>

    <div class="row">
        <div class="col-lg-6">
            <form action="<?= base_url('menu/ganti_pass'); ?>" method="post">

                <div class="card w-50 mx-auto">
                    <div class="card-body mt-3">
                        <form action="" method="post">
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
                                <small class="form-text text-danger"><?= form_error('konfirmasi'); ?></small>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="simpan" class="btn btn-primary float-right ml-4">Simpan</button>
                                <button type="submit" name="batal" class="btn btn-primary float-right">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </form>
        </div>
    </div>



</div>