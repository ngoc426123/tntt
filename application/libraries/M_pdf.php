<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH."/third_party/mpdf/mpdf.php";
class M_pdf extends mPDF {
    public $param;
    public $pdf;
    public function __construct($param = "'c', 'A4-L'")
    {
        $this->param =$param;
        $this->pdf = new mPDF($this->param);
    }
}
?>