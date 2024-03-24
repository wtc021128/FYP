<?php
require('connection.php');
?>

<?php
include_once 'adminpage01.php';
?>

<script>
        function checkInput() {
            var cIdInput = document.getElementById("q_ID");
            var cIdValue = cIdInput.value;
            
            if (!cIdValue.startsWith("qq")) {
                alert("q_ID必須以qq開頭！");
                cIdInput.value = ""; // 清空輸入欄位
                return false;
            }
            
            var numberPart = cIdValue.substring(2);
            if (isNaN(numberPart)) {
                alert("q_ID的後面必須是數字！");
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
<form method="POST" action="upconfig_q.php" enctype="multipart/form-data" onsubmit="return checkInput()">
  <label for="q_ID">q_ID:</label>
  <input type="text" id="q_ID" name="q_ID" placeholder="格式:qq000-qq999" required>
  <input type="hidden" name="imagestring" id="imagestring">
  <input accept="image/*" id="q_Photo" type="file">
  <label for="q_Subject">q_Subject:</label>
  <input type="text" id="q_Subject" name="q_Subject">
  <label for="q_Answer">q_Answer:</label>
  <input type="text" id="q_Answer" name="q_Answer">
  <input type="submit" name="upload" id="submit">
</form>';
}
?>


<link rel="stylesheet" href=".\.\Mstyle2.css">

<?php
// 題目
$sql = "SELECT * FROM `quadrilateral`";
$stmt = $conn->query($sql);

// 顯示題目和答案
if ($stmt->rowCount() > 0) {
    $count = 0; // 計數器，用於追蹤每行的 `q_ID` 數量
    echo "<div class='container'>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if ($count % 2 == 0) {
            echo "<div class='row'>";
        }
        echo "<div class='col'>";
        echo "<ul>";
        echo "<li id='" . $row['q_ID'] . "' value='1'>" . "<img src='data:image/jpeg;base64," . base64_encode($row['q_Photo']) . "' width='300' height='300' /></li>";
        echo "<li id='" . $row['q_ID'] . "' value='2'>" . $row["q_Subject"] . "</li>";
        echo "<li id='" . $row['q_ID'] . "' value='3'>" . $row["q_Answer"] . "</li>";
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
