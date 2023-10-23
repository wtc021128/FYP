<?php 
  require('connection.php'); 
  session_start();  

// 檢查答案
$sql = "SELECT * FROM question";
$result = $conn->query($sql);

$score = 0;

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $questionId = $row['ID'];
        $userAnswer = $_POST['answer' . $questionId];
        $correctAnswer = $row['correct_answer'];
        
        if ($userAnswer == $correctAnswer) {
            $score++;
        }
    }
}

// 顯示得分
echo "你的得分是：" . $score . "/" . $result->num_rows;

// 關閉連接
$conn->close();
?>