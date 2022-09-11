<?php
class Baocaoxuat extends CI_Controller{
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->helper("url");
		$this->load->model("model_function");
		$this->load->database();
		$this->model_function->checklogin(base_url()."adminlogin");
	}
	public function danhsachlop(){
		$this->load->library('excel');
		/*************BỐ CỤC**************/
		$this->excel->getActiveSheet()->getDefaultStyle()->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->excel->getActiveSheet()->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			/*SET HEIGHT AND WIDTH*/
		$this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(35);
		$this->excel->getActiveSheet()->getRowDimension('1')->setRowHeight(70);

		$this->excel->getActiveSheet()->mergeCells('B1:D1');
		$this->excel->getActiveSheet()->getCell('B1')->setValue("PHONG TRÀO THIẾU NHI THÁNH THỂ VIỆT NAM\nLIÊN ĐOÀN ANRÊ PHÚ YÊN\nXứ Đoàn Thánh Thể Chúa Giêsu\nGiáo Xứ Phú Hòa");
		$this->excel->getActiveSheet()->getStyle('B1')->getAlignment()->setWrapText(true);
		
		$this->excel->getActiveSheet()->mergeCells('A3:H3');
		$this->excel->getActiveSheet()->getCell('A3')->setValue(strtoupper($_POST["lopgiaoly"]));
		$this->excel->getActiveSheet()->getStyle('A3')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->getStyle('A3')->getFont()->setSize('20');

		$this->excel->getActiveSheet()->mergeCells('A4:H4');
		$this->excel->getActiveSheet()->getCell('A4')->setValue("Năm Học ".$_POST["namhoc"]);
		$this->excel->getActiveSheet()->getStyle('A4')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->getStyle('A4')->getFont()->setSize('15');

		$this->excel->getActiveSheet()->mergeCells('B5:D5');
		$this->excel->getActiveSheet()->getCell('B5')->setValue("* Huynh trưởng phụ trách : ");
		$this->excel->getActiveSheet()->getStyle('B5')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->getStyle('B5')->getFont()->setSize('13');
		$this->excel->getActiveSheet()->getStyle('B5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		$this->excel->getActiveSheet()->mergeCells('B6:D6');
		$this->excel->getActiveSheet()->getCell('B6')->setValue("* Tông đồ phụ trách : ");
		$this->excel->getActiveSheet()->getStyle('B6')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->getStyle('B6')->getFont()->setSize('13');
		$this->excel->getActiveSheet()->getStyle('B6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		
		$this->excel->getActiveSheet()->mergeCells('E5:F5');
		$this->excel->getActiveSheet()->getCell('E5')->setValue($_POST["tenhuynhtruong"]);
		$this->excel->getActiveSheet()->getStyle('E5')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->getStyle('E5')->getFont()->setSize('13');
		$this->excel->getActiveSheet()->getStyle('E5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		$this->excel->getActiveSheet()->mergeCells('E6:F6');
		/**********NHAN BIEN************/
		$post=array(
			"mathieunhi"    =>"MÃ THIẾU NHI",
			"tenthanh"      =>"TÊN THÁNH",
			"hoten"         =>"HỌ TÊN",
			"gioitinh"      =>"GIỚI TÍNH",
			"ngaysinh"      =>"NGÀY SINH",
			"ngaybonmang"   =>"NGÀY KÍNH",
			"diachi"        =>"ĐỊA CHỈ",
			"sdt"           =>"SỐ ĐIỆN THOẠI",
			"khugiao"       =>"KHU GIÁO",
			"thongtinchame" =>"THÔNG TIN CHA MẸ",
			"daruatoi"      =>"RỬA TỘI",
			"daruocle"      =>"RƯỚC LỄ",
			"dathemsuc"     =>"THÊM SỨC",
		);
		foreach ($post as $key => $value) {
			if($key=="hoten"){
				$title[0]["ho"]="HỌ";
				$title[0]["ten"]="TÊN";
			}
			else{
				$title[0][$key]=$value;
			}
		}
		/************TRUY VẤN VÀ ĐƯA VÔ BIẾN*************/
		$this->load->model("model_thieunhi");
		$array_id_thieunhi=explode("|",$_POST["array_id_thieunhi"]);
		$result_pl=array();
		foreach ($array_id_thieunhi as $aidtn) {
			$query_pl = array();
			$query_pl[]=$this->model_thieunhi->get_value($aidtn);
			$result_pl=array_merge($result_pl,$query_pl);
		}
		$i=1;
		foreach ($result_pl as $value_pl) {
			$id_thieunhi=$value_pl["id_thieunhi"];
			foreach ($title as $key_tn => $value_tn) {
				foreach ($value_tn as $key => $value) {
					$title[$i]["mathieunhi"]=$value_pl["mathieunhi"];
					$title[$i]["tenthanh"]=$value_pl["tenthanh"];
					$names=$value_pl["hoten"];
	                $name_shift=explode(" ",$names);
	                $count_array=count($name_shift)-1;
	                $ten=$name_shift[$count_array];
	                array_pop($name_shift);
	                $ho=implode(" ", $name_shift);
					$title[$i]["ho"]=$ho;
					$title[$i]["ten"]=$ten;
					$gioitinh=$value_pl["gioitinh"]==1?"nam":"nữ";
					$title[$i]["gioitinh"]=$gioitinh;
					$title[$i]["ngaysinh"]=$value_pl["ngaysinh"];
					$title[$i]["ngaybonmang"]=$value_pl["ngaybonmang"];
					$title[$i]["diachi"]=$value_pl["diachi"];
					$title[$i]["sdt"]=$value_pl["sdt"]." ";
					$title[$i]["khugiao"]=$value_pl["khugiao"];
					$thongtincha=$value_pl["tenthanhcha"]." ".$value_pl["hotencha"];
					$thongtinme=$value_pl["tenthanhme"]." ".$value_pl["hotenme"];
					$thongtinchame=$thongtincha."\n".$thongtinme;
					$title[$i]["thongtinchame"]=$thongtinchame;
					if($value_pl["daruatoi"]==1){
						$ngayruatoi=$value_pl["ngayruatoi"];
						$linhmucruatoi=$value_pl["linhmucruatoi"];
						$nhathoruatoi=$value_pl["nhathoruatoi"];
						$daruatoi=$ngayruatoi."\n".$linhmucruatoi."\n".$nhathoruatoi;
					}
					else{
						$daruatoi="Chưa rửa tội";
					}
					if($value_pl["daruocle"]==1){
						$ngayruocle=$value_pl["ngayruocle"];
						$linhmucruocle=$value_pl["linhmucruocle"];
						$nhathoruocle=$value_pl["nhathoruocle"];
						$daruocle=$ngayruocle."\n".$linhmucruocle."\n".$nhathoruocle;
					}
					else{
						$daruocle="Chưa rước lễ";
					}
					if($value_pl["dathemsuc"]==1){
						$ngaythemsuc=$value_pl["ngaythemsuc"];
						$linhmucthemsuc=$value_pl["linhmucthemsuc"];
						$nhathothemsuc=$value_pl["nhathothemsuc"];
						$dathemsuc=$ngaythemsuc."\n".$linhmucthemsuc."\n".$nhathothemsuc;
					}
					else{
						$dathemsuc="Chưa thêm sức";
					}
					$title[$i]["daruatoi"]=$daruatoi;
					$title[$i]["daruocle"]=$daruocle;
					$title[$i]["dathemsuc"]=$dathemsuc;
				}
			}
			$i++;
		}
		$i=0;
		foreach ($title[0] as $key => $value) {
			$col[$key]=chr($i+65);
			$i++;
		}
		/**********************GHI DỮ LIỆU*********************/
		$row=8;
		foreach ($title as $keys => $values) {
			foreach ($values as $key => $value) {
				$this->excel->getActiveSheet()->getCell($col[$key].$row)->setValue($value);
				$this->excel->getActiveSheet()->getColumnDimension($col[$key])->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension($col[$key])->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension($col[$key])->setAutoSize(true);
				$this->excel->getActiveSheet()->getStyle($col[$key])->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
				$this->excel->getActiveSheet()->getColumnDimension($col[$key])->setAutoSize(true);
				$this->excel->getActiveSheet()->getStyle($col[$key])->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
				$this->excel->getActiveSheet()->getColumnDimension($col[$key])->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension($col[$key])->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension($col[$key])->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension($col[$key])->setAutoSize(true);;
				$this->excel->getActiveSheet()->getColumnDimension($col[$key])->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension($col[$key])->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension($col[$key])->setAutoSize(true);
				$this->excel->getActiveSheet()->getStyle($col[$key].$row)->getAlignment()->setWrapText(true);
				$this->excel->getActiveSheet()->getColumnDimension($col[$key])->setAutoSize(true);
				$this->excel->getActiveSheet()->getStyle($col[$key].$row)->getAlignment()->setWrapText(true);
				$this->excel->getActiveSheet()->getColumnDimension($col[$key])->setAutoSize(true);
				$this->excel->getActiveSheet()->getStyle($col[$key].$row)->getAlignment()->setWrapText(true);
				$this->excel->getActiveSheet()->getColumnDimension($col[$key])->setAutoSize(true);
				$this->excel->getActiveSheet()->getStyle($col[$key].$row)->getAlignment()->setWrapText(true);
			}
			$row++;
		}
		$this->excel->getActiveSheet()->getStyle("A8:N8")->getFont()->setBold(true);
		/*********XUẤT FILE*********/
		$filename="danhsachlop_".$_SESSION["thongtinhuynhtruong"]["mahuynhtruong"].".xls";
		$export = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		$export->save("./download/".$filename);
		$fileurl=base_url()."download/".$filename;
		echo $fileurl;
	}
	public function diemso(){
		$this->load->library('excel');
		$this->excel->setActiveSheetIndex(0);
		/***********SESSION***********/
		$id_namhoc=$_POST["id_namhoc"];
		$id_lopgiaoly=$_POST["id_lopgiaoly"];
		/*************BỐ CỤC**************/
		$this->excel->getActiveSheet()->getDefaultStyle()->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->excel->getActiveSheet()->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->mergeCells('A1:D3');
		$this->excel->getActiveSheet()->mergeCells('A4:N5');
		$this->excel->getActiveSheet()->mergeCells('A6:A7');
		$this->excel->getActiveSheet()->mergeCells('B6:B7');
		$this->excel->getActiveSheet()->mergeCells('C6:C7');
		$this->excel->getActiveSheet()->mergeCells('D6:D7');
		$this->excel->getActiveSheet()->mergeCells('E6:I6');
		$this->excel->getActiveSheet()->mergeCells('J6:N6');
		$this->excel->getActiveSheet()->mergeCells('O6:O7');
		$this->excel->getActiveSheet()->getCell('A1')->setValue("GIÁO XỨ PHÚ HÒA\nLIÊN ĐOÀN THÁNH THỂ CHÚA GIÊSU");
		$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setWrapText(true);
		$this->excel->getActiveSheet()->getCell('A4')->setValue("Điểm Số Lớp ".$_POST["lopgiaoly"]);
		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->getStyle('A4')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->getStyle('A4')->getFont()->setSize('20');
		$this->excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
		$this->excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
		$this->excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
		$this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
		$this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
		$this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
		$this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(10);
		$this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(10);
		$this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(10);
		$this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(10);
		$this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(10);
		$this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(10);
		$this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(10);
		$this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(10);
		/***********TIÊU ĐỀ***********/
		$this->excel->getActiveSheet()->setCellValue('A6',"Mã thiếu nhi");
		$this->excel->getActiveSheet()->setCellValue('B6',"Tên Thánh");
		$this->excel->getActiveSheet()->setCellValue('C6',"Họ");
		$this->excel->getActiveSheet()->setCellValue('D6',"Tên");
		$this->excel->getActiveSheet()->setCellValue('E6',"HKI");
		$this->excel->getActiveSheet()->setCellValue('E7',"Miệng");
		$this->excel->getActiveSheet()->setCellValue('F7',"15 Phút");
		$this->excel->getActiveSheet()->setCellValue('G7',"45 Phút");
		$this->excel->getActiveSheet()->setCellValue('H7',"Thi");
		$this->excel->getActiveSheet()->setCellValue('I7',"Trung Bình");
		$this->excel->getActiveSheet()->setCellValue('J6',"KII");
		$this->excel->getActiveSheet()->setCellValue('J7',"Miệng");
		$this->excel->getActiveSheet()->setCellValue('K7',"15 Phút");
		$this->excel->getActiveSheet()->setCellValue('L7',"45 Phút");
		$this->excel->getActiveSheet()->setCellValue('M7',"Thi");
		$this->excel->getActiveSheet()->setCellValue('N7',"Trung Bình");
		$this->excel->getActiveSheet()->setCellValue('O6',"TB Năm");
		/************TRUY VẤN*************/
		$this->load->model("model_diemso");
		$array_id_thieunhi=explode("|",$_POST["array_id_thieunhi"]);
		$tn=array();
		foreach ($array_id_thieunhi as $aidtn) {
			$query = array();
			$query[]=$this->model_diemso->get_value($id_namhoc,$aidtn);
			$tn=array_merge($tn,$query);
		}
		$i=8;
		foreach($tn as $result){
			/***********THÔNG TIN THIẾU NHI**********/
			$id_thieunhi = $result["id_thieunhi"];
			$mathieunhi  = $result["mathieunhi"];
			$tenthanh    = $result["tenthanh"];
			$hoten       = $result["hoten"];
			$names       = $result["hoten"];
	        $name_shift=explode(" ",$names);
	        $count_array=count($name_shift)-1;
	        $ten=$name_shift[$count_array];
	        array_pop($name_shift);
	        $ho=implode(" ", $name_shift);
			/***************ĐIỂM SỐ**************/
			$dmieng_1  = $result["diemmieng_hk1"];
			$d15p_1    = $result["diem15p_hk1"];
			$d45p_1    = $result["diem45p_hk1"];
			$dthi_1    = $result["diemthi_hk1"];
			$tb_1      = $result["trungbinh_hk1"];
			$dmieng_2  = $result["diemmieng_hk2"];
			$d15p_2    = $result["diem15p_hk2"];
			$d45p_2    = $result["diem45p_hk2"];
			$dthi_2    = $result["diemthi_hk2"];
			$tb_2      = $result["trungbinh_hk2"];
			$tbcn      = $result["trungbinh_canam"];
			/***********GHI GIA TRI VAO O**********/
			$this->excel->getActiveSheet()->setCellValue('A'.$i,$mathieunhi);
			$this->excel->getActiveSheet()->setCellValue('B'.$i,$tenthanh);
			$this->excel->getActiveSheet()->setCellValue('C'.$i,$ho);
			$this->excel->getActiveSheet()->setCellValue('D'.$i,$ten);
			$this->excel->getActiveSheet()->setCellValue('E'.$i,$dmieng_1);
			$this->excel->getActiveSheet()->setCellValue('F'.$i,$d15p_1);
			$this->excel->getActiveSheet()->setCellValue('G'.$i,$d45p_1);
			$this->excel->getActiveSheet()->setCellValue('H'.$i,$dthi_1);
			$this->excel->getActiveSheet()->setCellValue('I'.$i,$tb_1);
			$this->excel->getActiveSheet()->setCellValue('J'.$i,$dmieng_2);
			$this->excel->getActiveSheet()->setCellValue('K'.$i,$d15p_2);
			$this->excel->getActiveSheet()->setCellValue('L'.$i,$d45p_2);
			$this->excel->getActiveSheet()->setCellValue('M'.$i,$dthi_2);
			$this->excel->getActiveSheet()->setCellValue('N'.$i,$tb_2);
			$this->excel->getActiveSheet()->setCellValue('O'.$i,$tbcn);
			$i++;
		}
		/*********XUẤT FILE*********/
		$filename="diemso_".$_SESSION["thongtinhuynhtruong"]["mahuynhtruong"].".xls";
		$export = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		$export->save("./download/".$filename);
		$fileurl=base_url()."download/".$filename;
		echo $fileurl;
	}
	public function diemdanh(){
		$this->load->library('excel');
		$this->excel->setActiveSheetIndex(0);
		/***********SESSION***********/
		$id_namhoc    = $_POST["id_namhoc"];
		$id_lopgiaoly = $_POST["id_lopgiaoly"];
		$thang_from   = $_POST["thang_from"];
		$nam_from     = $_POST["nam_from"];
		$thang_to     = $_POST["thang_to"];
		$nam_to       = $_POST["nam_to"];
		$num_left = $nam_to - $nam_from;
		$arr = array();
		for($i=$thang_from; $i <= 12  ; $i++) { 
			$arr[$nam_from][] = $i;
		}
		if( $num_left ){
			if( $num_left>1 ){
				for ($j=($nam_from+1); $j < $nam_to ; $j++) { 
					for ($i=0; $i <= 12 ; $i++) { 
						$arr[$j][] = $i;
					}
				}
			}
			for($i=1; $i <= $thang_to  ; $i++) {
				$arr[$nam_to][] = $i;
			}
		}

		foreach ($arr as $year => $row_month) {
			foreach ($row_month as $month) {
				$arr_sunday[$year][$month] = get_sunday($month,$year);
			}
		}
		// print_r($arr_sunday); die();
		/*************BỐ CỤC**************/
		$this->excel->getActiveSheet()->getDefaultStyle()->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->excel->getActiveSheet()->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->mergeCells('A1:D3');
		$this->excel->getActiveSheet()->mergeCells('A4:D5');
		$this->excel->getActiveSheet()->mergeCells('A6:A7');
		$this->excel->getActiveSheet()->mergeCells('B6:B7');
		$this->excel->getActiveSheet()->mergeCells('C6:C7');
		$this->excel->getActiveSheet()->mergeCells('D6:D7');
		$this->excel->getActiveSheet()->getCell('A1')->setValue("GIÁO XỨ PHÚ HÒA\nLIÊN ĐOÀN THÁNH THỂ CHÚA GIÊSU");
		$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setWrapText(true);
		$this->excel->getActiveSheet()->getCell('A4')->setValue("Điểm Danh Lớp ".$_POST["lopgiaoly"]);
		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->getStyle('A4')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->getStyle('A4')->getFont()->setSize('20');
		$this->excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
		$this->excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
		$this->excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
		$this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
		/***********TIÊU ĐỀ***********/
		$this->excel->getActiveSheet()->setCellValue('A6',"Mã thiếu nhi");
		$this->excel->getActiveSheet()->setCellValue('B6',"Tên Thánh");
		$this->excel->getActiveSheet()->setCellValue('C6',"Họ");
		$this->excel->getActiveSheet()->setCellValue('D6',"Tên");
		/************NGÀY THÁNG***********/
		// THÁNG
		$start_i = 4;
		foreach ($arr_sunday as $year => $row_month) {
			foreach ($row_month as $month => $row_day) {
				$s = $start_i;
				$e = $start_i + (count($row_day) - 1);
				$start_i = $e + 1;
				$start = PHPExcel_Cell::stringFromColumnIndex($s);
				$end   = PHPExcel_Cell::stringFromColumnIndex($e);
				$mer = $start."6:".$end."6";
				$this->excel->getActiveSheet()->mergeCells($mer);
				$this->excel->getActiveSheet()->getCell($start."6")->setValue("{$month}/{$year}");
			}
		}
		// NGÀY
		$start_i = 4;
		foreach ($arr_sunday as $year => $row_month) {
			foreach ($row_month as $month => $row_day) {
				foreach ($row_day as $day) {
					$start = PHPExcel_Cell::stringFromColumnIndex($start_i);
					$this->excel->getActiveSheet()->getColumnDimension($start)->setWidth(5);
					$this->excel->getActiveSheet()->getCell($start."7")->setValue("$day");
					$start_i++;
				}
			}
		}
		/************TRUY VẤN*************/
		$this->load->model("model_diemdanh");
		$array_id_thieunhi=explode("|",$_POST["array_id_thieunhi"]);
		$tn=array();
		foreach ($array_id_thieunhi as $aidtn) {
			$query = array();
			$query[]=$this->model_diemdanh->get_value($id_namhoc,$aidtn);
			$tn=array_merge($tn,$query);
		}
		$i=8;
		/***************ĐIỂM DANH**************/
		foreach($tn as $result){
			/***********THÔNG TIN THIẾU NHI**********/
			$id_thieunhi = $result["id_thieunhi"];
			$mathieunhi  = $result["mathieunhi"];
			$tenthanh    = $result["tenthanh"];
			$hoten       = $result["hoten"];
			$names       = $result["hoten"];
	        $name_shift=explode(" ",$names);
	        $count_array=count($name_shift)-1;
	        $ten=$name_shift[$count_array];
	        array_pop($name_shift);
	        $ho=implode(" ", $name_shift);
			/***********GHI GIA TRI VAO O**********/
			$this->excel->getActiveSheet()->setCellValue('A'.$i,$mathieunhi);
			$this->excel->getActiveSheet()->setCellValue('B'.$i,$tenthanh);
			$this->excel->getActiveSheet()->setCellValue('C'.$i,$ho);
			$this->excel->getActiveSheet()->setCellValue('D'.$i,$ten);
			/***************ĐIỂM DANH**************/
			$j=4;
			foreach ($arr_sunday as $year => $row_month) {
				foreach ($row_month as $month => $row_day) {
					foreach ($row_day as $day) {
						$day_com = $year."-".$month."-".$day;
						$char = PHPExcel_Cell::stringFromColumnIndex($j);
						foreach ($result["chuyencan"] as $cc) {
							if($cc === $day_com){
								$this->excel->getActiveSheet()->setCellValue($char.$i,"x");
								break;
							}
						}
						$j++;
						
					}
				}
			}
			$i++;
		}
		/*********XUẤT FILE*********/
		$filename="diemdanh_".$_SESSION["thongtinhuynhtruong"]["mahuynhtruong"].".xls";
		$export = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		$export->save("./download/".$filename);
		$fileurl=base_url()."download/".$filename;
		echo $fileurl;
	}
	public function xuatphieudiem(){
		// set pdf
		$array_param=array('c','A5','','',5,5,5,5,0,0,'p');
		$this->load->library('pdf',$array_param);
		$this->pdf->SetDisplayMode('fullpage');

		// lấy giá trị từ from
		$id_namhoc = $_POST["id_namhoc"];
		$namhoc    = $_POST["namhoc"];
		$lopgiaoly = $_POST["tenlopgiaoly"];
		
		// tạo biến để iN
		$array_id_thieunhi=explode("|",$_POST["array_id_thieunhi"]);
		$values_success=array();
		$result_pl=array();
		// lấy giá trị vào biến value_success
		$this->load->model("model_diemso");
		foreach ($array_id_thieunhi as $aidtn) {
			$sql_pl = array();
			$sql_pl[]=$this->model_diemso->get_value($id_namhoc,$aidtn);
			$result_pl=array_merge($result_pl,$sql_pl);
		}
		foreach ($result_pl as $key_pl => $value_pl){
			// thông tin thiếu nhi
			$values_success[$key_pl]["id_phanlop"] = $value_pl["id_phanlop"];
			$values_success[$key_pl]["mathieunhi"] = $value_pl["mathieunhi"];
			$values_success[$key_pl]["tenthanh"]   = $value_pl["tenthanh"];
			$values_success[$key_pl]["hoten"]     = $value_pl["hoten"];
			$values_success[$key_pl]["ngaysinh"]   = $value_pl["ngaysinh"];
			// lấy điểm
			$sql_ht=$this->db->query("SELECT * FROM hoctap WHERE id_phanlop='".$values_success[$key_pl]["id_phanlop"]."'");
			if($sql_ht->num_rows()>0){
				$result_ht=$sql_ht->row_array();

				$values_success[$key_pl]["dmieng_1"]=$result_ht["diemmieng_hk1"];
				$values_success[$key_pl]["d15p_1"]=$result_ht["diem15p_hk1"];
				$values_success[$key_pl]["d45p_1"]=$result_ht["diem45p_hk1"];
				$values_success[$key_pl]["dthi_1"]=$result_ht["diemthi_hk1"];
				$values_success[$key_pl]["tb_1"]=$result_ht["trungbinh_hk1"];
				$values_success[$key_pl]["dmieng_2"]=$result_ht["diemmieng_hk2"];
				$values_success[$key_pl]["d15p_2"]=$result_ht["diem15p_hk2"];
				$values_success[$key_pl]["d45p_2"]=$result_ht["diem45p_hk2"];
				$values_success[$key_pl]["dthi_2"]=$result_ht["diemthi_hk2"];
				$values_success[$key_pl]["tb_2"]=$result_ht["trungbinh_hk2"];
				$values_success[$key_pl]["tb_nam"]=$result_ht["trungbinh_canam"];
			}
			else{
				$values_success[$key_pl]["dmieng_1"]="Chưa cập nhật";
				$values_success[$key_pl]["d15p_1"]="Chưa cập nhật";
				$values_success[$key_pl]["d45p_1"]="Chưa cập nhật";
				$values_success[$key_pl]["dthi_1"]="Chưa cập nhật";
				$values_success[$key_pl]["tb_1"]="Chưa cập nhật";
				$values_success[$key_pl]["dmieng_2"]="Chưa cập nhật";
				$values_success[$key_pl]["d15p_2"]="Chưa cập nhật";
				$values_success[$key_pl]["d45p_2"]="Chưa cập nhật";
				$values_success[$key_pl]["dthi_2"]="Chưa cập nhật";
				$values_success[$key_pl]["tb_2"]="Chưa cập nhật";
				$values_success[$key_pl]["tb_nam"]="Chưa cập nhật";
			}
		}
		foreach ($values_success as $key_success => $value_success) {
			$this->pdf->AddPage();
			$noidung = "
			<style>
			.page_title{
				text-align:center;
				font-weight:bold;
				margin-top:0px;
				margin-bottom:10px;
			}
			.title{
				text-align:center;
				font-weight:bold;
				font-size:30px;
				margin-bottom:5px;
			}
			.des{
				text-align:center;
			}
			.info{
				list-style:none;
				padding-left:0px;
				font-size:16px;
			}
			.info span{
				font-weight:bold;
			}
			.hk{
				font-weight:bold;
				text-align:center;
				font-size:16px;
				margin-bottom:5px;
			}
			.table{
				width:100%;
				border-collapse: collapse;
				text-align:center;
				font-size:16px;
				margin-bottom:15px;
			}
			.table th{
				font-weight:bold;
			}
			.tb{
				text-align:center;
			}
			.table-margin{
				margin-bottom:10px;
			}
			.blit{
				width:49%;
				font-size:16px;
			}
			.blit p.title_t{
				text-align: center;
				font-weight:bold;
			}
			.left{
				float:left;
			}
			.right{
				float:right;
			}
			</style>

			<div class='page_title'>Giáo Xứ Phú Hòa<br/>
			Xứ Đoàn Thánh Thể Chúa Giêsu</div>

			<div class='title'>PHIẾU LIÊN LẠC THIẾU NHI</div>
			<div class='des'>----†----</div>

			<ul class='info'>
				<li>Mã thiếu nhi : <span>".$value_success['mathieunhi']."</span></li>
				<li>Tên Thánh & Họ Tên : <span>".$value_success['tenthanh']." ".$value_success['hoten']."</span></li>
				<li>Ngày sinh : <span>".$value_success['ngaysinh']."</span></li>
				<li>Lớp : <span>".$lopgiaoly."</span></li>
				<li>Năm học : <span>".$namhoc."</span></li>
			</ul>

			<div class='hk'>Học Kỳ I</div>
			<table class='table' border='1'>
				<tr>
					<th width='20%'>Điểm<br/>miệng</th>
					<th width='20%'>Điểm<br/>15 phút</th>
					<th width='20%'>Điểm<br/>45 phút</th>
					<th width='20%'>Điểm<br/>thi</th>
					<th width='20%'>Điểm<br/>trung bình</th>
				</tr>
				<tr>
					<td>".$value_success["dmieng_1"]."</td>
					<td>".$value_success["d15p_1"]."</td>
					<td>".$value_success["d45p_1"]."</td>
					<td>".$value_success["dthi_1"]."</td>
					<td>".$value_success["tb_1"]."</td>
				</tr>
			</table>
			<div class='hk'>Học Kỳ II</div>
			<table class='table' border='1'>
				<tr height='50px'>
					<th width='20%'>Điểm<br/>miệng</th>
					<th width='20%'>Điểm<br/>15 phút</th>
					<th width='20%'>Điểm<br/>45 phút</th>
					<th width='20%'>Điểm<br/>thi</th>
					<th width='20%'>Điểm<br/>trung bình</th>
				</tr>
				<tr height='50px'>
					<td>".$value_success["dmieng_2"]."</td>
					<td>".$value_success["d15p_2"]."</td>
					<td>".$value_success["d45p_2"]."</td>
					<td>".$value_success["dthi_2"]."</td>
					<td>".$value_success["tb_2"]."</td>
				</tr>
			</table>
			<div class='hk'>Tổng Kết</div>
			<table class='table' border='1'>
				<tr height='50px'>
					<th width='20%'>Trung bình<br/>cả năm</th>
					<th width='20%'>Hạnh<br/>kiểm</th>
					<th width='20%'>Nghỉ<br/>có phép</th>
					<th width='20%'>Nghỉ<br/>không phép</th>
					<th width='20%'>Xét<br/>duyệt</th>
				</tr>
				<tr height='50px'>
					<td>".$value_success["tb_nam"]."</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</table>
			<div class='blit left'>
				<p class='title_t'>Ý kiến phụ huynh</p>
				<p>--------------------------------------------------------------------</p>
				<p>--------------------------------------------------------------------</p>
				<p>--------------------------------------------------------------------</p>
				<p>--------------------------------------------------------------------</p>
				<p class='title_t'>Chữ ký phụ huynh</p>
			</div>
			<div class='blit right'>
				<p class='title_t'>Ý kiến trưởng đứng lớp</p>
				<p>--------------------------------------------------------------------</p>
				<p>--------------------------------------------------------------------</p>
				<p>--------------------------------------------------------------------</p>
				<p>--------------------------------------------------------------------</p>
				<p class='title_t'>Chữ ký trưởng đừng lớp</p>
			</div>";
			$this->pdf->WriteHTML($noidung);
		}
		$filename="xuatphieudiem_".$_SESSION["thongtinhuynhtruong"]["mahuynhtruong"].".pdf";
		$this->pdf->Output("./download/".$filename);

		$fileurl=base_url()."download/".$filename;
		echo $fileurl;
	}
}
?>