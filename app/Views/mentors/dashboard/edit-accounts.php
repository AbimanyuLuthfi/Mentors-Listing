<?= $this->extend('mentors/layout/template'); ?>
<?= $this->section('content'); ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?= $head; ?></h1>
            <br>
            <div class="card mb-4">
                <div class="card-header bg-warning">
                    <i class="fas fa-table me-1"></i>
                    Your Accounts Information
                </div>
                <div class="card-body">
                    <form action="<?= $data_mentor['id'] ?>/update/post" accept-charset="utf-8" enctype="multipart/form-data" method="post">
                        <div class="form-group">
                            <label for="gambar">Foto Profile</label>
                            <input type="file" name="gambar"/><img src="<?= "/uploads/".$data_mentor['gambar']; ?>" height="100px" width="100" alt="gambar"></td>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input class="form-control" type="text" value="<?= esc($data_mentor['nama']) ?>" name="nama" />
                        </div>
                        <div class="form-group">
                            <label for="bidang_keahlian">Bidang Keahlian</label>
                            <input class="form-control" type="text" value="<?= esc($data_mentor['bidang_keahlian']) ?>" name="bidang_keahlian" />
                        </div>
                        <div class="form-group">
                            <label for="deskripsi_profil">Deskripsi Profil</label>
                            <input class="form-control" type="text" value="<?= esc($data_mentor['deskripsi_profil']) ?>" name="deskripsi_profil" />
                        </div>
                        <div class="form-group">
                            <label for="waktu_tersedia">Waktu Tersedia</label>
                            <input class="form-control" type="text" value="<?= esc($data_mentor['waktu_tersedia']) ?>"  name="waktu_tersedia" />
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-warning">Submit</button>
                            <a href="/dashboard/index" class="btn btn-primary">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>


<?= $this->endSection(); ?>
