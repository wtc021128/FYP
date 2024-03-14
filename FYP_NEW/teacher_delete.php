<?php
include 'config2.php';
$id = $_GET['ids'];
$delete = "DELETE FROM registered_users_ac WHERE id = $id";
$deletequery = mysqli_query($conn, $delete);
if($deletequery){
    ?>
<script>
    window.location.replace("teacher_index.php");
</script>

<?php 

}else{
    echo 'Not deleted';
}

?>