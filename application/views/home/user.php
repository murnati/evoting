<div class="container mt-3 text-center">
    </br>
    </br>
    </br>
    <h3>Let's Choose Your Leader !</h3>
    <h3>Your Choice In Your Hand</h3>
    <hr>
    <div class="container">
        <div class="row">
            <?php foreach ($kandidat as $k) : ?>
                <div class="col-lg-5">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src=".../100px180/" alt="Card image cap">
                        <div class="card-body">
                            <?php $title = $this->db->get_where('users', ['nis' => $k['nis']])->row_array(); ?>
                            <h5 class="card-title"><?= $title['nama']; ?></h5>
                            <p class="card-text"></p>
                            <a href="<?= base_url('vote/profile'); ?>?nis=<?= $k['nis']; ?>" class="btn btn-primary">Profile</a>
                            <a href="<?= base_url('vote/visimisi'); ?>?nis=<?= $k['nis']; ?>" class="btn btn-primary"> Visi MIsi</a> </br> </br>
                            <a href="<?= base_url('vote/voting'); ?>" class="btn btn-primary">Vote</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <!-- <div class="col-lg-5">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src=".../100px180/" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Kandidat 1</h5>
                    <p class="card-text"></p>
                    <a href="<?= base_url('vote/profile'); ?>" class="btn btn-primary">Profile</a>
                    <a href="<?= base_url('vote/visimisi'); ?>" class="btn btn-primary"> Visi MIsi</a> </br> </br>
                    <a href="<?= base_url('vote/voting'); ?>" class="btn btn-primary">Vote</a>
                </div>
            </div>
        </div> -->
        </div>
    </div>
</div>