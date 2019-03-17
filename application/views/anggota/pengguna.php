            <div class="col-9">
            <?php echo $this->session->flashdata('message');?>
            <?php echo validation_errors();?>
            <?php echo $message; ?>
                <div class="collapse">
                    <legend>Tambah User Baru</legend>
                    <form action="<?php echo site_url('anggota/tambah'); ?>" method="post">
                        <div class="form-group">
                            <div class="col-3"><label class="control-label" for="a1">Username</label></div>
                            <div class="col-6"><input class="form-control" type="text" name="username" id="a1" required></div>
                        </div>
                        <div class="form-group">
                            <div class="col-3"><label class="control-label" for="a2">Password</label></div>
                            <div class="col-6"><input type="text" name="password" id="a2" class="form-control" required></div>
                        </div>
                        <div class="form-group">
                            <div class="col-3"><label class="control-label" for="a3">Nama Terang</label></div>
                            <div class="col-6"><input type="text" name="nama" id="a3" class="form-control" required></div>
                        </div>
                        <div class="form-group">
                            <div class="col-3"><label class="control-label" for="a3">Kelas</label></div>
                            <div class="col-6"><select class="form-control" name="kelas" id="a4" required>
                                <option value="1 Meka A">1 Meka A</option>
                                <option value="1 Meka B">1 Meka B</option>
                                <option value="2 Meka A">2 Meka A</option>
                                <option value="2 Meka B">2 Meka B</option>
                                <option value="3 Meka A">3 Meka A</option>
                                <option value="3 Meka B">3 Meka B</option>
                                <option value="4 Meka A">4 Meka A</option>
                                <option value="4 Meka B">4 Meka B</option>
                            </select></div>
                        </div>
                        <div class="form-group">
                            <div class="col-3"><label class="control-label" for="tanggal">Tanggal Lahir</label></div>
                            <div class="col-6"><input type="text" name="tgl_lahir" id="tanggal" class="form-control" required><div class="info"><p class="text-info">Format: tahun/bulan/tanggal</p></div></div>
                        </div>
                        <div class="form-group">
                            <div class="col-3"><label class="control-label" for="a6">Status</label></div>
                            <div class="col-6"><select class="form-control" name="status" id="a6" required>
                                <option value="Y">Y</option>
                                <option value="N">N</option>
                            </select></div>
                        </div>
                        <div class="form-group">
                            <div class="col-3"></div>
                            <div class="col-6"><button type="submit" class="btn btn-primary" name="Tambah">Tambah</button></div>
                        </div>
                    </form>
                </div>
                <div>
                    <div class="row">
                    <div class="col-8">
                        <legend>List Pengguna <span class="child"><button class="btn btn-meka" onclick="toggleNew()">Baru</button></span></legend>
                    </div>
                    <div class="col-4">
                        <label class="form-label" for="carinrp">Cari Pengguna :</label>
                        <input class="form-control" type="text" name="cari" id="carinrp" placeholder="Cari">
                    </div>
                    </div>
                    <div id="tampil">
                        <table class="table">
                           <tr>
                               <th>No</th>
                               <th>Username</th>
                               <th>Nama Terang</th>
                               <th>Kelas</th>
                               <th>Tanggal Lahir</th>
                               <th>Status</th>
                               <th>Aktifitas</th>
                               <th>Aksi</th>
                           </tr>
                            <?php $no=0;foreach($anggota as $row): $no++;?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row->username; ?></td>
                                    <td><?php echo $row->nama; ?></td>
                                    <td><?php echo $row->kelas;?></td>
                                    <td><?php echo $row->tgl_lahir; ?></td>
                                    <td><?php echo $row->status; ?></td>
                                    <td><?php echo $row->log; ?></td>
                                    <td><a href="<?php echo site_url('anggota/edit/'.$row->username); ?>">Edit</a> <a href="<?php echo site_url('anggota/del/'.$row->username.'/true'); ?>">Hapus</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                        <?php if(isset($links)) echo $links; ?>
                    </div>
                </div>
            </div>
<script type="text/javascript">
    $(document).ready(function(){
        $("#carinrp").keyup(function(){
            var data = $(this).val();
            
            $.ajax({
                url: "<?php echo site_url('anggota/cari/') ?>",
                type: 'POST',
                data: "data="+data,
                cache: false,
                success: function(html){
                    $("#tampil").html(html);
                }
            })
        })
    })
</script>