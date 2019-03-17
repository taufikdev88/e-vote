            <div class="col-9">
            <?php echo $this->session->flashdata('message');?>
            <?php echo validation_errors();?>
            <?php echo $message; ?>
                <div class="collapse">
                    <legend>Tambah Paslon Baru</legend>
                    <form action="<?php echo site_url('paslon/tambah'); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="col-3"><label for="a1" class="control-label">Nama Terang</label></div>
                            <div class="col-6"><input type="text" name="nama" id="a1" class="form-control" required></div>
                        </div>
                        <div class="form-group">
                            <div class="col-3"><label for="a2" class="control-label">Foto</label></div>
                            <div class="col-6"><input type="file" name="foto" id="a2" class="form-control"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-3"></div>
                            <div class="col-6"><button type="submit" class="btn btn-primary" name="Tambah">Tambah</button></div>
                        </div>
                    </form>
                </div>
                <div>
                    <legend>List Paslon <span class="child"><button class="btn btn-meka" onclick="toggleNew()">Baru</button></span></legend>
                    <table class="table">
                        <tr>
                            <th>Id</th>
                            <th>Foto</th>
                            <th>Nama Terang</th>
                            <th>Aksi</th>
                        </tr>
                        <?php $no=0; foreach($anggota as $row): $no++; ?>
                            <tr>
                                <td><?php echo $row->id; ?></td>
                                <td><img src="<?php echo base_url('assets/img/paslon/'.$row->foto); ?>" alt="" width="70px"></td>
                                <td><?php echo $row->nama; ?></td>
                                <td>
                                <a href="<?php echo site_url('paslon/edit/'.$row->id); ?>">Edit</a> 
                                <a href="<?php echo site_url('paslon/del/'.$row->id."/true") ;?>">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach ;?>
                    </table>
                </div>
            </div>