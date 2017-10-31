<?php
$rootDir = dirname(dirname(__FILE__));
require $rootDir . '/vendor/autoload.php';
spl_autoload_register(function ($className) use ($rootDir) {
    $className = str_replace('App\\', '', $className);
    include $rootDir . '/src/' . $className . '.php';
});

use App\Pledge;
use Dompdf\Dompdf;
use Dompdf\Options;

if (isset($_GET['name']) && isset($_GET['version'])) {
    $name = $_GET['name'];
    $pledgeVersion = $_GET['version'];
    $pledge = new Pledge($name, $pledgeVersion);

    $options = new Options();
    $options->set('defaultFont', 'Arial');

    $dompdf = new Dompdf($options);
    $dompdf->loadHtml($pledge->getHtml());
    $dompdf->setPaper('letter', 'landscape');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream('honest-muncie-pledge.pdf');
} else {
    include 'form.php';
}
