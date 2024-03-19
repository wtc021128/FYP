<?php
require('connection.php');
?>

<?php
include_once 'adminpage01.php';
?>


  <table border="0" align="center">
    <tr>
        <td width="2000" height="50" align="center">
        </td>
    </tr>
</table>

  <script>
    function interface(interface_name)
    {
      get_interface=document.getElementById(interface_name);
      if(get_interface.style.display=="flex")
      {
        get_interface.style.display="none";
      }
      else
      {
        get_interface.style.display="flex";
      }
    }
  </script>

<?php
// 建立資料庫連線
$conn = mysqli_connect("127.0.0.1", "root", "", "e02_db");
mysqli_set_charset($conn, "utf8");
if (mysqli_connect_errno()) {
  echo mysqli_connect_error();
}

// 接收前端傳來的 DataURL 字串
$imagestring = trim($_POST["imagestring"]);

// 解析 DataURL
$token = explode(',', $imagestring);
// 取出圖片的資料並將 base64 還原成二進位格式
$image = base64_decode($token[0]); // 修改索引為 1，因為 DataURL 格式為 "data:image/png;base64,..."

$id = $_POST["iaf_ID"]; // 獲取使用者輸入的 iaf_ID 值
$subject = $_POST["iaf_Subject"]; // 獲取使用者輸入的 iaf_Subject 值
$answer = $_POST["iaf_Answer"]; // 獲取使用者輸入的 iaf_Answer 值

// 將 Blob 和文字資料一起插入 MySQL
$sql = 'INSERT INTO calculus (iaf_Photo, iaf_ID, iaf_Subject, iaf_Answer) VALUES (?, ?, ?, ?)';
$stmt = mysqli_prepare($conn, $sql);
$stmt->bind_param('ssss', $image, $id, $subject, $answer);
$success = $stmt->execute();
if ($success) {
  echo "上傳成功.";
} else {
  echo "上傳失敗：" . mysqli_error($conn);
}
$stmt->close();

mysqli_close($conn);
?>

<script>
  // 當使用者選擇圖片時觸發事件
  document.getElementById("iaf_Photo").addEventListener("change", function() {
    var file = this.files[0];
    var reader = new FileReader();
    
    reader.onload = function(e) {
      var imageString = e.target.result;
      document.getElementById("imagestring").value = imageString;
      document.getElementById("show_image").src = imageString;
    };
    
    reader.readAsDataURL(file);
  });
</script>

  <script>
    function goBack() {
      window.history.back();
    }
  </script>
 <P><button onclick="goBack()">返回上一頁</button>

</html>