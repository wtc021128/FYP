<?php
require('connection.php');
?>

<?php
include_once 'adminpage01.php';
?>

<script>
        function checkInput() {
            var cIdInput = document.getElementById("f_ID");
            var cIdValue = cIdInput.value;
            
            if (!cIdValue.startsWith("ff")) {
                alert("f_ID必須以ff開頭！");
                cIdInput.value = ""; // 清空輸入欄位
                return false;
            }
            
            var numberPart = cIdValue.substring(2);
            if (isNaN(numberPart)) {
                alert("f_ID的後面必須是數字！");
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
<form method="POST" action="upconfig_f.php" enctype="multipart/form-data" onsubmit="return checkInput()">
  <label for="f_ID">f_ID:</label>
  <input type="text" id="f_ID" name="f_ID" placeholder="格式:ff000-ff999" required>
  <input type="hidden" name="imagestring" id="imagestring">
  <input accept="image/*" id="f_Photo" type="file">
  <label for="f_Subject">f_Subject:</label>
  <input type="text" id="f_Subject" name="f_Subject">
  <label for="f_Answer">f_Answer:</label>
  <input type="text" id="f_Answer" name="f_Answer">
  <input type="submit" name="upload" id="submit">
</form>';
}
?>


<link rel="stylesheet" href=".\.\Mstyle2.css">

<?php
// 題目
$sql = "SELECT * FROM `formula`";
$stmt = $conn->query($sql);

// 顯示題目和答案
if ($stmt->rowCount() > 0) {
    $count = 0; // 計數器，用於追蹤每行的 `f_ID` 數量
    echo "<div class='container'>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if ($count % 2 == 0) {
            echo "<div class='row'>";
        }
        echo "<div class='col'>";
        echo "<ul>";
        echo "<li id='" . $row['f_ID'] . "' value='1'>" . "<img src='data:image/jpeg;base64," . base64_encode($row['f_Photo']) . "' width='300' height='300' /></li>";
        echo "<li id='" . $row['f_ID'] . "' value='2'>" . $row["f_Subject"] . "</li>";
        echo "<li id='" . $row['f_ID'] . "' value='3'>" . $row["f_Answer"] . "</li>";
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
