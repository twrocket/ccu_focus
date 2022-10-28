<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CCU FOCUS SIGN IN PAGE</title>
    <link rel="shortcut icon" href="cat.ico" type="image/x-icon">
    <link rel="stylesheet" href="test2.css">
    <!-- response website -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
    <div class="title-font">
        #CCU FOCUS <div class="title-font2">SIGN IN</div> PAGE#
    </div>
    <div class="title-font-ch">#CCU FOCUS <div class="title-font-ch2">登入</div>頁面#</div>
    <br><br>
    <form method="POST" action="">
		    <div class="saying">學生學號: <input type="text" name="student_id" value=""></div><br>
        <div class="saying">學生密碼: <input type="password" name="student_pwd" value=""></div><br>
        <div class="warn">*SIGN UP BEFORE SIGN IN (登入前請先註冊)*</div>
        <br><br>
        
		<input type="submit" value="SUBMIT">
        <a href="start.html" title="RETURN" class="sign1">RETURN</a>
	</form>
    <br>
    
	<br>
</body>
</html>
<?php
    require_once ('SQL_connection.php');
?>
<?php
    $id_check=0;
    $pass_check='';
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $student_pwd = $_POST["student_pwd"];
        $student_id = $_POST["student_id"];
        
       
      //   if (isset($users[$username]) && $users[$username] === $password){
      // // Add your code here:
      //    header("Location: https://www.facebook.com/");
      //     exit;
          
      //   } else {
      //     $validation_error = "* Incorrect username or password.";
      //   }
        if($student_pwd==''||$student_id==''){
          echo "<div class=\"error\">(請填寫所有欄位)</div>";
          exit;
        }else{
          $sqlQuery = sprintf("SELECT `student_id`,`student_password` FROM `student_info`;");
          if ($result = $connection->query($sqlQuery)) {
            # 取得結果
            while ($row = $result->fetch_row()) {
              if($row[0]==$student_id){
                $pass_check=$row[1];
                $id_check=1;
                break;
              }
            }
            $result->close();
          } else {
            echo "執行失敗：" . $connection->error;
          }
        }
        if($id_check){
          if($student_pwd==$pass_check){
            echo"<script language=\"javascript\">alert('登入成功!');location.href=\"main.php\";</script>";
          }else{
            echo "<div class=\"error\">(密碼錯誤 登入失敗)</div>";
          }
        }else{
          echo "<div class=\"error\">(找不到學生學號 登入前請先註冊)</div>";
        }
      }
      
      $connection->close(); 
?>