    <?= $this->extend('admin/layout/template'); ?>
    <?= $this->section('content'); ?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Admin Dashboard</h1>
                        <br>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Primary Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Warning Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Success Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Danger Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                All Mentors Information
                                <a type="button" href="/admin/add/mentors" class="btn btn-info">Add</a>
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
                                            <td><?= $data['gambar']; ?></td>
                                            <td><?= $data['nama'] ?></td>
                                            <td><?= $data['bidang_keahlian'] ?></td>
                                            <td><?= $data['deskripsi_profil'] ?></td>
                                            <td><?= $data['waktu_tersedia'] ?></td>
                                            <td>
                                                <button type="button" class="btn btn-primary">Edit</button>
                                                <a 
                                                    type="button"
                                                    href="/admin/<?= esc($data['uuid'])?>/delete"
                                                    class="btn btn-danger">
                                                        Delete
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