// 檢查密碼強度的函數
function checkPasswordStrength() {
    var strengthBar = document.getElementById('password-strength');
    var strengthText = document.getElementById('password-strength-text');
    var password = document.getElementById('password').value;
    var strength = 0;
    if (password.match(/[a-zA-Z]+/)) {
        strength++;
    }
    if (password.match(/[0-9]+/)) {
        strength++;
    }
    if (password.match(/[^a-zA-Z0-9]+/)) {
        strength++;
    }
    if (password.length >= 8) {
        strength++;
    }

    switch (strength) {
        case 1:
            strengthBar.style.width = "25%";
            strengthBar.style.backgroundColor = "red";
            strengthText.textContent = "Weak";
            strengthText.style.color = "red";
            break;
        case 2:
            strengthBar.style.width = "50%";
            strengthBar.style.backgroundColor = "orange";
            strengthText.textContent = "Moderate";
            strengthText.style.color = "orange";
            break;
        case 3:
            strengthBar.style.width = "75%";
            strengthBar.style.backgroundColor = "blue";
            strengthText.textContent = "Strong";
            strengthText.style.color = "blue";
            break;
        case 4:
            strengthBar.style.width = "100%";
            strengthBar.style.backgroundColor = "green";
            strengthText.textContent = "Very Strong";
            strengthText.style.color = "green";
            break;
        default:
            strengthBar.style.width = "0";
            strengthText.textContent = "";
    }
}

// 處理文件上傳和顯示預覽的函數
function uploadFile(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        var loader = document.getElementById('file-upload-loader');
        var preview = document.getElementById('image-preview');

        loader.style.display = 'block'; // 顯示載入動畫

        reader.onload = function(e) {
            setTimeout(function() { // 模擬載入時間
                loader.style.display = 'none'; // 隱藏載入動畫
                preview.style.backgroundImage = 'url(' + e.target.result + ')'; // 顯示圖片預覽
                preview.style.backgroundSize = 'cover';
            }, 1000); // 延遲1秒顯示圖片，模擬上傳時間
        }

        reader.readAsDataURL(input.files[0]);
    }
}


// +852 and phone number validation
phoneInput.addEventListener('blur', function() {
    // 在失去焦點時，重新添加+852前綴並確保是八位數字
    let inputValue = this.value.replace(/\D/g, '');
    if (inputValue.length === 8) {
        this.value = '+852' + inputValue; //固定顯示+852開頭
    }
});

// Validate phone number on form submission
document.querySelector('form').addEventListener('submit', function(event) {
    var phoneValue = phoneInput.value.replace(/\D/g, ''); //去除非數字字符
    if (phoneValue.length !== 11) {
        event.preventDefault(); // 阻止表單提交
        phoneError.textContent = '請輸入八位數字'; //顯示錯誤訊息
    }
});

// Clear phone error message when input changes
phoneInput.addEventListener('input', function() {
    var phoneError = document.getElementById('phoneError'); // 取得錯誤訊息的元素
    phoneError.textContent = ''; // 清空錯誤訊息
});

//password match
var passwordInput = document.getElementById('password');
var confirmPasswordInput = document.getElementsByName('cpass')[0];
var passwordMatchText = document.getElementById('password-match-text');

function checkPasswordMatch() {
    var password = passwordInput.value;
    var confirmPassword = confirmPasswordInput.value;

    if (password === '') {
        passwordMatchText.textContent = ''; // 如果密碼為空，則清空訊息
    } else {
        if (password === confirmPassword) {
            passwordMatchText.textContent = 'Passwords match!';
            passwordMatchText.style.color = 'green';
        } else {
            passwordMatchText.textContent = 'Passwords do not match!';
            passwordMatchText.style.color = 'red';
        }
    }
}

passwordInput.addEventListener('input', checkPasswordMatch);
confirmPasswordInput.addEventListener('input', checkPasswordMatch);


//email cofirm

var emailInput = document.getElementById('emailInput');
var emailStatus = document.getElementById('emailStatus');
var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

emailInput.addEventListener('focus', function() {
    emailStatus.textContent = '';
});

emailInput.addEventListener('blur', function() {
    var email = emailInput.value;

    if (email === '') {
        return; //如果電子郵件為空，不進行驗證
    }

    if (emailPattern.test(email)) {
        emailStatus.textContent = '✓ Valid email';
        emailStatus.style.color = 'green';
    } else {
        emailStatus.textContent = '✗ Invalid email';
        emailStatus.style.color = 'red';
    }
});

//cna 
var cnaInput = document.getElementById('cnaInput');
var cnaError = document.getElementById('cnaError');

// Validate CNA on form submission
document.querySelector('form').addEventListener('submit', function(event) {
    var cnaValue = cnaInput.value.replace(/\D/g, ''); //去除非數字字符
    if (cnaValue.length !== 9) {
        event.preventDefault(); //阻止表單提交
        cnaError.textContent = '請輸入九位數字'; // 顯示錯誤訊息
    } else {
        cnaError.textContent = ''; // 清空錯誤訊息
    }
});

// Clear CNA error message when input changes
cnaInput.addEventListener('input', function() {
    var cnaError = document.getElementById('cnaError'); // 取得錯誤訊息的元素
    if (cnaInput.value.length !== 0 && cnaInput.value.length !== 9) {
        cnaError.textContent = '請輸入九位數字'; //顯示錯誤訊息
    } else {
        cnaError.textContent = ''; //清空錯誤訊息
    }
});

