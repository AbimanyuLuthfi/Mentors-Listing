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
                                        <tr> 
                                                <td><img src="<?= "/uploads/".$data['gambar']; ?>" height="100px" width="100" alt="gambar"></td>
                                                <td><?= $data['nama'] ?></td>
                                                <td><?= $data['bidang_keahlian'] ?></td>
                                                <td><?= $data['deskripsi_profil'] ?></td>
                                                <td><?= $data['waktu_tersedia'] ?></td>
                                                <td>
                                                <button 
                                                    class="btn btn-primary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modalmentorsedit">
                                                    Edit
                                                </button>
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

<?php if(!empty($array_mentors)): ?>
<?php $count=1; foreach($array_mentors as $data): ?>
    <!--Modal For Experts-->
  <!-- modalexpertsedit -->
  <div class="modal fade" id="modalmentorsedit" tabindex="-1" role="dialog" aria-labelledby="modal-mentors-listing-edit-title"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="text-blue modal-title" id="modal-mentors-listing-edit-title">Edit Mentors : <?php $old_name ?></h5>
                  <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form method="post" action="/admin/<?= esc($data['uuid'])?>/update/post" enctype="multipart/form-data">
                      <!-- Gambar -->
                      <div class="row">
                        <div class="col-12 col-sm-12 col-md-4">
                          <label>Gambar<label> <br />
                        </div>
                        <div class="col-12 col-sm-12 col-md-8">
                          <div class="form-group">
                          <input type="file" name="gambar"/><?= esc($data['gambar']) ?></td>
                            <span class="text-danger" style="font-size: 14px">(WAJIB)</span>
                          </div>
                        </div>
                      </div>
                      <!-- Nama -->
                      <div class="row">
                        <div class="col-12 col-sm-12 col-md-4">
                          <label>Nama</label>
                        </div>
                        <div class="col-12 col-sm-12 col-md-8">
                          <div class="form-group">
                            <input class="form-control" type="text" value="<?= esc($data['nama']) ?>" name="nama" />
                          </div>
                        </div>
                      </div>
                      <!-- Bidang Keahlian -->
                      <div class="row">
                        <div class="col-12 col-sm-12 col-md-4">
                          <label>Bidang Keahlian</label>
                        </div>
                        <div class="col-12 col-sm-12 col-md-8">
                          <div class="form-group">
                            <input class="form-control" type="text" value="<?= esc($data['bidang_keahlian']) ?>" name="bidang_keahlian" />
                          </div>
                        </div>
                      </div>
                      <!-- Deskripsi Profil -->
                      <div class="row">
                        <div class="col-12 col-sm-12 col-md-4">
                          <label>Deskripsi Profil</label>
                        </div>
                        <div class="col-12 col-sm-12 col-md-8">
                          <div class="form-group">
                            <input class="form-control" type="text" value="<?= esc($data['bidang_keahlian']) ?>" name="deskripsi_profil" />
                          </div>
                        </div>
                      </div>
                      <!-- Waktu Tersedia -->
                      <div class="row">
                        <div class="col-12 col-sm-12 col-md-4">
                          <label>Waktu Tersedia</label>
                        </div>
                        <div class="col-12 col-sm-12 col-md-8">
                          <div class="form-group">
                            <input class="form-control" type="text" value="<?= esc($data['waktu_tersedia']) ?>"  name="waktu_tersedia" />
                          </div>
                        </div>
                      </div>
                      <!-- button -->
                      <div class="modal-footer">
                          <div class="form-group">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Save changes</button>
                          </div>
                      </div>
                  </form>
              </div>

          </div>
      </div>
  </div>
  <?php endforeach; ?>
  <?php endif; ?>
                
<?= $this->endSection(); ?>