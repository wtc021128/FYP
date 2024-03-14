<?php
require('connection.php');
?>

<?php
include_once 'adminpage01.php';
?>

<script>
        function checkInput() {
            var cIdInput = document.getElementById("dg_ID");
            var cIdValue = cIdInput.value;
            
            if (!cIdValue.startsWith("dg")) {
                alert("dg_ID必須以dg開頭！");
                cIdInput.value = ""; // 清空輸入欄位
                return false;
            }
            
            var numberPart = cIdValue.substring(2);
            if (isNaN(numberPart)) {
                alert("dg_ID的後面必須是數字！");
                cIdInput.value = ""; // 清空輸入欄位
                return false;
            }
            
            return true;
        }
    </script>

<form method="POST" action="c_upload.php" enctype="multipart/form-data" onsubmit="return checkInput()">
  <label for="dg_ID">dg_ID:</label>
  <input type="text" id="dg_ID" name="dg_ID" placeholder="格式:dg000-dg999" required>
  <input type="hidden" name="imagestring" id="imagestring">
  <input accept="image/*" id="dg_Photo" type="file">
  <label for="dg_Subject">dg_Subject:</label>
  <input type="text" id="dg_Subject" name="dg_Subject">
  <label for="dg_Answer">dg_Answer:</label>
  <input type="text" id="dg_Answer" name="dg_Answer">
  <input type="submit" name="upload" id="submit">
</form>


<link rel="stylesheet" href=".\.\Mstyle2.css">

<?php
// 題目
$sql = "SELECT * FROM `calculus`";
$stmt = $conn->query($sql);

// 顯示題目和答案
if ($stmt->rowCount() > 0) {
    $count = 0; // 計數器，用於追蹤每行的 `dg_ID` 數量
    echo "<div class='container'>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if ($count % 2 == 0) {
            echo "<div class='row'>";
        }
        echo "<div class='col'>";
        echo "<ul>";
        echo "<li id='" . $row['dg_ID'] . "' value='1'>" . "<img src='data:image/jpeg;base64," . base64_encode($row['dg_Photo']) . "' width='300' height='300' /></li>";
        echo "<li id='" . $row['dg_ID'] . "' value='2'>" . $row["dg_Subject"] . "</li>";
        echo "<li id='" . $row['dg_ID'] . "' value='3'>" . $row["dg_Answer"] . "</li>";
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
