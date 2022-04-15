<?php
    // include dompdf

    use Dompdf\Dompdf;

    require("../lib/dompdf/autoload.inc.php");

    // fonction qui prend en paramètre de l'html et nous génère un pdf
    function makePDF(string $data){
        
        $pdf = new Dompdf();
        $pdf->loadHtml($data);
        $pdf->setPaper('A4','portrait');
        $pdf->render();
        $pdf->stream("resultat-evaluation-agent");
    }

    // on recupère le contenu de la page html dans une variable
    ob_start();
        require("../models/pdf-content.php");
        $data = ob_get_contents();
    ob_end_clean();

    // enfin, on fait appel à notre fonction qui créée le pdf 
    makePDF($data);
?>
