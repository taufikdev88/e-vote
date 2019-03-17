<script type="text/javascript">
	function submit(form){
		$("#"+form).submit();
	}
    
    function timeToSeconds(time) {
        time = time.split(/:/);
        return time[0] * 3600 + time[1] * 60 + time[2];
    }
	$(document).ready(function(){
        $(document).keydown(function(e){
            if (e.ctrlKey) {
                e.preventDefault();
            }
            if (e.shiftKey) {
                e.preventDefault();
            }
            if (e.altKey) {
                e.preventDefault();
            }
        })
        $("li.thumb-list").click(function(){
			$(this).children("input").prop("checked", true);
			$("li.thumb-list").each(function(){
				$(this).removeClass("active");
			})
			$("li.thumb-list .checkbox").each(function(){
				$(this).removeClass("active");
			})
			$(this).children(".checkbox").addClass("active");
			$(this).addClass("active");
		})
//        var mm = "<?php// if(!empty($sesim)) echo $sesim; else echo '03' ?>",dd = "<?php// if(!empty($sesid)) echo $sesid; else echo '00' ?>";
//        var x = setInterval(function(){
//            if(mm == 00 & dd == 00){
//                location.href("<?php// echo site_url('vote/logout'); ?>");
//            }
//            if(dd <= 0){
//                mm-=1;
//                dd=60;
//            }
//            if(mm <= -1){
//                mm++;
//                dd=0
//            } else {
//                dd -= 1;
//                mm = '' + mm;
//                dd = '' + dd;
//                var pad = '00';
//                mm = pad.substr(0, pad.length - mm.length) + mm;
//                dd = pad.substr(0, pad.length - dd.length) + dd;
//                $.post("<?php echo site_url('vote/session') ?>", {
//                    mm: mm,
//                    dd: dd
//                },function(html){
//                    $('#timer').html(html);
//                })
//            }
//        },1000);
	})
</script>
<!--    <span id="timer"></span>-->
	<div class="container">
		<div class="row vote">
			<form action="<?php echo site_url('vote/proses'); ?>" method="post" id="form1">
				<input type="hidden" name="username" value="<?php echo $user; ?>">
			<ul class="thumb">
				<?php foreach($calon as $row){ ?>
				<li class="thumb-list">
					<img src="<?php echo base_url(); ?>assets/img/paslon/<?php echo $row->foto; ?>">
					<br>
					<div class="checkbox"></div>
					<input type="radio" name="pilihan" value="<?php echo $row->id; ?>" id="<?php echo $row->id; ?>">
					<label for="<?php echo $row->id; ?>"><?php echo $row->nama; ?></label>
				</li>
				<?php }; ?>
			</ul>
			</form>
		</div>
		<div class="row">
			<div class="col-12">
				<span class="info">
					<p class="text-info"><?php echo $this->session->flashdata('message');?></p>
				</span>
			</div>
			<div class="col-12">
				<a href="javascript:submit('form1')" class="btn btn-meka center">Pilih</a>
			</div>
		</div>
	</div>