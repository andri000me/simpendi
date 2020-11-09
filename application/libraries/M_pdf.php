<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class M_pdf {
    
    function index()
    {
        $CI = & get_instance();
        log_message('Debug', 'mPDF class is loaded.');
    }
 
    function load($param=NULL)
    {
        require_once APPPATH.'../application/third_party/vendor/autoload.php';
         
        if ($param == NULL)
        {
            $param = "'c', 'A4', '', '', 15, 15, 16, 16, 9, 9, 'P'";          		
        }
         $mpdf = new \Mpdf\Mpdf();
        return $mpdf->AddPage($param);
        // return new mPDF();
    }
}