<?= $this->extend('layout/index') ?>
<?= $this->section('content') ?>

<div class="card mb-4">
                            <div class="card-header">
                                
                                
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Alamat</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>
                                
                                    <tbody>
                                    <?php
                                    foreach($pasien as $a):
                                    ?>
                                        <tr>
                                            <td><?= $a['id_user']?></td>
                                            <td><?= $a['nama']?></td>
                                            <td><?= $a['tmptlahir']?></td>
                                            <td><?= date('d m Y', strtotime($a['tgllahir']))?></td>
                                            <td><?= $a['alamat']?></td>
                                            <td><?= $a['jk']?></td>
                                            <td><?= $a['username']?></td>
                                            <td><?= $a['email']?></td>
                                        </tr>
                                        <?php
                                        endforeach;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        

                        <?= $this->endSection() ?>