<?php 
include_once '../layouts/header.php';
require_once '../../vendor/autoload.php';

use Database\Models\Contact; 

$contact = new Contact();
$row = $contact->getSelectedRecord($_GET['id']);
if(isset($_POST['submit'])) {
    $contact->setId($_GET['id']);
    $contact->setName($_POST['name']);
    $contact->setEmail($_POST['email']);
    $contact->setPhone($_POST['phone']);
    $contact->updateContact();
    header('location: /contactbook/public/index.php');
}
?>
<h1 class="title is-1">Edit Contact</h1>
<a href="../index.php">Go back</a><br><br>
<form method="post">
    <label for="name">Name</label><br>
    <input type="text" name="name" required value="<?php echo $row['name']; ?>"><br>
    <label for="email">Email</label><br>
    <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br>
    <label for="phone">Phone</label><br>
    <input type="text" name="phone" value="<?php echo $row['phone']; ?>" required><br><br>
    <input type="submit" name="submit">
</form>
<?php include_once '../layouts/footer.php'; ?>