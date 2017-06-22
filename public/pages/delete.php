<?php 
include_once '../layouts/header.php';
require_once '../../vendor/autoload.php';

use Database\Models\Contact; 

$contact = new Contact();
$contact->deleteContact($_GET['id']);
header('location: /contactbook/public/index.php');

include_once '../layouts/footer.php'; ?>