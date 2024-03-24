<?php
require('connection.php');
?>

<?php
include_once 'adminpage01.php';
?>

<script>
        function checkInput() {
            var cIdInput = document.getElementById("dnnl_ID");
            var cIdValue = cIdInput.value;
            
            if (!cIdValue.startsWith("dnnl")) {
                alert("dnnl_ID必須以dnnl開頭！");
                cIdInput.value = ""; // 清空輸入欄位
                return false;
            }
            
            var numberPart = cIdValue.substring(2);
            if (isNaN(numberPart)) {
                alert("dnnl_ID的後面必須是數字！");
                cIdInput.value = ""; // 清空輸入欄位
                return false;
            }
            
            return true;
        }
    </script>
<?php
// 檢查使用者的身份
if ($_SESSION['user_type'] === 'admin' || $_SESSION['user_type'] === 'teacher') {
    // 只有Admin和teacher可以看到以下代碼
    echo '
<form method="POST" action="upconfig_dnnl.php" enctype="multipart/form-data" onsubmit="return checkInput()">
  <label for="dnnl_ID">dnnl_ID:</label>
  <input type="text" id="dnnl_ID" name="dnnl_ID" placeholder="格式:dnnl000-dnnl999" required>
  <input type="hidden" name="imagestring" id="imagestring">
  <input accept="image/*" id="dnnl_Photo" type="file">
  <label for="dnnl_Subject">dnnl_Subject:</label>
  <input type="text" id="dnnl_Subject" name="dnnl_Subject">
  <label for="dnnl_Answer">dnnl_Answer:</label>
  <input type="text" id="dnnl_Answer" name="dnnl_Answer">
  <input type="submit" name="upload" id="submit">
</form>';
}
?>


<link rel="stylesheet" href=".\.\Mstyle2.css">

<?php
// 題目
$sql = "SELECT * FROM `dnnl`";
$stmt = $conn->query($sql);

// 顯示題目和答案
if ($stmt->rowCount() > 0) {
    $count = 0; // 計數器，用於追蹤每行的 `dnnl_ID` 數量
    echo "<div class='container'>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if ($count % 2 == 0) {
            echo "<div class='row'>";
        }
        echo "<div class='col'>";
        echo "<ul>";
        echo "<li id='" . $row['dnnl_ID'] . "' value='1'>" . "<img src='data:image/jpeg;base64," . base64_encode($row['dnnl_Photo']) . "' width='300' height='300' /></li>";
        echo "<li id='" . $row['dnnl_ID'] . "' value='2'>" . $row["dnnl_Subject"] . "</li>";
        echo "<li id='" . $row['dnnl_ID'] . "' value='3'>" . $row["dnnl_Answer"] . "</li>";
        echo "</ul>";
        echo "</div>";
        if ($count % 2 != 0 || $count == $stmt->rowCount() - 1) {
            echo "</div>";
        }
        $count++;
    }
    echo "</div>";
}
// 關閉連接
$conn = null;
?>
