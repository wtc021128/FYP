<?php
require('connection.php');
?>

<?php
include_once 'adminpage01.php';
?>

<script>
        function checkInput() {
            var cIdInput = document.getElementById("3DF_ID");
            var cIdValue = cIdInput.value;
            
            if (!cIdValue.startsWith("3DF")) {
                alert("3DF_ID必須以3DF開頭！");
                cIdInput.value = ""; // 清空輸入欄位
                return false;
            }
            
            var numberPart = cIdValue.substring(2);
            if (isNaN(numberPart)) {
                alert("3DF_ID的後面必須是數字！");
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
    <form method="POST" action="upconfig_3df.php" enctype="multipart/form-data" onsubmit="return checkInput()">
      <label for="3DF_ID">3DF_ID:</label>
      <input type="text" id="3DF_ID" name="3DF_ID" placeholder="格式:3DF000-3DF999" required>
      <input type="hidden" name="imagestring" id="imagestring">
      <input accept="image/*" id="3DF_Photo" type="file">
      <label for="3DF_Subject">3DF_Subject:</label>
      <input type="text" id="3DF_Subject" name="3DF_Subject">
      <label for="3DF_Answer">3DF_Answer:</label>
      <input type="text" id="3DF_Answer" name="3DF_Answer">
      <input type="submit" name="upload" id="submit">
    </form>';
}
?>


<link rel="stylesheet" href=".\.\Mstyle2.css">

<?php
// 題目
$sql = "SELECT * FROM `3df`";
$stmt = $conn->query($sql);

// 顯示題目和答案
if ($stmt->rowCount() > 0) {
    $count = 0; // 計數器，用於追蹤每行的 `3DF_ID` 數量
    echo "<div class='container'>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if ($count % 2 == 0) {
            echo "<div class='row'>";
        }
        echo "<div class='col'>";
        echo "<ul>";
        echo "<li id='" . $row['3DF_ID'] . "' value='1'>" . "<img src='data:image/jpeg;base64," . base64_encode($row['3DF_Photo']) . "' width='300' height='300' /></li>";
        echo "<li id='" . $row['3DF_ID'] . "' value='2'>" . $row["3DF_Subject"] . "</li>";
        echo "<li id='" . $row['3DF_ID'] . "' value='3'>" . $row["3DF_Answer"] . "</li>";
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
