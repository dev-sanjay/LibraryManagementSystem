<?php
  include("session.php");

  $email = $_GET['Email'];
  $pwd   = $_GET['Password'];
  @$popup = $_GET['popup'];

  if(isset($email) && isset($pwd) )
  {
    if($email == 'sanjayucp1554@gmail.com' && $pwd == 'sanjay004'){
           
           $is_active = true;
           $_SESSION['$is_active'] = $is_active; 
    }     
    else
    {
      die("Invalid Password or Email ID!");
    }
  }

  if($popup === 1) {

    $firstName = $_POST['firstName'];
    $emaiID = $_POST['emailID'];

    $query = "UPDATE user SET fine = 0 WHERE firstname='$firstname' and email='$emailID' ";

    if(mysqli_query($db, $query))

    echo '

          <script>
          alert("Fine has been cleared successfully");
          </script>

    ';

  }
?>

<!DOCTYPE html>
<html>
 <head>
    <title>Delete Book</title>
    <link rel="icon" type="image/png" href="admin.png"/>
    <link rel="stylesheet" type="text/css" href="Admin.css"/>
    <style type="text/css">
       .textbox {
         font-size:10pt;
         height:20px;
         padding: 3px 10px;
         border-width:2px;
         border-color:red;
         border-radius:5px;
         box-shadow:3px 3px 1px #A52A2A;
       }
       form {
         font-size:12pt;
         color:#8B008B;   
       } 
    </style>
    <script type="text/javascript">
       function checkLength() {
            var elements = document.getElementsByClassName('textbox');
            for(var i=0;i<2;i++) 
            {
              if(elements[i].value.length != 0)
                return true;
            }
            alert("Please fill at least one field");
            return false;
       }
    </script>
 </head>
 <body>
    <div class="outer">
       <table align="center" border="0" width="100%" cellpadding="0" cellspacing="0">
         <tr style="background-color:#00FFFF;">
             <td>
                <div id="LeftTopBar"> <p>Administration</p></div>
             </td>
             <td>
                <div id="RightTopBar"> <a href='logout.php'>logout</a></div>
             </td>
          
         <tr height="300">
            <td colspan="2" valign="top" >
               
               <div class="MiddleBar">
                  <table align="center" border="0" width="100%" cellpadding="0" cellspacing="10">
                     <tr>
                        <td><div class="Inner_td"><a href="InsertBook.php?Email=<?php echo $email ?>&Password=<?php echo $pwd;?>
                        ">Insert Book</a></div></td>
                        <td><div class="Inner_td"><a href="DeleteBook.php?Email=<?php echo $email ?>&Password=<?php echo $pwd;?>
                        ">Delete Book</a></div></td>
                        <td><div class="Inner_td"><a href="DeleteUser.php?Email=<?php echo $email ?>&Password=<?php echo $pwd;?>
                        ">Delete User</a></div></td>
                        <td><div class="Inner_td"><a href="DeleteFine.php?Email=<?php echo $email ?>&Password=<?php echo $pwd;?>
                        ">Clear Fine</a></div></td>
                     </tr>
                  </table>
                   
                  <hr />

                  <form method="post" action="DeleteFine.php?Email=sanjayucp1554@gmail.com&Password=sanjay004&popup=1">
                     <table align="center" cellpadding="5px" cellspacing="0px" border="0" style="width:100%;">
                        <tr>
                           <td>First Name :</td><td><input class="textbox" name="firstName" type="text" placeholder="Enter first name"  required/></td>
                        </tr>
                        <tr>
                           <td>Email ID :</td><td><input class="email" name="emaiID" type="text" placeholder="email id" ></td>
                        </tr>
                        <tr height="150px">                   
                           <td colspan="2"><button type="submit" class="button button-block" style="width:50%;margin:0px 200px;margin-bottom:5px;" onclick=" return checkLength();"/>Clear Fine</button></td>
                        </tr>
                     </table>
                  </form>
                  
                 
               </div>

            </td>
         </tr>
       </table>
       
    </div>      
 </body>
</html>