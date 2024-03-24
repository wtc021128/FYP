<?php
require('connection.php');
?>

<?php
include_once 'adminpage01.php';
?>

<script>
        function checkInput() {
            var cIdInput = document.getElementById("itp_ID");
            var cIdValue = cIdInput.value;
            
            if (!cIdValue.startsWith("itp")) {
                alert("itp_ID必須以itp開頭！");
                cIdInput.value = ""; // 清空輸入欄位
                return false;
            }
            
            var numberPart = cIdValue.substring(2);
            if (isNaN(numberPart)) {
                alert("itp_ID的後面必須是數字！");
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
<form method="POST" action="upconfig_itp.php" enctype="multipart/form-data" onsubmit="return checkInput()">
  <label for="itp_ID">itp_ID:</label>
  <input type="text" id="itp_ID" name="itp_ID" placeholder="格式:itp000-itp999" required>
  <input type="hidden" name="imagestring" id="imagestring">
  <input accept="image/*" id="itp_Photo" type="file">
  <label for="itp_Subject">itp_Subject:</label>
  <input type="text" id="itp_Subject" name="itp_Subject">
  <label for="itp_Answer">itp_Answer:</label>
  <input type="text" id="itp_Answer" name="itp_Answer">
  <input type="submit" name="upload" id="submit">
</form>';
}
?>


<link rel="stylesheet" href=".\.\Mstyle2.css">

<?php
// 題目
$sql = "SELECT * FROM `itp`";
$stmt = $conn->query($sql);

// 顯示題目和答案
if ($stmt->rowCount() > 0) {
    $count = 0; // 計數器，用於追蹤每行的 `itp_ID` 數量
    echo "<div class='container'>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if ($count % 2 == 0) {
            echo "<div class='row'>";
        }
        echo "<div class='col'>";
        echo "<ul>";
        echo "<li id='" . $row['itp_ID'] . "' value='1'>" . "<img src='data:image/jpeg;base64," . base64_encode($row['itp_Photo']) . "' width='300' height='300' /></li>";
        echo "<li id='" . $row['itp_ID'] . "' value='2'>" . $row["itp_Subject"] . "</li>";
        echo "<li id='" . $row['itp_ID'] . "' value='3'>" . $row["itp_Answer"] . "</li>";
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
