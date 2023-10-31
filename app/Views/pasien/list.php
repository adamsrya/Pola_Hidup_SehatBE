<?= $this->extend('layout/index') ?>
<?= $this->section('content') ?>

<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Gula Darah</th>
                                            <th>Kolestrol</th>
                                            <th>Asam Urat</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php 
                                        foreach($pasien as $a):
                                        ?>
                                        <tr>
                                            
                                            
                                            <td><?= $a['nama']?></td>
                                            <td><?= $a['guladarah']?></td>
                                            <td><?= $a['kolestrol']?></td>
                                            <td><?= $a['asamurat']?></td>
                                            <td> <a href="<?= base_url()?>/pasien/<?= $a['id_user']?>" class="btn btn-success" >Detail Pasien</a></td>
                            
                                        </tr>
                                        <?php 
                                        endforeach;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <?= $this->endSection() ?>