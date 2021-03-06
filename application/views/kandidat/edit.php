<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Form Edit Data Siswa
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $kandidat['nis']; ?>">
                        <div class="form-group">
                            <label for="nis">NIS</label>
                            <input type="hidden" name="nis" class="form-control" id="nis" placeholder="Masukkan NIS anda" value="<?= $kandidat['nis']; ?>">
                            <input disabled type="text" name="nis_disabled" class="form-control" id="nis_disabled" placeholder="Masukkan NIS anda" value="<?= $kandidat['nis']; ?>">
                            <small class=" form-text text-danger"><?= form_error('nis'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" name="foto" class="form-control" id="foto" placeholder="upload foto" value="<?= $kandidat['foto']; ?>">
                            <small class=" form-text text-danger"><?= form_error('foto'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="visi">Visi</label>
                            <input type="text" name="visi" class="form-control" id="visi" placeholder="Masukkan visi kandidat" value="<?= $kandidat['visi']; ?>">
                            <small class=" form-text text-danger"><?= form_error('visi'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="misi">Misi</label>
                            <input type="text" name="misi" class="form-control" id="misi" placeholder="Masukkan Misi kandidat" value="<?= $kandidat['misi']; ?>">
                            <small class=" form-text text-danger"><?= form_error('misi'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="periode">Periode</label>
                            <input type="text" name="periode" class="form-control" id="periode" placeholder="Masukkan periode" value="<?= $kandidat['periode']; ?>">
                            <small class=" form-text text-danger"><?= form_error('periode'); ?></small>
                        </div>

                        <button type="submit" name="edit" class="btn btn-primary float-right">Edit Data</button>
                    </form>
                </div>
            </div>


        </div>
    </div>
</div>