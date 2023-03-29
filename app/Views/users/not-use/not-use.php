<div class="team-boxed">
                            <div class="container">
                                <div class="intro">
                                    <h2 class="text-center">Team </h2>
                                    <p class="text-center">Nunc luctus in metus eget fringilla. Aliquam sed justo ligula. Vestibulum nibh erat, pellentesque ut laoreet vitae.</p>
                                </div>
                                <div class="row people">
                                    <div class="col-md-6 col-lg-4 item">
                                        <div class="box"><img class="rounded-circle" src="/other-assets/img/1.jpg">
                                            <h3 class="name">Ben Johnson</h3>
                                            <p class="title">Musician</p>
                                            <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu gravida. Aliquam varius finibus est, et interdum justo suscipit id. Etiam dictum feugiat tellus, a semper massa. </p>
                                            <div class="social"><a href="#"><i class="fa fa-facebook-official"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-instagram"></i></a></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 item">
                                        <div class="box"><img class="rounded-circle" src="/other-assets/img/2.jpg">
                                            <h3 class="name">Emily Clark</h3>
                                            <p class="title">Artist</p>
                                            <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu gravida. Aliquam varius finibus est, et interdum justo suscipit id. Etiam dictum feugiat tellus, a semper massa. </p>
                                            <div class="social"><a href="#"><i class="fa fa-facebook-official"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-instagram"></i></a></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 item">
                                        <div class="box"><img class="rounded-circle" src="/other-assets/img/3.jpg">
                                            <h3 class="name">Carl Kent</h3>
                                            <p class="title">Stylist</p>
                                            <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu gravida. Aliquam varius finibus est, et interdum justo suscipit id. Etiam dictum feugiat tellus, a semper massa. </p>
                                            <div class="social"><a href="#"><i class="fa fa-facebook-official"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-instagram"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
    </div>


    <?php if(!empty($array_items)): ?>
        <?php $count=1; foreach($array_items as $data): ?>
            <?php if($data['role'] != 'admin'): ?>
                <?php if($data['role'] != 'user'): ?>
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
                <?php endif; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>