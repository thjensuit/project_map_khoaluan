<?php 
	if(isset($_POST['xembaocaoaqi'])){
		if(isset($_POST['ngay_option']) && isset($_POST['thang_option']) && isset($_POST['nam_option'])&&isset($_POST['tentram_option'])){
			if($_POST['ngay_option']!='chonngay' && $_POST['thang_option']!='chonthang' && $_POST['nam_option']!='chonnam' && $_POST['tentram_option']!='chontram'){
				if($_POST['tieude']=='' ||$_POST['ten'] =='' || $_POST['thoigian']==''){
					?>
					<script type="text/javascript">
						alert("Bạn chưa điền đầy đủ thông tin !");
					</script>
					<?php
					require("baocao.php");
				}else{
					require("baocao_ngay_tram.php");
				}
				
			}elseif($_POST['ngay_option']!='chonngay' && $_POST['thang_option']!='chonthang' && $_POST['nam_option']!='chonnam'){
				if($_POST['tieude']=='' ||$_POST['ten'] =='' || $_POST['thoigian']==''){
				?>
					<script type="text/javascript">
						alert("Bạn chưa điền đầy thông tin");
					</script>
				<?php
				require("baocao.php");
				}else{
					require("baocao_ngay.php");
				}
				
			}else{
				?>
				<script type="text/javascript">
					alert("Bạn chưa chọn thời gian");
				</script>
				<?php
				require("baocao.php");
			}
		}
	} 
?>