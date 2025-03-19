<?php

namespace App\Helpers\Oreno;

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Oreno\General;
use App\Helpers\Oreno\Date;
use Elibyy\TCPDF\Facades\TCPDF;

//use Dompdf\Dompdf;
//use Dompdf\Options;

/**
 * Description of Pdf
 *
 * @author 64146
 */
class OrenoPdf extends TCPDF {

    public function Header() {
        // Logo
        $image_file = K_PATH_IMAGES.'logo_example.jpg';
        $this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 20);
        // Title
        $this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
    //put your code here
    public function __generate($request, $strHtml, $params) {
        $title = '';
        if (isset($params['title']) && !empty($params['title'])) {
            $title = $params['title'];
        }
        $filename = '';
        if (isset($params['filename']) && !empty($params['filename'])) {
            $filename = $params['filename'];
        }
        $papersize = 'A4';
        if (isset($params['paper']['size']) && !empty($params['paper']['size'])) {
            $papersize = $params['paper']['size'];
        }
        $paperorientation = 'portait';
        if (isset($params['paper']['orientation']) && !empty($params['paper']['orientation'])) {
            $paperorientation = $params['paper']['orientation'];
        }

    	$pdf = new TCPDF;
        
        $pdf::SetTitle($title);
        $pdf::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf::AddPage();
        $pdf::writeHTML($strHtml, true, false, true, false, '');
        //$pdf::writeHtmlCell(100,3,20,4,'<p>Page '.$pdf::getAliasNumPage().' of  '.' '.$pdf::getAliasNbPages().'</p>','',1,0,false,'R');
        $pdf::Output($filename, 'I');
    }

    //public function generate($request, $strHtml, $params) {
    //    $options = new Options();
    //    $defaultFont = 'Courier';
    //    if (isset($params['defaultFont']) && !empty($params['defaultFont'])) {
    //        $fontfamily = $params['defaultFont'];
    //    }
    //    $options->set('defaultFont', 'Courier');
    //    if (isset($params['debugLayoutLines']) && !empty($params['debugLayoutLines'])) {
    //        $options->set('debugLayoutLines', $params['debugLayoutLines']);
    //    }
    //    $dompdf = new Dompdf($options);
    //    $paper = 'A4';
    //    $orientation = 'portait';
    //    if (isset($params['paper']) && !empty($params['paper'])) {
    //        $paper = $params['paper']['size'];
    //        $orientation = $params['paper']['orientation'];
    //    }
    //    $dompdf->loadHtml($strHtml);
    //    // (Optional) Setup the paper size and orientation
    //    $dompdf->setPaper($paper, $orientation);
    //    // Render the HTML as PDF
    //    $dompdf->render();
    //    // Output the generated PDF to Browser
    //    $dompdf->stream();
    //}
}
