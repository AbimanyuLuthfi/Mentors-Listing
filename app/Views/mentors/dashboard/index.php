    <?= $this->extend('mentors/layout/template'); ?>
    <?= $this->section('content'); ?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Mentors Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Mentors Information</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Mentors Information
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Profile Picture</th>
                                            <th>Bidang Keahlian</th>
                                            <th>Deskripsi Profile</th>
                                            <th>Hari & Waktu Tersedia</th>
                                            <th>Information</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Profile Picture</th>
                                            <th>Bidang Keahlian</th>
                                            <th>Deskripsi Profile</th>
                                            <th>Hari & Waktu Tersedia</th>
                                            <th>Information</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                            <td>Shad Decker</td>
                                            <td>Regional Director</td>
                                            <td>Edinburgh</td>
                                            <td>51</td>
                                            <td><button type="button" class="btn btn-primary">Detail</button></td>
                                        </tr>
                                        <tr>
                                            <td>Michael Bruce</td>
                                            <td>Javascript Developer</td>
                                            <td>Singapore</td>
                                            <td>29</td>
                                            <td><button type="button" class="btn btn-primary">Detail</button></td>
                                        </tr>
                                        <tr>
                                            <td>Donna Snider</td>
                                            <td>Customer Support</td>
                                            <td>New York</td>
                                            <td>27</td>
                                            <td><button type="button" class="btn btn-primary">Detail</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                
<?= $this->endSection(); ?>