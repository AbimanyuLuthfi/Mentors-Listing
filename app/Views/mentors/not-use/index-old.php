    <?= $this->extend('mentors/layout/template'); ?>
    <?= $this->section('content'); ?>

    <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Mentors Information</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header bg-primary text-white">
                                <i class="fas fa-table me-1"></i>
                                Mentors Information
                            </div>
                            <div class="card-body">
                            <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Profile Picture</th>
                                            <th>Nama</th>
                                            <th>Bidang Keahlian</th>
                                            <th>Deskripsi Profile</th>
                                            <th>Hari & Waktu Tersedia</th>
                                            <th>Information</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(!empty($array_mentors)): ?>
                                        <?php $count=1; foreach($array_mentors as $data): ?>
                                        <tr> 
                                                <td>
                                                    <img src="<?= "/uploads/".$data['gambar']; ?>" height="100px" width="100" alt="gambar">
                                                </td>
                                                <td><?= $data['nama'] ?></td>
                                                <td><?= $data['bidang_keahlian'] ?></td>
                                                <td><?= $data['deskripsi_profil'] ?></td>
                                                <td><?= $data['waktu_tersedia'] ?></td>
                                                <td>
                                                    <a 
                                                        type="button"
                                                        href="/users/detail/mentors/<?= esc($data['uuid'])?>"
                                                        class="btn btn-info">
                                                            Detail
                                                    </a>
                                                </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                
<?= $this->endSection(); ?>

<img src="<?= "/uploads/".$_SESSION['gambar']; ?>" class="rounded-circle pb-2" height="120px" width="120" alt="gambar">