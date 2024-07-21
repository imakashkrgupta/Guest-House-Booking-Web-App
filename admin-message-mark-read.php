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
echo "mark unreadpage";
$id = $_GET["id"];
echo $id;

$sql = "UPDATE contact_message SET message_status = '1' WHERE id = $id;";
if (mysqli_query($con, $sql)) {
    ?>
    <script>
        alert("Marked as Read.");
    history.go(-1);
    </script>
<?php
}
?>
