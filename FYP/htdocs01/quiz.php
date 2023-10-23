<?php 
  require('connection.php'); 
  session_start();  


// 獲取要出的題目數量
$numQuestions = $_POST["num_questions"];

// 隨機選取題目
$sql = "SELECT * FROM Question ORDER BY RAND() LIMIT " . $numQuestions;
$result = $conn->query($sql);

// 顯示題目和答案輸入框
if ($result->num_rows > 0) {
    echo "<form action='check_answers.php' method='POST'>";
    while ($row = $result->fetch_assoc()) {
        echo "<h2>" . $row["question"] . "</h2>";
        echo "<ul>";
        echo "<li><input type='radio' name='answer" . $row['ID'] . "' value='1'>" . $row["option1"] . "</li>";
        echo "<li><input type='radio' name='answer" . $row['ID'] . "' value='2'>" . $row["option2"] . "</li>";
        echo "<li><input type='radio' name='answer" . $row['ID'] . "' value='3'>" . $row["option3"] . "</li>";
        echo "<li><input type='radio' name='answer" . $row['ID'] . "' value='4'>" . $row["option4"] . "</li>";
        echo "</ul>";
    }   
    echo "<input type='submit' value='提交答案'>";
    echo "</form>";
} else {
    echo "沒有可用的題目";
}

// 關閉連接
$conn->close();
?>