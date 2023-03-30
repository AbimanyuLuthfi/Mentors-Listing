<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Admin Dashboard</h1>
            <br>
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
            <br>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    All Mentors Information
                    <a type="button" href="/admin/add/mentors" class="btn btn-info">Add</a>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple1" class="table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Profile Picture</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Bidang Keahlian</th>
                                <th>Deskripsi Profile</th>
                                <th>Hari & Waktu Tersedia</th>
                                <th>Role</th>
                                <th>Active</th>
                                <th>Information</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($array_items)): ?>
                            <?php $count=1; foreach($array_items as $data): ?>
                                <?php if($data['role'] == 'mentor'): ?>
                            <tr> 
                                    <td><img src="<?= "/uploads/".$data['gambar']; ?>" height="100px" width="100" alt="gambar"></td>
                                    <td><?= $data['nama'] ?></td>
                                    <td><?= $data['email'] ?></td>
                                    <td><?= $data['bidang_keahlian'] ?></td>
                                    <td><?= $data['deskripsi_profil'] ?></td>
                                    <td><?= $data['waktu_tersedia'] ?></td>
                                    <td><?= $data['role'] ?></td>
                                    <td><?= $data['is_active'] ?></td>
                                    <td>
                                    <a 
                                        type="button" class="btn btn-warning"
                                        href="/admin/update/post/<?= esc($data['uuid'])?>">
                                        Edit
                                    </a>
                                        <a 
                                            type="button"
                                            href="/admin/<?= esc($data['uuid'])?>/delete"
                                            class="btn btn-danger">
                                                Delete
                                        </a>
                                    </td>
                            </tr>
                            <?php endif; ?>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    All Users Information
                    <a type="button" href="/admin/add/mentors" class="btn btn-info">Add</a>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple2">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Role</th>
                                <th>Email</th>
                                <th>Active</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($array_items)): ?>
                            <?php $count=1; foreach($array_items as $data): ?>
                            <?php if($data['role'] == 'user'): ?>
                            <tr> 
                                    <td><?= $data['nama'] ?></td>
                                    <td><?= $data['role'] ?></td>
                                    <td><?= $data['email'] ?></td>
                                    <td><?= $data['is_active'] ?></td>
                                    <td><?= $data['created_at'] ?></td>
                                    <td><?= $data['updated_at'] ?></td>
                                    <td>
                                    <a 
                                        type="button" class="btn btn-warning"
                                        href="/admin/update/post/<?= esc($data['uuid'])?>">
                                        Edit
                                    </a>
                                        <a 
                                            type="button"
                                            href="/admin/<?= esc($data['uuid'])?>/delete"
                                            class="btn btn-danger">
                                                Delete
                                        </a>
                                    </td>
                            </tr>
                            <?php endif; ?>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>