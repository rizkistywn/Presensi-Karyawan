<script>
    function checkConnection() {
        if (navigator.connection) {
            const connectionType = navigator.connection.type;
            console.log("Network connection type:", navigator.connection);
        } else {
            console.log("Connection information unavailable.");
        }
    }

    checkConnection();
</script>

<div class="container-fluid">
    <div class="mt-4 jumbotron jumbotron-fluid shadow-lg">
        <div class="container">
            <div class="text-center">
                <img src="<?= (empty($dataapp['logo_instansi'])) ? base_url('assets/img/clock-image.png') : (($dataapp['logo_instansi'] == 'default-logo.png') ? base_url('assets/img/clock-image.png') : base_url('storage/setting/' . $dataapp['logo_instansi'])); ?>" class="card-img" style="width:15%;">
                <h1 class="display-5">
                    <?= (empty($dataapp['nama_instansi'])) ? '[Nama Instansi Belum Disetting]' : $dataapp['nama_instansi']; ?>
                </h1>
                <h4>
                    <div class="d-inline"><?= $greeting ?></div>, <?= $user['nama_lengkap'] ?>
                </h4>
                <p class="lead">
                    <marquee width="60%" direction="left"><?= (empty($dataapp['jumbotron_lead_set'])) ? '[Ubah Kalimat Pada Teks Ini Disetting Aplikasi]' : $dataapp['jumbotron_lead_set']; ?></marquee>
                </p>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-xl-7">
            <div class="card mb-4">
                <div class="card-header text-center">
                    <span class="fas fa-user mr-1"></span>Identitas Diri
                </div>
                <div class="card-body">
                    <div class="row detail">
                        <div class="col-md-2 col-sm-4 col-6 p-2">
                            <img class="img-thumbnail" src="<?= ($user['image'] == 'default.png' ? base_url('assets/img/default-profile.png') : base_url('storage/profile/' . $user['image'])); ?>" class="card-img" style="width:100%;">
                        </div>
                        <div class="col-md-10 col-sm-8 col-6">
                            <?php
                            if ($this->session->userdata('role_id') == 1) {
                            ?>
                                <dl class="row">
                                    <dt class="col-sm-5">Nama Lengkap:</dt>
                                    <dd class="col-sm-7"><?= $user['nama_lengkap'] ?></dd>
                                    <dt class="col-sm-5">Instansi:</dt>
                                    <dd class="col-sm-7 text-truncate"><?= $user['instansi'] ?></dd>
                                    <dt class="col-sm-5">Jabatan:</dt>
                                    <dd class="col-sm-7"><?= $user['jabatan'] ?></dd>
                                </dl>
                            <?php } else { ?>
                                <dl class="row">
                                    <dt class="col-sm-5">Nama Lengkap:</dt>
                                    <dd class="col-sm-7"><?= $user['nama_lengkap'] ?></dd>
                                    <dt class="col-sm-5">Umur:</dt>
                                    <dd class="col-sm-7"><?= $user['umur'] ?><div class="ml-1 d-inline">Tahun</div>
                                    </dd>
                                    <dt class="col-sm-5">Instansi:</dt>
                                    <dd class="col-sm-7 text-truncate"><?= $user['instansi'] ?></dd>
                                    <dt class="col-sm-5">Jabatan:</dt>
                                    <dd class="col-sm-7"><?= $user['jabatan'] ?></dd>
                                    <dt class="col-sm-5">NPWP:</dt>
                                    <dd class="col-sm-7"><?= $user['npwp'] ?></dd>
                                    <dt class="col-sm-5">Tempat / Tanggal Lahir:</dt>
                                    <dd class="col-sm-7"><?= $user['tempat_lahir'] ?>,<?= $user['tgl_lahir'] ?></dd>
                                    <dt class="col-sm-5">Jenis Kelamin:</dt>
                                    <dd class="col-sm-7"><?= $user['jenis_kelamin'] ?></dd>
                                    <dt class="col-sm-5">Shift Bekerja:</dt>
                                    <dd class="col-sm-7"><?= $shiftpegawai = ($user['bagian_shift'] == 1) ? '<span class="badge badge-success">Full Time</span>' : (($user['bagian_shift'] == 2) ? '<span class="badge badge-warning">Part Time</span>' : '<span class="badge badge-primary">Shift Time</span>'); ?></dd>
                                    <dt class="col-sm-5">Laptop MAC Address:</dt>
                                    <dd class="col-sm-7"><?= $user['laptop_mac_address'] ?></dd>
                                    <dt class="col-sm-5">HP MAC Address:</dt>
                                    <dd class="col-sm-7"><?= $user['hp_mac_address'] ?></dd>
                                </dl>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Kode Pegawai: <?= $user['kode_pegawai'] ?></div>
                        <div class="text-muted">Akun Dibuat: <?= date('d F Y', $user['date_created']); ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-5">
            <div class="card mb-4">
                <div class="card-header text-center"><span class="fas fa-clock mr-1"></span>Presensi</div>
                <div class="card-body text-center">
                    <div id="infoabsensi"></div>
                    <?php if ($dataapp['maps_use'] == 1) : ?>
                        <div id='maps-absen' style='width: 100%; height:250px;'></div>
                        <hr>
                    <?php endif; ?>
                    <div id="location-maps" style="display: none;"></div>
                    <div id="date-and-clock">
                        <h3 id="clocknow"></h3>
                        <h3 id="datenow"></h3>
                    </div>
                    <?= form_dropdown('ket_absen', ['Bekerja Di Rumah / WFH' => 'Bekerja Di Rumah / WFH', 'Sakit' => 'Sakit', 'Izin' => 'Izin'], '', ['class' => 'form-control align-content-center my-2', 'id' => 'ket_absen']); ?>
                    <div class="mt-2">
                        <button class="btn btn-dark" id="btn-absensi">Presensi</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>