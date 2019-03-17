	<div class="container">
		<div class="row">
			<div class="col-12">
			    <?php foreach($nama as $row){ ?>
				<h2 class="center">Terima Kasih <?php echo $row->nama; ?></h2>
				<h3 class="center">Telah turut serta berkontribusi untuk kebaikan bersama</h3>
				<h3 class="center">Kontribusimu sangat berharga</h3>
				<?php }?>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<a href="<?php echo site_url('vote/logout') ?>" class="btn btn-danger center">KELUAR</a>
			</div>
		</div>
	</div>