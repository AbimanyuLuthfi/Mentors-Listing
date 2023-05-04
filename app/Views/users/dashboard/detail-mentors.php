<?= $this->extend('users/layout/template'); ?>
    <?= $this->section('content'); ?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Detail Mentor</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Mentors Information</li>
                        </ol>
                        <div class="card mb-4">
                            <img src="<?= "/uploads/".$data['gambar']; ?>" height="100px" width="150" alt="gambar">
                            <div class="card-body">
                                <h3 class="card-title"><?= $data['nama'] ?></h3>
                                <h4 class="card-title"><?= $data['bidang_keahlian'] ?></h4>
                                <h5 class="card-title"><?= $data['waktu_tersedia'] ?></h5>
                                <p class="card-text"><?= $data['deskripsi_profil'] ?></p>
                                <a href="/dashboard/index" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                    </div>
                </main>
                
<?= $this->endSection(); ?>