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