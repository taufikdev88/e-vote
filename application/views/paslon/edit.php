<div class="col-9">
    <?php echo $this->session->flashdata('message');?>
    <?php echo validation_errors();?>
    <?php echo $message; ?>
    <legend>Edit Data Paslon</legend>
    <form action="<?php echo site_url('paslon/edit/'.$a['id']) ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $a['id']; ?>">
            <div class="col-3"><label for="a1" class="control-label">Nama Terang</label></div>
            <div class="col-6"><input type="text" name="nama" id="a1" class="form-control" value="<?php echo $a['nama']; ?>"></div>
        </div>
        <div class="form-group">
            <div class="col-3"><label for="a2" class="control-label">Foto</label></div>
            <div class="col-6">
            <img src="<?php echo base_url('assets/img/paslon/'.$a['foto']); ?>" alt="" width="100px">
            <input type="file" name="foto" id="a2" class="form-control"></div>
        </div>
        <div class="form-group">
            <div class="col-3"></div>
            <div class="col-6">
            <button class="btn btn-primary" name="Update">Update</button>
            <a href="<?php echo site_url('paslon'); ?>" class="btn btn-danger">Kembali</a>
            </div>
        </div>
    </form>
</div>