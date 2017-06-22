<?php 
include_once '../layouts/header.php';
require_once '../../vendor/autoload.php';

use Database\Models\Contact; 

if(isset($_POST['submit'])) {
    $contact = new Contact();
    $contact->setName($_POST['name']);
    $contact->setEmail($_POST['email']);
    $contact->setPhone($_POST['phone']);
    
    $contact->insertContact();
    header('location: /contactbook/public/index.php');
}
?>
<h1 class="title is-1">Add Contact</h1>
<a href="../index.php">Go back</a><br><br>
<form method="post">
    <label for="name">Name</label><br>
    <input type="text" name="name" required><br>
    <label for="email">Email</label><br>
    <input type="email" name="email" required><br>
    <label for="phone">Phone</label><br>
    <input type="text" name="phone" required><br><br>
    <input type="submit" name="submit">
</form>
<?php include_once '../layouts/footer.php'; ?>