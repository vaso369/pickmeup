<?php
require_once "../config/connection.php";
//include "getTransports.php";


try{
// Pokretanje Excel aplikacije
//$excel = new COM("Excel.Application");
//$excel->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
 //   $excel->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
//catch(COMException $ex){
  //  echo $ex->getMessage();
}
// Da bi se fizički videlo otvaranje fajla
$excel->Visible = 1;

// recommend to set to 0, disables alerts like "Do you want MS Word to be the default .. etc"
$excel->DisplayAlerts = 1;

// Otvaranje Excel fajla
$workbook = $excel->Workbooks->Open("http://localhost/pickMeUpV0/models/Transporti.xlsx") or die('Did not open filename');

// Otvaranje Sheet
$sheet = $workbook->Worksheets('Sheet1');
$sheet->activate;

$br = 1;
foreach($rezultat as $transport){
    // U A kolonu upisujemo ID
    $polje = $sheet->Range("A{$br}");
    $polje->activate;
    $polje->value = $transport->departure;

    // U B kolonu upisujemo TITLE
    $polje = $sheet->Range("B{$br}");
    $polje->activate;
    $polje->value = $transport->dateDept;

    // U C kolonu upisujemo DESCRIPTION
    $polje = $sheet->Range("C{$br}");
    $polje->activate;
    $polje->value = $transport->timeDept;

    // U D kolonu upisujemo TRAILER
    $polje = $sheet->Range("D{$br}");
    $polje->activate;
    $polje->value = $transport->seatNumbers;

    $polje = $sheet->Range("E{$br}");
    $polje->activate;
    $polje->value = $transport->additional;

    $br++;
}

// U E kolonu upisujemo BROJ UNETIH REDOVA

// Cuvanje promena u fajla
$workbook->_SaveAs("http://localhost/pickMeUpV0/models/movies/Transporti.xlsx", -4143);
$workbook->Save();

// Zatvaranje Excel fajla
$workbook->Saved=true;
$workbook->Close;

$excel->Workbooks->Close();
$excel->Quit();

unset($sheet);
unset($workbook);
unset($excel);
header("Location:index.php?page=about");