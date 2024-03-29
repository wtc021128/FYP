<?php
require('connection.php');
?>

<?php
include_once 'adminpage01.php';
?>

<script>
        function checkInput() {
            var cIdInput = document.getElementById("cs_ID");
            var cIdValue = cIdInput.value;
            
            if (!cIdValue.startsWith("cs")) {
                alert("cs_ID必須以cs開頭！");
                cIdInput.value = ""; // 清空輸入欄位
                return false;
            }
            
            var numberPart = cIdValue.substring(2);
            if (isNaN(numberPart)) {
                alert("cs_ID的後面必須是數字！");
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
<form method="POST" action="upconfig_cs.php" enctype="multipart/form-data" onsubmit="return checkInput()">
  <label for="cs_ID">cs_ID:</label>
  <input type="text" id="cs_ID" name="cs_ID" placeholder="格式:cs000-cs999" required>
  <input type="hidden" name="imagestring" id="imagestring">
  <input accept="image/*" id="cs_Photo" type="file">
  <label for="cs_Subject">cs_Subject:</label>
  <input type="text" id="cs_Subject" name="cs_Subject">
  <label for="cs_Answer">cs_Answer:</label>
  <input type="text" id="cs_Answer" name="cs_Answer">
  <input type="submit" name="upload" id="submit">
</form>';
}
?>


<link rel="stylesheet" href=".\.\Mstyle2.css">

<?php
// 題目
$sql = "SELECT * FROM `cs`";
$stmt = $conn->query($sql);

// 顯示題目和答案
if ($stmt->rowCount() > 0) {
    $count = 0; // 計數器，用於追蹤每行的 `cs_ID` 數量
    echo "<div class='container'>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if ($count % 2 == 0) {
            echo "<div class='row'>";
        }
        echo "<div class='col'>";
        echo "<ul>";
        echo "<li id='" . $row['cs_ID'] . "' value='1'>" . "<img src='data:image/jpeg;base64," . base64_encode($row['cs_Photo']) . "' width='300' height='300' /></li>";
        echo "<li id='" . $row['cs_ID'] . "' value='2'>" . $row["cs_Subject"] . "</li>";
        echo "<li id='" . $row['cs_ID'] . "' value='3'>" . $row["cs_Answer"] . "</li>";
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
