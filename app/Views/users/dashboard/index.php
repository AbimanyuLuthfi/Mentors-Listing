<div id="layoutSidenav_content">
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard User</h1><br>
        <div class="row">
        <div class="col-xl-3 col-md-6">
                    <div class="card bg-info text-white mb-4">
                        <div class="card-body">
                            <h5><?= session('nama');?> (<?= session('role');?>)</h5>
                            <h5 class="text-dark"><?= session('email');?></h5>
                        </div>
                    </div>
                </div>
        </div>
        <!-- <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active text-dark">Mentors Information</li>
        </ol> -->
        <div class="card mb-4">
            <div class="card-header bg-info text-white">
                <i class="fas fa-table me-1"></i>
                Mentors Information
            </div>
            <div class="card-body">
            <table id="datatablesSimple3">
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
                        <?php if(!empty($data_mentor)): ?>
                            <?php $count=1; foreach($data_mentor as $data): ?>
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