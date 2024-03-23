// 记录前五个算式加答案等于的数组
var savedResults = [];

// 計算click次數 且初始顯示0
var isClick = 0;
// 將算式暫存為結果做準備
var everyClick = "";
// 按鍵的功能
function add(clickNum) {
    // 如果是第一次按按鍵則清空原本的0
    if (isClick == 0) {
        document.getElementById("inputExpression").value = '';
    }
    // click次數累加
    isClick++;
    // 如果按鍵class是數字 則顯示於結果列
    var btn = clickNum.getAttribute("class");
    if (btn == "number_0" || btn == "number") {
        document.getElementById("inputExpression").value += clickNum.value;
    }
    // 計算符號除了％外 輸入時要抓畫面的數值與計算符號 一起記錄到everyclick 且畫面清空
    if (btn == "formula" && clickNum.value != "%") {
        everyClick = everyClick + document.getElementById("inputExpression").value + clickNum.value;
        document.getElementById("inputExpression").value = "";
    }
    // 輸入％時 將畫面數字/100
    if (clickNum.value == "%") {
        document.getElementById("inputExpression").value = Math.round(document.getElementById("inputExpression").value) / 100;
    }
}

// 點選等於的輸入計算結果 eval計算everyclick中的資料
function eva() {
    everyClick = everyClick + document.getElementById("inputExpression").value;
    var result = eval(everyClick);
    // 更新显示结果
    document.getElementById("inputExpression").value = result;
    // 保存计算结果
    if (savedResults.length < 5) {
        savedResults.push(everyClick + " = " + result);
    } else {
        savedResults.shift(); // 删除最早的记录
        savedResults.push(everyClick + " = " + result);
    }
    // 更新记录列表
    updateSavedResults();
    isClick = 0;
    everyClick = "";
}

// 更新记录列表
function updateSavedResults() {
    var savedList = document.getElementById("savedList");
    savedList.innerHTML = ""; // 清空列表
    savedResults.forEach(function (item) {
        var li = document.createElement("li");
        li.appendChild(document.createTextNode(item));
        savedList.appendChild(li);
    });
}

// 點選AC清除
// 點選AC清除輸入框 且將everyclick清空計算
function clearNum() {
    document.getElementById("inputExpression").value = "";
    everyClick = "";
}

// 初始化页面时更新记录列表
updateSavedResults();
