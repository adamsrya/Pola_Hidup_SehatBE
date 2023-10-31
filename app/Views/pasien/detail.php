<?= $this->extend('layout/index') ?>
<?= $this->section('content') ?>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Biodata Pasien
    </div>
    <div class="card-body">
        <table style="width: 300px;">

            <tr>

                <td>Name</td>
                <td>:</td>
                <td><?= $detail['nama'] ?></td>
            </tr>
            <tr>

                <td>Tempat Lahir</td>
                <td>:</td>
                <td><?= $detail['tmptlahir'] ?></td>
            </tr>
            <tr>

                <td>Umur</td>
                <td>:</td>
                <td><?= $umur ?></td>
            </tr>
            <tr>

                <td>Alamat</td>
                <td>:</td>
                <td><?= $detail['alamat'] ?></td>
            </tr>

            <tr>

                <td>Jenis Kelamin</td>
                <td>:</td>
                <td><?= $detail['jk'] ?></td>
            </tr>
            <tr>

                <td>Username</td>
                <td>:</td>
                <td><?= $detail['username'] ?></td>
            </tr>
            <tr>

                <td>Email</td>
                <td>:</td>
                <td><?= $detail['email'] ?></td>
            </tr>

        </table>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Hasil Konsul Saat ini
    </div>
    <div class="card-body">
        <table style="width: 300px;">

            <tr>

                <td>Gula Darah</td>
                <td>:</td>
                <td><?= $detail['guladarah'] ?></td>
            </tr>
            <tr>

                <td>Kolestrol</td>
                <td>:</td>
                <td><?= $detail['kolestrol'] ?></td>
            </tr>
            <tr>

                <td>Asam Urat</td>
                <td>:</td>
                <td><?= $detail['asamurat'] ?></td>
            </tr>
            

            
        </table>
    </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Riwayat Pasien
        </div>

        <div class="card-body">
            <div class="col-sm-6">

                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Gula Darah</th>
                            <th scope="col">Kolestrol</th>
                            <th scope="col">Asam Urat</th>
                            <th scope="col">Waktu Penginputan </th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
                        $a = 1;
                        foreach ($riwayat as $r) : ?>
                            <tr>
                                <td><?= $a++ ;?></td>
                                <td><?= $r['guladarah'] ?></td>
                                <td><?= $r['kolestrol'] ?></td>
                                <td><?= $r['asamurat'] ?></td>
                                <td><?= date('d F Y', strtotime($r['created_at'])) ?></td>
                            </tr>
                        <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        </div>


        <?= $this->endSection() ?>