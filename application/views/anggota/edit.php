<div class="col-9">
        <?php echo validation_errors();?>
        <?php echo $message; ?>
        <legend>Edit Data User <span class="child"><p class="text-info"><?php if(!empty($info)) echo $info; ?></p></span></legend>
    <form action="<?php echo site_url('anggota/edit/'.$a['username']); ?>" method="post">
        <div class="form-group">
            <div class="col-3"><label class="control-label" for="a1">Username</label></div>
            <div class="col-6"><input class="form-control" type="text" name="username" id="a1" value="<?php echo $a['username']; ?>" required></div>
        </div><div class="form-group">
            <div class="col-3"><label class="control-label" for="a1">Password</label></div>
            <div class="col-6"><input class="form-control" type="text" name="password" id="a1" value="<?php echo $b['password']; ?>" required></div>
        </div>
        <div class="form-group">
            <div class="col-3"><label class="control-label" for="a3">Nama Terang</label></div>
            <div class="col-6"><input type="text" name="nama" id="a3" class="form-control" value="<?php echo $a['nama']; ?>" required></div>
        </div>
        <div class="form-group">
            <div class="col-3"><label class="control-label" for="a3">Kelas</label></div>
            <div class="col-6"><select class="form-control" name="kelas" id="a4" required>
                <option value="<?php echo $a['kelas'] ?>"><?php echo $a['kelas'] ?></option>
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
            <div class="col-6"><input type="text" name="tgl_lahir" id="tanggal" class="form-control" value="<?php echo $a['tgl_lahir']; ?>" required><div class="info"><p class="text-info">Format: tahun/bulan/tanggal</p></div></div>
        </div>
        <div class="form-group">
            <div class="col-3"><label class="control-label" for="a6">Status</label></div>
            <div class="col-6"><select class="form-control" name="status" id="a6" required>
                <option value="<?php echo $a['status']; ?>"><?php echo $a['status']; ?> </option>
                <option value="Y">Y</option>
                <option value="N">N</option>
            </select></div>
        </div>
        <div class="form-group">
            <div class="col-3"></div>
            <div class="col-6"><button type="submit" class="btn btn-primary" name="Update">Update</button>
            <a href="<?php echo site_url('anggota');?>" class="btn btn-danger">Kembali</a></div>
        </div>
    </form>
</div>