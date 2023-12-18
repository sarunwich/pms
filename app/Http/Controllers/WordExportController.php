<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Shared\Html;
use App\Models\Reportstd;
use Illuminate\Support\Facades\Auth;

use View;

class WordExportController extends Controller
{
    //
    public function exportToWord(Request $request)
    {
        $uid = Auth::user()->id;
        $uname = Auth::user()->name;
        $reportstds = Reportstd::whereBetween('date_add', [$request->startdate, $request->enddate])
            ->where('reportstds.user_id', $uid)
            ->orderBy('reportstds.date_add', 'desc')
            ->get();

        // Create a new PHPWord instance
        $phpWord = new PhpWord();


        $htmlContent = view('users.WordExport', compact('reportstds'))->render();

        $section = $phpWord->addSection();
        $phpWord->addFontStyle('rNormalStyle', array('name' => 'Angsana New', 'bold' => false, 'italic' => false, 'size' => 16));
        $phpWord->addFontStyle('rBoldStyle', array('name' => 'Angsana New', 'bold' => true, 'italic' => false, 'size' => 22));
        $phpWord->addFontStyle('rBoldStyle16', array('name' => 'Angsana New', 'bold' => true, 'italic' => false, 'size' => 16));

        $phpWord->addParagraphStyle('pNormalRightStyle', array('align' => 'right', 'spaceBefore' => 0, 'spaceAfter' => 200, 'spacing' => 0));
        $phpWord->addParagraphStyle('pNormalCenterStyle', array('align' => 'center', 'spaceBefore' => 0, 'spaceAfter' => 0, 'spacing' => 0));
        $phpWord->addParagraphStyle('pNormalLeftStyle', array('align' => 'left', 'indent' => 4000));

        $phpWord->addFontStyle('rStyle', array('bold' => true, 'Angsana New' => true, 'size' => 16));
        $phpWord->addParagraphStyle('pStyle', array('align' => 'center', 'spaceAfter' => 100));
        $section->addText('ตารางบันทึกผลการปฏิบัติงาน', 'rBoldStyle', 'pNormalCenterStyle');
        $section->addTextBreak(1);
        // Define table style arrays
        $styleTable = array('borderSize' => 2, 'borderColor' => '006699', 'cellMargin' => 50);
        $styleFirstRow = array('borderBottomSize' => 18, 'borderBottomColor' => '0000FF', 'bgColor' => '66BBFF');

        // Define cell style arrays
        //$styleCell = array('valign'=>'center');
        $styleCell = array('name' => 'Angsana New', 'valign' => 'center', 'bold' => false, 'italic' => false, 'size' => 16);
        // $styleCellBTLR = array('valign'=>'center', 'textDirection'=>PHPWord_Style_Cell::TEXT_DIR_BTLR);

        // Define font style for first row
        //$fontStyle = array('bold'=>true, 'align'=>'center');
        $fontStyle = array('name' => 'Angsana New', 'align' => 'center', 'bold' => true, 'italic' => false, 'size' => 16);

        // Add table style
        $phpWord->addTableStyle('myOwnTableStyle', $styleTable, $styleFirstRow);


        // Add table
        $table = $section->addTable('myOwnTableStyle');
        //$table = $section->addTable(array('width' => 5000));
        // Add row
        $table->addRow(null, array('tblHeader' => true, 'cantSplit' => true));
        //$table->addRow();
        //$table->addRow(1500,array('width' => 100));

        // Add cells

        $table->addCell(2000, $styleCell)->addText('วันที่', $fontStyle);
        $table->addCell(6000, $styleCell)->addText('รายละเอียด', $fontStyle);
        $table->addCell(2000, $styleCell)->addText('หมายเหตุ', $fontStyle);
        foreach ($reportstds as $key => $reportstd) {
            $table->addRow(null);

            $table->addCell(2000)->addText(thaidate('l j F Y', $reportstd->date_add), 'rNormalStyle');
            $table->addCell(6000)->addText($reportstd->detail, 'rNormalStyle');
            $table->addCell(2000)->addText($reportstd->note, 'rNormalStyle');
        }
        $section->addTextBreak(3);

        $section->addText('(ลงชื่อ) ....................................... ผู้บันทึก             .', 'rBoldStyle16', 'pNormalRightStyle');
        $section->addText('('.$uname.')                               .', 'rBoldStyle16', 'pNormalRightStyle');
        $section->addTextBreak(2);
        $section->addText('ความเห็น,ข้อเสนอแนะ', 'rBoldStyle16', 'pNormalLeftStyle');
        $section->addText('...........................................................................................................................................................

...........................................................................................................................................................

...........................................................................................................................................................

...........................................................................................................................................................', 'rNormalStyle', 'pNormalLeftStyle');
        $section->addTextBreak(2);
        $section->addText('(ลงชื่อ) ......................................... ผู้ควบคุมการฝึกงาน', 'rBoldStyle16', 'pNormalRightStyle');
        $section->addText('(..........................................)                       .', 'rBoldStyle16', 'pNormalRightStyle');
        $section->addText('ตำแหน่ง.......................................                      .', 'rBoldStyle16', 'pNormalRightStyle');

        //  Html::addHtml($section, $htmlContent);
        // $section->addHtml($htmlContent);

        // Save the document to a file
        $filename = $uname.'_'.date('Y-m-d').'COOP.docx';
        $phpWord->save(storage_path('app/' . $filename));

        // Provide the document as a download link
        return response()->download(storage_path('app/' . $filename))->deleteFileAfterSend(true);

        // return view('users.WordExport');
    }
}
