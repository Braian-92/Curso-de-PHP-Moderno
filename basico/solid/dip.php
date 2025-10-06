<?php

//! principio de inversion de dependencia
//! los modulos de alto nivel no deberian depender de los modulos de bajo nivel, ambos deberian de depender de abtracciones

interface ReportInterface {
  public function generate(string $contenido);
}

class PDFReport implements ReportInterface{
  public function generate(string $content){
    echo "Se crea el pdf con el contenido".$content;
  }
}

class HTMLReport implements ReportInterface{
  public function generate(string $content){
    echo "Se crea el html con el contenido".$content;
  }
}

class EXCELReport implements ReportInterface{
  public function generate(string $content){
    echo "Se crea el excel con el contenido".$content;
  }
}


class Estimate {
  //! no depender de un elemento de bajo nivel
  // private PDFReport $report;
  //! depender de una abtraccion
  private ReportInterface $report;

  public function __construct(ReportInterface $report){
    $this->report = $report;
  }

  public function process() {
    echo "Se genera la estimación<br/>";
    $this->report->generate("Contenido de la estimación");
  }

}

$pdfReport = new PDFReport();
$htmlReport = new HTMLReport();
$excelReport = new EXCELReport();
$estimate = new Estimate($pdfReport);
$estimate->process();
$estimate2 = new Estimate($htmlReport);
$estimate2->process();
$estimate3 = new Estimate($excelReport);
$estimate3->process();