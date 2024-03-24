<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>考試倒計時</title>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.countdown-container {
    margin-bottom: 20px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.countdown-title {
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 10px;
}

.countdown {
    font-size: 18px;
}

</style>
</head>
<body>

<div class="container">
    <div id="dseCountdown" class="countdown-container">
        <div class="countdown-title">DSE 開始倒計時</div>
        <div class="countdown"></div>
    </div>
    <div id="mathModule1Countdown" class="countdown-container">
        <div class="countdown-title">數學必修部分 1,2 倒計時</div>
        <div class="countdown"></div>
    </div>
    <div id="mathModule2Countdown" class="countdown-container">
        <div class="countdown-title">數學擴展部分模組 1,2 倒計時</div>
        <div class="countdown"></div>
    </div>
</div>

<script>
function setupCountdown(examDate, elementId, examName) {
    var examTime = new Date(examDate).getTime();
    
    function updateCountdown() {
        var now = new Date().getTime();
        var timeLeft = examTime - now;
        var days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
        var hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

        var countdownElement = document.getElementById(elementId).getElementsByClassName('countdown')[0];
        countdownElement.innerHTML = days + " 天 " + hours + " 小時 " + minutes + " 分鐘 " + seconds + " 秒 ";

        if (timeLeft < 0) {
            clearInterval(countdownInterval);
            countdownElement.innerHTML = examName + " 考試時間到！";
        }
    }
    
    var countdownInterval = setInterval(updateCountdown, 1000);
    updateCountdown();
}

// Set up countdowns
setupCountdown("2024-04-09T09:00:00", "dseCountdown", "DSE 開始");
setupCountdown("2024-04-15T09:00:00", "mathModule1Countdown", "數學必修部分 1,2");
setupCountdown("2024-04-20T09:00:00", "mathModule2Countdown", "數學擴展部分模組 1,2");
</script>

</body>
</html>
