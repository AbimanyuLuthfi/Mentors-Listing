<?= $this->extend('admin/layout/template'); ?>
<?= $this->section('content'); ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?= $head; ?></h1>
            <br>
            <div class="card mb-4">
                <div class="card-header bg-warning">
                    <i class="fas fa-table me-1"></i>
                    Fill The Mentors Information
                </div>
                <div class="card-body">
                    <form action="/admin/<?= $mentors['uuid']; ?>/update/post" accept-charset="utf-8" enctype="multipart/form-data" method="post">
                        <div class="form-group">
                            <label for="gambar">Foto Profile</label>
                            <input type="file" name="gambar"/><?= esc($mentors['gambar']) ?></td>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" type="email" value="<?= esc($mentors['email']) ?>" name="email" />
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input class="form-control" type="text" value="<?= esc($mentors['nama']) ?>" name="nama" />
                        </div>
                        <div class="form-group">
                            <label for="bidang_keahlian">Bidang Keahlian</label>
                            <input class="form-control" type="text" value="<?= esc($mentors['bidang_keahlian']) ?>" name="bidang_keahlian" />
                        </div>
                        <div class="form-group">
                            <label for="deskripsi_profil">Deskripsi Profil</label>
                            <input class="form-control" type="text" value="<?= esc($mentors['deskripsi_profil']) ?>" name="deskripsi_profil" />
                        </div>
                        <div class="form-group">
                            <label for="waktu_tersedia">Waktu Tersedia</label>
                            <input class="form-control" type="text" value="<?= esc($mentors['waktu_tersedia']) ?>"  name="waktu_tersedia" />
                        </div>
                        <div class="form-group pb-2 pt-2">
                            <label for="role">Role</label>
                            <select name="role" id="role">
                                <option><?= esc($mentors['role']) ?></option>
                                <option value="admin">Admin</option>
                                <option value="mentor">Mentor</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                        <div class="form-group pb-2 pt-2">
                            <label for="is_active">Acitvate</label>
                            <select name="is_active" id="is_active">
                                <option><?= esc($mentors['is_active']) ?></option>
                                <option value="active">active</option>
                                <option value="not_active">not_active</option>
                            </select>
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
