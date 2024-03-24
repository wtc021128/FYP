<?php
require('connection.php');
?>

<?php
include_once 'adminpage01.php';
?>

<script>
        function checkInput() {
            var cIdInput = document.getElementById("itc_ID");
            var cIdValue = cIdInput.value;
            
            if (!cIdValue.startsWith("itc")) {
                alert("itc_ID必須以itc開頭！");
                cIdInput.value = ""; // 清空輸入欄位
                return false;
            }
            
            var numberPart = cIdValue.substring(2);
            if (isNaN(numberPart)) {
                alert("itc_ID的後面必須是數字！");
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
<form method="POST" action="upconfig_itc.php" enctype="multipart/form-data" onsubmit="return checkInput()">
  <label for="itc_ID">itc_ID:</label>
  <input type="text" id="itc_ID" name="itc_ID" placeholder="格式:itc000-itc999" required>
  <input type="hidden" name="imagestring" id="imagestring">
  <input accept="image/*" id="itc_Photo" type="file">
  <label for="itc_Subject">itc_Subject:</label>
  <input type="text" id="itc_Subject" name="itc_Subject">
  <label for="itc_Answer">itc_Answer:</label>
  <input type="text" id="itc_Answer" name="itc_Answer">
  <input type="submit" name="upload" id="submit">
</form>';
}
?>


<link rel="stylesheet" href=".\.\Mstyle2.css">

<?php
// 題目
$sql = "SELECT * FROM `itc`";
$stmt = $conn->query($sql);

// 顯示題目和答案
if ($stmt->rowCount() > 0) {
    $count = 0; // 計數器，用於追蹤每行的 `itc_ID` 數量
    echo "<div class='container'>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if ($count % 2 == 0) {
            echo "<div class='row'>";
        }
        echo "<div class='col'>";
        echo "<ul>";
        echo "<li id='" . $row['itc_ID'] . "' value='1'>" . "<img src='data:image/jpeg;base64," . base64_encode($row['itc_Photo']) . "' width='300' height='300' /></li>";
        echo "<li id='" . $row['itc_ID'] . "' value='2'>" . $row["itc_Subject"] . "</li>";
        echo "<li id='" . $row['itc_ID'] . "' value='3'>" . $row["itc_Answer"] . "</li>";
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
