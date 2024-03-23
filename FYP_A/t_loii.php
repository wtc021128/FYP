<?php
require('connection.php');
?>

<?php
include_once 'adminpage01.php';
?>

<script>
        function checkInput() {
            var cIdInput = document.getElementById("loii_ID");
            var cIdValue = cIdInput.value;
            
            if (!cIdValue.startsWith("loii")) {
                alert("loii_ID必須以loii開頭！");
                cIdInput.value = ""; // 清空輸入欄位
                return false;
            }
            
            var numberPart = cIdValue.substring(2);
            if (isNaN(numberPart)) {
                alert("loii_ID的後面必須是數字！");
                cIdInput.value = ""; // 清空輸入欄位
                return false;
            }
            
            return true;
        }
    </script>

<form method="POST" action="upconfig_loii.php" enctype="multipart/form-data" onsubmit="return checkInput()">
  <label for="loii_ID">loii_ID:</label>
  <input type="text" id="loii_ID" name="loii_ID" placeholder="格式:loii000-loii999" required>
  <input type="hidden" name="imagestring" id="imagestring">
  <input accept="image/*" id="loii_Photo" type="file">
  <label for="loii_Subject">loii_Subject:</label>
  <input type="text" id="loii_Subject" name="loii_Subject">
  <label for="loii_Answer">loii_Answer:</label>
  <input type="text" id="loii_Answer" name="loii_Answer">
  <input type="submit" name="upload" id="submit">
</form>


<link rel="stylesheet" href=".\.\Mstyle2.css">

<?php
// 題目
$sql = "SELECT * FROM `calculus`";
$stmt = $conn->query($sql);

// 顯示題目和答案
if ($stmt->rowCount() > 0) {
    $count = 0; // 計數器，用於追蹤每行的 `loii_ID` 數量
    echo "<div class='container'>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if ($count % 2 == 0) {
            echo "<div class='row'>";
        }
        echo "<div class='col'>";
        echo "<ul>";
        echo "<li id='" . $row['loii_ID'] . "' value='1'>" . "<img src='data:image/jpeg;base64," . base64_encode($row['loii_Photo']) . "' width='300' height='300' /></li>";
        echo "<li id='" . $row['loii_ID'] . "' value='2'>" . $row["loii_Subject"] . "</li>";
        echo "<li id='" . $row['loii_ID'] . "' value='3'>" . $row["loii_Answer"] . "</li>";
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
