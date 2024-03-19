<?php
require('connection.php');
?>

<?php
include_once 'adminpage01.php';
?>


<script>
        function checkInput() {
            var cIdInput = document.getElementById("QE_ID");
            var cIdValue = cIdInput.value;
            
            if (!cIdValue.startsWith("QE")) {
                alert("QE_ID必須以CC開頭！");
                cIdInput.value = ""; // 清空輸入欄位
                return false;
            }
            
            var numberPart = cIdValue.substring(2);
            if (isNaN(numberPart)) {
                alert("QE_ID的後面必須是數字！");
                cIdInput.value = ""; // 清空輸入欄位
                return false;
            }
            
            return true;
        }
    </script>

<form method="POST" action="upconfig_qe.php" enctype="multipart/form-data" onsubmit="return checkInput()">
  <label for="QE_ID">QE_ID:</label>
  <input type="text" id="QE_ID" name="QE_ID" placeholder="格式:QE000-QE999" required>
  <input type="hidden" name="imagestring" id="imagestring">
  <input accept="image/*" id="QE_Photo" type="file">
  <label for="QE_Subject">QE_Subject:</label>
  <input type="text" id="QE_Subject" name="QE_Subject">
  <label for="QE_Answer">QE_Answer:</label>
  <input type="text" id="QE_Answer" name="QE_Answer">
  <input type="submit" name="upload" id="submit">
</form>



<link rel="stylesheet" href=".\.\Mstyle2.css">

<?php
// 題目
$sql = "SELECT * FROM `quadratic_equation`";
$stmt = $conn->query($sql);

// 顯示題目和答案
if ($stmt->rowCount() > 0) {
    $count = 0; // 計數器，用於追蹤每行的 `C_ID` 數量
    echo "<div class='quadratic_equation'>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if ($count % 2 == 0) {
            echo "<div class='row'>";
        }
        echo "<div class='col'>";
        echo "<ul>";
        echo "<li id='" . $row['QE_ID'] . "' value='1'>" . "<img src='data:image/jpeg;base64," . base64_encode($row['QE_Photo']) . "' width='300' height='300' /></li>";
        echo "<li id='" . $row['QE_ID'] . "' value='2'>" . $row["QE_Subject"] . "</li>";
        echo "<li id='" . $row['QE_ID'] . "' value='3'>" . $row["QE_Answer"] . "</li>";
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
