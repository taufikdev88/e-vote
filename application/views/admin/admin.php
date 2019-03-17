                <div class="col-9">
                <?php echo $this->session->flashdata('message'); ?>
                    <div class="menubar-group">
                        <div class="menu-item">
                            <div class="header">Dashboard</div>
                            <ul class="table-item">
                                <li><a href="<?php echo site_url('anggota'); ?>">Pengguna</a></li>
                                <li><a href="<?php echo site_url('paslon'); ?>">Paslon</a></li>
                                <li><a href="<?php echo site_url('suara'); ?>">Laporan</a></li>
                                <li><a href="<?php echo site_url('dashboard/logout'); ?>">Keluar</a></li>
                            </ul>
                        </div>
                    </div>               
                </div>
                