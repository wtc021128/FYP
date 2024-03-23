<?php
require('connection.php');
?>

<?php
include_once 'adminpage01.php';
?>

<script>
        function checkInput() {
            var cIdInput = document.getElementById("pt_ID");
            var cIdValue = cIdInput.value;
            
            if (!cIdValue.startsWith("pt")) {
                alert("pt_ID必須以pt開頭！");
                cIdInput.value = ""; // 清空輸入欄位
                return false;
            }
            
            var numberPart = cIdValue.substring(2);
            if (isNaN(numberPart)) {
                alert("pt_ID的後面必須是數字！");
                cIdInput.value = ""; // 清空輸入欄位
                return false;
            }
            
            return true;
        }
    </script>

<form method="POST" action="upconfig_pt.php" enctype="multipart/form-data" onsubmit="return checkInput()">
  <label for="pt_ID">pt_ID:</label>
  <input type="text" id="pt_ID" name="pt_ID" placeholder="格式:pt000-pt999" required>
  <input type="hidden" name="imagestring" id="imagestring">
  <input accept="image/*" id="pt_Photo" type="file">
  <label for="pt_Subject">pt_Subject:</label>
  <input type="text" id="pt_Subject" name="pt_Subject">
  <label for="pt_Answer">pt_Answer:</label>
  <input type="text" id="pt_Answer" name="pt_Answer">
  <input type="submit" name="upload" id="submit">
</form>


<link rel="stylesheet" href=".\.\Mstyle2.css">

<?php
// 題目
$sql = "SELECT * FROM `calculus`";
$stmt = $conn->query($sql);

// 顯示題目和答案
if ($stmt->rowCount() > 0) {
    $count = 0; // 計數器，用於追蹤每行的 `pt_ID` 數量
    echo "<div class='container'>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if ($count % 2 == 0) {
            echo "<div class='row'>";
        }
        echo "<div class='col'>";
        echo "<ul>";
        echo "<li id='" . $row['pt_ID'] . "' value='1'>" . "<img src='data:image/jpeg;base64," . base64_encode($row['pt_Photo']) . "' width='300' height='300' /></li>";
        echo "<li id='" . $row['pt_ID'] . "' value='2'>" . $row["pt_Subject"] . "</li>";
        echo "<li id='" . $row['pt_ID'] . "' value='3'>" . $row["pt_Answer"] . "</li>";
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
