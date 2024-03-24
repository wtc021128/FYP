<?php
include_once 'adminpage01.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OCR using Javascript and appscript</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .ocr {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            margin-top: 50px;
        }
        .ocr * {
            margin-top: 10px;
        }
        h1, h2, span {
            color: #333;
        }
        input[type="file"] {
            padding: 10px;
            border: 2px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            color: #333;
            font-size: 16px;
            outline: none;
            cursor: pointer;
        }
        .btn {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            outline: none;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .text {
            width: 80%;
            height: 150px;
            padding: 10px;
            border: 2px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            color: #333;
            font-size: 16px;
            resize: none;
        }
    </style>
</head>
<body>
    <div class="ocr">
        <h1 style="color:#007bff;">OCR image and pdf to text</h1>
        <h2 class="message"></h2>
        <span>Select a File jpg,png,pdf~ Wait for a minute Loading</span>
        <input type="file" class="file">
        <button class="btn">Perform OCR</button>
        <span>Result Text</span>
        <textarea class="text"></textarea>
    </div>
    

    <script>
        //carlos google apps script 
        let api = " https://script.google.com/macros/s/AKfycbwIgUDWJy5x2Lc8ypUzX2WbHCtBFsOtutdVVaT76kUM2yf-_qj-oTJCKPoJeaiHHMZu/exec ";
        let msg = document.querySelector(".message");
        let file = document.querySelector(".file");
        let btn = document.querySelector(".btn");
        let text = document.querySelector(".text");
        btn.addEventListener('click',()=>{
            msg.innerHTML=`Loading..`;
            let fr = new FileReader();
            fr.readAsDataURL(file.files[0])
            fr.onload=()=>{
                let res = fr.result;
                let b64 = res.split("base64,")[1];
                fetch(api,{
                    method:"POST",
                    body:JSON.stringify({
                        file:b64,
                        type:file.files[0].type,
                        name:file.files[0].name
                    })
                })
                  .then(res => res.text())
                  .then(data => {
                    text.innerHTML=data;
                    msg.innerHTML=``;
                  });
            }
        })
    </script>
</body>
</html>
