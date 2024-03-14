<?php
require('connection.php');
?>

<?php
include_once 'adminpage01.php';
?>

<?php  
$sql = "SELECT * FROM question";
$stmt = $conn->query($sql);

$score = 0;
$totalQuestions = 0; // 初始化總題目數量
$selectedQuestions = 0; // 初始化使用者選擇的題目數量

if ($stmt->rowCount() > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $questionId = $row['ID'];
        $userAnswer = isset($_POST['answer' . $questionId]) ? $_POST['answer' . $questionId] : null;
        $correctAnswer = $row['correct_answer'];
        
        if (!empty($userAnswer)) {
            $selectedQuestions++; // 使用者選擇的題目數量加一
            
            if ($userAnswer == $correctAnswer) {
                $score++;
            }
        }
        
        $totalQuestions++; // 總題目數量加一
    }
}

// 顯示得分
echo "答對題目分數：" . $score . "/" . $selectedQuestions;

// 關閉連接
$conn = null;
?>

<p><button><a href="test.php">返回</button></a>