<?php
require('connection.php');
?>

<?php
include_once 'userpage.php';
?>


<B><span style="font-size: 30px;">請選擇需要的標題</span></B>
<B style="display: block;text-align:center;"> 會提供題目和答案</B>


<link rel="stylesheet" href=".\.\style2a.css">

<div class="bruce flex-ct-x">
	<div class="accordion">
		<input type="checkbox" id="collapse1">
		<input type="checkbox" id="collapse2">
		<input type="checkbox" id="collapse3">
		<article>
			<label for="collapse1" class="label-arrow">微積分</label>
			<p><B>微積分學於代數學和幾何學的基礎上建立，其中微分是指函數的局部變化率的一種線性描述，包括求導數和其運算，即一套關於變化率的理論。
  </B><br><img src="m1.png"><br>答案:13<br><br><a href="calculus.php" style="display: block;text-align:right;">More</a></br></p>
		</article>
		<article>
			<label for="collapse2">一元二次</label>
			<p><B>在方程式的兩邊同時乘以二次項未知數的係數的四倍；在方程式的兩邊同時加上一次項未知數的係數的平方；然後在方程式的兩邊同時開二次方根。
  </B><br><img src="m2.png"><br>答案:1<br><a href="quadratic_equation.php" style="display: block;text-align:right;">More</a></br></p>
		</article>
		<article>
			<label for="collapse3">加減乘除</label>
			<p><B>...
  </B><br><img src=""><br>答案:<br><a href=".php" style="display: block;text-align:right;">More</a></br></p>
		</article>
	</div>
</div>





