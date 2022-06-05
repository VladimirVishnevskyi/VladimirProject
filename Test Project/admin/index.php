<?php
require_once ("../site/bootstrap.php");
$user = \Model\User\Repository::getLoggedUser();
If(!$user) {
    header ("Location:login.php");
}
?>
<?php include "_partials/header.php"?>

<table class="table table-striped>
    <thead>
    <tr>
        <th scope="col"></th>
        <th scope="col">First</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row">1</th>
        <td>Mark</td>
    </tr>
    <tr>
        <th scope="row">2</th>
        <td>Jacob</td>>
    </tr>
    <tr>
        <th scope="row">3</th>
        <td colspan="2">Larry the Bird</td>
    </tr>
    </tbody>
</table>
<?php include "_partials/footer.php"?>
