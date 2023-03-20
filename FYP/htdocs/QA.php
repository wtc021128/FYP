<script>
  function print_result() {
 
    var name = document.f1.name.value;
    alert("Name = " + name);
 
    var gender;
    if (document.f1.gender[0].checked)
      gender = document.f1.gender[0].value;
    else
      gender = document.f1.gender[1].value;
    alert("Gender = " + gender);
 
    var age;
    if (document.f1.age[0].checked)
     age = document.f1.age[0].value;
    else
      age = document.f1.age[1].value;
    alert("Age = " + age);
 
    var PN = "";
    alert("Phone number = " + PN)
 
    var index = document.f1.District.selectedIndex;
    var District_val = document.f1.District.options[index].value;
    var District_text = document.f1.District.options[index].text;
    alert("District = " + District_text + " " + District_val);
 
    var email = document.f1.email.value;
    alert("Email = " + email);
  }
</script>
</head>
 
<body>
    <div id="flex-container">
        <!--page button-->
       
        <div id=r2><td align="center"><font color="#e6c35c" size="6">DSE Math </div>
        <div id=r3 align="center" style="word-spacing: 30px;"><a href="index.php">Home</a>
          <a href="QA.php">Paper 1</a>
          <a href="MC.php">Paper 2 MC</a>
          <a href="login.php">Login</a></td></font></div>
          <div id=r4 ></a>
          </div>
        </td>
    </div>
        <!--make from and submit-->
  <form name="f1" onSubmit="print_result()">
    <table border="5" align="center">
      <tr>
        <td>Name</td>
        <td>
          <input type="text" name="name" pattern="^[A-Z][a-z]*$"
                 title="Capital first character"
                 required="required" />
        </td>
      </tr>
      <tr>
        <td>Gender</td>
        <td>
          <input type="radio" name="gender" value="M"
                 required="required" />Male
          <input type="radio" name="gender" value="F" />Female
        </td>  
      </tr>
      <tr>
        <td>Age</td>
        <td>
          <input type="radio" name="age" value="≤18" required="required"/>
            ≤18
          <input type="radio" name="age" value="18-29" />
            19-29
          <input type="radio" name="age" value="≥30" />
            ≥ 30
        </td>
      </tr>
      <tr>
        <td>Phone Number</td>
        <td>
            <input type="text" name="PN" pattern="^[8][5][2][-][0-9]{8}$"
            title="Please enter 852-XXXXXXXX"
            required="required" />
        </td>  
      </tr>
      <tr>
        <td>District</td>
        <td>
          <select name="District">
            <option value="CW">Central and Western</option>
            <option value="EA">Eastern</option>
            <option value="SO">Southern</option>
            <option value="WC">Wan Chai</option>
            <option value="KC">Kowloon City</option>
            <option value="KT">Kwun Tong</option>
            <option value="SSP">Sham Shui Po</option>
            <option value="WTS">Wong Tai Sin</option>
            <option value="YTM">Yau Tsim Mong</option>
            <option value="IS">Islands</option>
            <option value="KTS">Kwai Tsing</option>
            <option value="NO">North</option>
            <option value="SK">Sai Kung</option>
            <option value="ST">Sha Tin</option>
            <option value="TP">Tai Po</option>
            <option value="TW">Tsuen Wan</option>
            <option value="TM">Tuen Mun</option>
            <option value="YL">Yuen Long</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>Email</td>
        <td>
          <input type="email" name="Email"
                 title="email"
                 required="required" />
        </td>
      </tr>
      <tr>
        <td>
            <input type="checkbox" required="required" />
            <label>* I agree to terms of service.</label>
        </td>
      </tr>
    </table>
    <table border="0" align="center">
        <tr>
            <td>
            <input type="submit" value="Submit" />
            </td>
        </tr>
    </table>
  </form>
</body>