<?php 
include_once 'layouts/header.php';
require_once '../vendor/autoload.php';

use Database\Models\Contact;
use Dompdf\Dompdf;

$i = 0;
$contact = new Contact();
$rows = $contact->findAll();?>
<h1 class="title is-1">Contact</h1>
<a href="/contactbook/public/pages/add.php">Add New</a><br><br>
<table class="table">
    <thead>
        <th>No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Action</th>
    </thead>
    <tbody>
        <?php while($data = $rows->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
            <td><?php echo $i += 1;?></td>
            <td><?php echo $data['name'];?></td>
            <td><?php echo $data['email'];?></td>
            <td><?php echo $data['phone'];?></td>
            <td>
                <a href="/contactbook/public/pages/edit.php?id=<?php echo $data['id']; ?>">Edit</a>&nbsp;
                <a href="/contactbook/public/pages/delete.php?id=<?php echo $data['id']; ?>">Delete</a>&nbsp;
                <a href="/contactbook/public/pages/print_report.php?id=<?php echo $data['id']; ?>">Print Report</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<?php include_once 'layouts/footer.php'; ?>