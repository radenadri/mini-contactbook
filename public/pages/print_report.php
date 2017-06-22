<?php 
require_once '../../vendor/autoload.php';

use Database\Models\Contact;
use Dompdf\Dompdf;

$i = 0;
$contact = new Contact();
$row = $contact->getSelectedRecord($_GET['id']);

$name = $row['name'];
$email = $row['email'];
$phone = $row['phone'];

$html = '<html>
        <body>
        <h1>Contact Details</h1>
        <table border="1" style="border-collapse: collapse">
        <thead>
        <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        <td>' . $name  . '</td>
        <td>' . $email . '</td>
        <td>' . $phone . '</td>
        </tr>
        </tbody>
        </table>
        </body>
        </html>';

// $contact->printReport($html);
$dompdf = new DOMPDF();
$dompdf->loadHtml($html);
$dompdf->render();
$dompdf->stream("sample.pdf", array("Attachment"=>0));   