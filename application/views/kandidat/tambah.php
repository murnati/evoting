<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Form Tambah Data Kandidat
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="nis">NIS</label>
                            <!-- <input type="text" name="nis" class="form-control" id="nis" placeholder="Masukkan NIS anda"> -->
                            <select class="form-control" id="nis" name="nis">
                                <?php $data_siswa = $this->db->get('users')->result_array(); ?>
                                <?php foreach ($data_siswa as $data) : ?>
                                    <option selected value="<?= $data['nis']; ?>"><?= $data['nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="form-text text-danger"><?= form_error('nis'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="nama">Foto</label>
                            <input type="file" name="foto" class="form-control" id="foto" placeholder="Upload Foto kandidat">
                            <small class="form-text text-danger"><?= form_error('foto'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="nama">Visi</label>
                            <input type="text" name="visi" class="form-control" id="visi" placeholder="Masukkan Visi">
                            <small class="form-text text-danger"><?= form_error('visi'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="nama">Misi</label>
                            <input type="text" name="misi" class="form-control" id="misi" placeholder="Masukkan Misi">
                            <small class="form-text text-danger"><?= form_error('misi'); ?></small>
                        </div>

                        <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
                    </form>
                </div>
            </div>


        </div>
    </div>
</div>