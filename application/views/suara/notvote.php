<div class="col-9">
    <legend>Data Golput <span class="child"><button class="btn btn-meka" id="print">Print</button></span></legend>
    <table class="table" id="content">
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Nama</th>
            <th>Kelas</th>
        </tr>
        <?php
        $no=0;foreach($anggota as $row):$no++
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $row->username; ?></td>
                <td><?php echo $row->nama; ?></td>
                <td><?php echo $row->kelas; ?></td>
            </tr>
            <?php
            endforeach;
        ?>
    </table>
<br/><br/>
</div>