<?php
class Thieunhi extends CI_Controller{
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->helper("url");
		$this->load->model("model_function");
		$this->load->database();
		$this->model_function->checklogin(base_url()."adminlogin");
	}
	public function themthieunhi(){
		$this->model_function->checkadmin(base_url()."admin");
		$data["loged_user"]=$_SESSION["thongtinhuynhtruong"];
		$data["page_title"]="Thiếu nhi";
		$id_phancong=$_SESSION["thongtinhuynhtruong"]["id_phancong"];
		$data["view_page"]="view_themthieunhi";
		$this->load->view("admin/index",$data);
	}
	public function add(){
		if(isset($_POST["ok"])){
			$tenthanh=mb_convert_case(trim($_POST["tenthanh"]), MB_CASE_TITLE,'utf-8');
			$hoten=mb_convert_case(trim($_POST["hoten"]), MB_CASE_TITLE,'utf-8');
			$ngaysinh = $_POST["ngaysinh"];
			$sql_chk=$this->db->query("SELECT * FROM thieunhi WHERE hoten='$hoten' AND ngaysinh = '$ngaysinh'");
			if($sql_chk->num_rows()>0){
				$data["alert"]=array(
					"stt"     => "danger",
					"title"   => "Quản lý Thiếu nhi",
					"content" => "Thêm thất bại, kiểm tra xem có sai thông tin nào không."	
				);
			}
			else{
				date_default_timezone_set('Asia/Ho_Chi_Minh');
				$now=getdate();
				$ngaythem = $now["mday"].'/'.$now["mon"].'/'.$now["year"].' '.$now["hours"].':'.$now["minutes"].':'.$now["seconds"];
				$tenthanh=mb_convert_case(trim($_POST["tenthanh"]), MB_CASE_TITLE,'utf-8');
				$hoten=mb_convert_case(trim($_POST["hoten"]), MB_CASE_TITLE,'utf-8');
				$value_thieunhi = array(
					'tenthanh'		=>	$tenthanh,		
					'hoten'			=>	$hoten,
					'gioitinh'		=>	$_POST["gioitinh"],
					'ngaysinh'		=>	$_POST["ngaysinh"],
					'ngaybonmang'	=>	$_POST["ngaybonmang"],
					'diachi'		=>	$_POST["diachi"],
					'sdt'			=>	$_POST["sodienthoai"],
					'khugiao'		=>	$_POST["khugiao"],
					'tenthanhcha'	=>	$_POST["tenthanhcha"],
					'hotencha'		=>	$_POST["hotencha"],
					'nghenghiepcha'	=>	$_POST["nghenghiepcha"],
					'dienthoaicha'	=>	$_POST["dienthoaicha"],
					'tenthanhme'	=>	$_POST["tenthanhme"],
					'hotenme'		=>	$_POST["hotenme"],
					'nghenghiepme'	=>	$_POST["nghenghiepme"],
					'dienthoaime'	=>	$_POST["dienthoaime"],
					'daruatoi'		=>	$_POST["daruatoi"],
					'ngayruatoi'	=>	$_POST["ngayruatoi"],
					'linhmucruatoi'	=>	$_POST["linhmucruatoi"],
					'nhathoruatoi' 	=>	$_POST["nhathoruatoi"],
					'daruocle'		=>	$_POST["daruocle"],
					'ngayruocle'	=>	$_POST["ngayruocle"],
					'linhmucruocle'	=>	$_POST["linhmucruocle"],
					'nhathoruocle' 	=>	$_POST["nhathoruocle"],
					'dathemsuc'		=>	$_POST["dathemsuc"],
					'ngaythemsuc'	=>	$_POST["ngaythemsuc"],
					'linhmucthemsuc'=>	$_POST["linhmucthemsuc"],
					'nhathothemsuc'	=>	$_POST["nhathothemsuc"],
					'ngaythem'      =>  $ngaythem,
				);
				$this->load->model("model_thieunhi");
				$this->model_thieunhi->set_value($value_thieunhi);
				$this->model_thieunhi->them();
				$data["alert"]=array(
					"stt"     => "success",
					"title"   => "Quản lý Thiếu nhi",
					"content" => "Bạn đã thêm em {$value_thieunhi["hoten"]} này vào hệ thống"	
				);
				// GHI LỊCH SỬ
				$array_lichsu=array(
					'lichsu'       => 'Thêm mới thiếu nhi',
					'noidung'      => 'Trưởng <b class="text-red">'.$_SESSION["thongtinhuynhtruong"]["tenhuynhtruong"].'</b> thêm em <b class="text-green">'.$value_thieunhi["tenthanh"].' '.$value_thieunhi["hoten"].'</b> vào lớp <b class="text-light-blue">'.$_SESSION["thongtinhuynhtruong"]["tenlopgiaoly"].'</b>',
					'nguoicapnhat' => $_SESSION['thongtinhuynhtruong']['id_huynhtruong'],
					'loai'         => 	1,
				);
				$this->load->model("Model_lichsu");
				$this->Model_lichsu->set_value($array_lichsu);
				$this->Model_lichsu->them();
			}
		}
		$data["loged_user"]=$_SESSION["thongtinhuynhtruong"];
		$data["page_title"]="Thiếu nhi";
		$data["view_page"]="view_themthieunhi";
		$this->load->view("admin/index",$data);
	}
	public function danhsachlop(){
		$id_namhoc=$_SESSION["thongtinhuynhtruong"]["id_namhoc"];
        $id_lopgiaoly=$_SESSION["thongtinhuynhtruong"]["id_lopgiaoly"];
        $this->load->model("model_thieunhi");
        $data["result_tn"]=$this->model_thieunhi->get_danhsachlop($id_namhoc,$id_lopgiaoly);
		$data["page_title"]="Danh sách thiếu nhi";
		$id_phancong=$_SESSION["thongtinhuynhtruong"]["id_phancong"];
		if($id_phancong==NULL){
			$data["view_page"]="view_not_phancong";
			$this->load->view("admin/index",$data);
		}
		else{
			$data["view_page"]="view_danhsachlop";
			$this->load->view("admin/index",$data);
		}
	}
	public function hieuchinh($id){
		$data["loged_user"]=$_SESSION["thongtinhuynhtruong"];
		$data["page_title"]="Thiếu nhi";
		$this->load->model("model_thieunhi");
		$data["result"]=$this->model_thieunhi->get_value($id);
		$data["view_page"]="view_suathieunhi";
		$this->load->view("admin/index",$data);
	}
	public function edit($id){
		if(isset($_POST["ok"])){
			$tenthanh=mb_convert_case(trim($_POST["tenthanh"]), MB_CASE_TITLE,'utf-8');
			$hoten=mb_convert_case(trim($_POST["hoten"]), MB_CASE_TITLE,'utf-8');
			$value_thieunhi = array (
				'tenthanh'		=>	$tenthanh,
				'hoten'			=>	$hoten,
				'gioitinh'		=>	$_POST["gioitinh"],
				'ngaysinh'		=>	$_POST["ngaysinh"],
				'ngaybonmang'	=>	$_POST["ngaybonmang"],
				'diachi'		=>	$_POST["diachi"],
				'sdt'			=>	$_POST["sodienthoai"],
				'khugiao'		=>	$_POST["khugiao"],
				'tenthanhcha'	=>	$_POST["tenthanhcha"],
				'hotencha'		=>	$_POST["hotencha"],
				'nghenghiepcha'	=>	$_POST["nghenghiepcha"],
				'dienthoaicha'	=>	$_POST["dienthoaicha"],
				'tenthanhme'	=>	$_POST["tenthanhme"],
				'hotenme'		=>	$_POST["hotenme"],
				'nghenghiepme'	=>	$_POST["nghenghiepme"],
				'dienthoaime'	=>	$_POST["dienthoaime"],
				'daruatoi'		=>	$_POST["daruatoi"],
				'ngayruatoi'	=>	$_POST["ngayruatoi"],
				'linhmucruatoi'	=>	$_POST["linhmucruatoi"],
				'nhathoruatoi' 	=>	$_POST["nhathoruatoi"],
				'daruocle'		=>	$_POST["daruocle"],
				'ngayruocle'	=>	$_POST["ngayruocle"],
				'linhmucruocle'	=>	$_POST["linhmucruocle"],
				'nhathoruocle' 	=>	$_POST["nhathoruocle"],
				'dathemsuc'		=>	$_POST["dathemsuc"],
				'ngaythemsuc'	=>	$_POST["ngaythemsuc"],
				'linhmucthemsuc'=>	$_POST["linhmucthemsuc"],
				'nhathothemsuc'	=>	$_POST["nhathothemsuc"],
			);
			$this->load->model("model_thieunhi");
			$this->model_thieunhi->set_value($value_thieunhi);
			$this->model_thieunhi->sua($id);
			$this->model_thieunhi->tinhtrang($id,$_POST["tinhtrang"]);
			$data["alert"]=array(
				"stt"     => "success",
				"title"   => "Quản lý Thiếu nhi",
				"content" => "Hiệu chỉnh thành công."	
			);
			// GHI LỊCH SỬ
			$array_lichsu=array(
				'lichsu'       => 'Hiệu chỉnh thiếu nhi',
				'noidung'      => 'Trưởng <b class="text-red">'.$_SESSION["thongtinhuynhtruong"]["tenhuynhtruong"].'</b> hiệu chỉnh thiếu nhi trong lớp <b class="text-light-blue">'.$_SESSION["thongtinhuynhtruong"]["tenlopgiaoly"].'</b>',
				'nguoicapnhat' => $_SESSION['thongtinhuynhtruong']['id_huynhtruong'],
				'loai'         => 	1,
			);
			$this->load->model("Model_lichsu");
			$this->Model_lichsu->set_value($array_lichsu);
			$this->Model_lichsu->them();
		}
		$data["loged_user"]=$_SESSION["thongtinhuynhtruong"];
		$data["page_title"]="Thiếu nhi";
		$data["result"]=$this->model_thieunhi->get_value($id);
		$data["view_page"]="view_suathieunhi";
		$this->load->view("admin/index",$data);
	}
	public function themdanhsach(){
		$this->load->model("model_thieunhi");
		$this->load->model('model_diemso');
		$id_namhoc=$_SESSION["thongtinhuynhtruong"]["id_namhoc"];
        $id_lopgiaoly=$_SESSION["thongtinhuynhtruong"]["id_lopgiaoly"];
		if(isset($_POST["ok"])){
			$id_thieunhi=$_POST["id_thieunhi"];
			$id_phanlop = $this->model_thieunhi->themlop($id_thieunhi,$id_lopgiaoly,$id_namhoc);
			if($id_phanlop != 0){
				// THÊM ĐIỂM LUÔN
				$value_diemso=array(
					'id_phanlop' =>	$id_phanlop,
					'dmieng_1'   =>	0,
					'd15phut_1'  =>	0,
					'd45phut_1'  =>	0,
					'dthi_1'     =>	0,
					'dmieng_2'   =>	0,
					'd15phut_2'  =>	0,
					'd45phut_2'  =>	0,
					'dthi_2'     =>	0,
				);
				$this->model_diemso->set_value($value_diemso);
				$this->model_diemso->them();
				$data["alert"]=1;
				// GHI LỊCH SỬ
				$thieunhi_ls=$this->model_thieunhi->get_value($id_thieunhi);
				$array_lichsu=array(
					'lichsu'       => 'Thêm mới danh sách lớp',
					'noidung'      => 'Trưởng <b class="text-red">'.$_SESSION["thongtinhuynhtruong"]["tenhuynhtruong"].'</b> thêm em <b class="text-green">'.$thieunhi_ls["tenthanh"].' '.$thieunhi_ls["hoten"].'</b> vào lớp <b class="text-light-blue">'.$_SESSION["thongtinhuynhtruong"]["tenlopgiaoly"].'</b>',
					'nguoicapnhat' => $_SESSION['thongtinhuynhtruong']['id_huynhtruong'],
					'loai'         => 	1,
				);
				$this->load->model("Model_lichsu");
				$this->Model_lichsu->set_value($array_lichsu);
				$this->Model_lichsu->them();
				$data["alert"]=array(
					"stt"     => "success",
					"title"   => "Quản lý thiếu nhi",
					"content" => "Thành công."	
				);
			}
			else{
				$data["alert"]=array(
					"stt"     => "success",
					"title"   => "Quản lý thiếu nhi",
					"content" => "Thành công. Thiếu nhi này trước đó có điểm, kiểm tra thông tin điểm số em này."
				);
			}
		}
        $this->load->model("model_thieunhi");
        $data["result_tn"]=$this->model_thieunhi->get_danhsachlop($id_namhoc,$id_lopgiaoly);
		$data["view_page"]="view_themdanhsach";
		$data["page_title"]="Thêm danh sách";
		$data["loged_user"]=$_SESSION["thongtinhuynhtruong"];
		$this->load->view("admin/index",$data);
	}
	public function show(){
		$mathieunhi=trim($_POST["mathieunhi"]);
		$query=$this->db->query("SELECT * FROM thieunhi WHERE mathieunhi LIKE '$mathieunhi'");
		if($query->num_rows()==0){
			return 0;
		}
		else{
			$result=$query->result_array();
		}
	?>
	<?php
		foreach ($result as $key => $value) {
	?>

		<div class="form-group">
			<dl class="dl-horizontal">
	            <dt>Mã Thiếu Nhi</dt><dd class ="text-red"><?php echo $value["mathieunhi"]; ?></dd>
	            <dt>Họ tên</dt><dd><?php echo $value["tenthanh"]." ".$value["hoten"]; ?></dd>
	            <dt>Ngày sinh</dt><dd><?php echo $value["ngaysinh"]; ?></dd>
	        </dl>
	        <form method="post" action="<?php echo base_url("thieunhi/themdanhsach") ?>">
		        <input type="hidden" value="<?php echo $value["id_thieunhi"]; ?>" name="id_thieunhi">
		        <input type="submit" name="ok" class="btn btn-block btn-success" value="Thêm vào lớp em này">
	        </form>
		</div>
		<hr>
	<?php
		}
	}
	public function chuyenlop(){
		$this->load->model("model_thieunhi");
		$id_namhoc=$_SESSION["thongtinhuynhtruong"]["id_namhoc"];
        $id_lopgiaoly_ht=$_SESSION["thongtinhuynhtruong"]["id_lopgiaoly"];
        $id_thieunhi=$_POST["id_thieunhi"];
        $id_phanlop=$_POST["id_phanlop"];
		if(isset($_POST["ok"])){
			$id_lopgiaoly=$_POST["lopgiaoly"];
			$this->load->model("model_lopgiaoly");
			$tenlopgiaoly = $this->model_lopgiaoly->get_value($id_lopgiaoly)["tenlopgiaoly"];
			$thieunhi_ls=$this->model_thieunhi->get_value($id_thieunhi);
			$return=$this->model_thieunhi->chuyenlop($id_phanlop,$id_lopgiaoly);
			if($return==1){
				$data["alert"]=1;
				// GHI LỊCH SỬ
				$array_lichsu=array(
					'lichsu'       => 'Chuyển lớp',
					'noidung'      => 'Trưởng <b class="text-red">'.$_SESSION["thongtinhuynhtruong"]["tenhuynhtruong"].'</b> xóa em <b class="text-green">'.$thieunhi_ls["tenthanh"].' '.$thieunhi_ls["hoten"].'</b> khỏi lớp <b class="text-light-blue">'.$_SESSION["thongtinhuynhtruong"]["tenlopgiaoly"].'</b>',
					'nguoicapnhat' => $_SESSION['thongtinhuynhtruong']['id_huynhtruong'],
					'loai'         => 	1,
				);
			}
			else{
				$data["alert"]=2;
				$array_lichsu=array(
					'lichsu'       => 'Chuyển lớp',
					'noidung'      => 'Trưởng <b class="text-red">'.$_SESSION["thongtinhuynhtruong"]["tenhuynhtruong"].'</b> chuyển em <b class="text-green">'.$thieunhi_ls["tenthanh"].' '.$thieunhi_ls["hoten"].'</b> vào lớp <b class="text-light-blue">'.$tenlopgiaoly.'</b>',
					'nguoicapnhat' => $_SESSION['thongtinhuynhtruong']['id_huynhtruong'],
					'loai'         => 	1,
				);
			}
			// GHI LỊCH SỬ
			$data["alert"]=array(
				"stt"     => "success",
				"title"   => "Quản lý thiếu nhi",
				"content" => "Chuyển lớp thành công"	
			);
			$this->load->model("Model_lichsu");
			$this->Model_lichsu->set_value($array_lichsu);
			$this->Model_lichsu->them();
		}
        $data["result"]=$this->model_thieunhi->get_value($id_thieunhi);
        $data["result_tn"]=$this->model_thieunhi->get_danhsachlop($id_namhoc,$id_lopgiaoly_ht);
		$data["id_phanlop"]=$_POST["id_phanlop"];
		$data["view_page"]="view_chuyenlop";
		$data["page_title"]="Chuyển lớp";
		$data["loged_user"]=$_SESSION["thongtinhuynhtruong"];
		$this->load->view("admin/index",$data);
	}
	public function showdel(){
		$this->load->model("model_thieunhi");
		$tn = $this->model_thieunhi->get_value($_POST["id_thieunhi"]);
	?>
		<div class="modal-dialog">
			<div class="modal-content">
	        	<div class="modal-header">
		          	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		            	<span aria-hidden="true">×</span></button>
		          	<h4 class="modal-title">Bạn đang muốn xóa em thiếu nhi này ra khỏi hệ thống !</h4>
	        	</div>
	        	<div class="modal-body">
	          		<p><?php echo "Tên thánh & Họ tên : {$tn["tenthanh"]} {$tn["hoten"]}"; ?></p>
	          		<p><?php echo "Ngày sinh : {$tn["ngaysinh"]}"; ?></p>
	          		<p><strong>Lưu ý :</strong></p>
	          		<ul>
	          			<li>Khi dùng chức năng xóa này, bạn sẽ không thể khôi phục lại.</li>
	          			<li>Toàn bộ dữ liệu về em thiếu nhi này sẽ không còn tồn tại.</li>
	          			<li>Hoạt động của bạn này rất quan trọng, nó sẽ được khi lại lịch sử.</li>
	          			<li>Hãy sử dụng chức năng này thật cẩn trọng.</li>
	          		</ul>
	        	</div>
	        	<div class="modal-footer">
	          		<form action="<?php echo base_url("thieunhi/del/{$_POST["id_thieunhi"]}"); ?>" method="post">
						<button class="btn btn-outline">Tôi chắc chắn, xóa !</button>
	          		</form>
	        	</div>
	      	</div>
      	</div>
	<?php
	}
	public function del($id_thieunhi){
		$this->load->model("model_thieunhi");
		$this->model_thieunhi->del($id_thieunhi);
		redirect("quanlythieunhi/danhsachthieunhi","location");
	}
	public function show_info_thieunhi(){
		$this->load->model("model_thieunhi");
		// $data_thieunhi = $this->model_diemso->get_value($_SESSION["thongtinhuynhtruong"]["id_namhoc"],$_POST["id_thieunhi"]);
		$data_thieunhi = $this->model_thieunhi->get_value($_POST["id_thieunhi"]);
		echo json_encode($data_thieunhi,JSON_UNESCAPED_UNICODE);
		die();
	}
}
?>