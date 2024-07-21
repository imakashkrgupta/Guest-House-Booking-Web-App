<?php
session_start();
if (! isset($_SESSION['user'])) {
   
    header('location:admin-panel-login.php');

}
if (isset($_POST['logout'])) {
    session_destroy();
    header('location:admin-panel-login.php');
}
include "db_conn.php";
/*----------------------------------*/

$id = $_GET["id"];


$sql = "DELETE FROM admin_login WHERE id = $id;";
if (mysqli_query($con, $sql)) {
    ?>
    <script>
        alert("user deleted.");
    history.go(-2);
    </script>
<?php
}

?>