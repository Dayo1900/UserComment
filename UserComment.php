<?php session_start();?>
<!DOCTYPE html>

<html lang="en">

<head>

<title>User Comment Section</title>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="UserComment.css" type="text/css">

<link rel="stylesheet" href="UserComment990px.css" media="(max-width:990px)" type="text/css">

<link rel="stylesheet" href="UserComment630px.css" media="(max-width:630px)" type="text/css">

<link rel="stylesheet" href="UserComment330px.css" media="(max-width:330px)" type="text/css">

</head>


<body>


<br><br>

<div class="top">
<h1>User Comment Section</h1>
</div>
<p class="description"> 
This page is about session management with PHP.<br>Whenever users post comments, it will be displayed with timestamps. Nothing is stored in a database because it's only for test purposes.<br><br>
To make things short, a user can make a maximum of two posts which will be stored in session variables. Comments from users are printed from there.<br>
In the next page user posts are displayed by calling the session variables.<br>
Some of the PHP functions used are: date_default_timezone_set(), $_SESSION[], and date().</p>



<div class="words">

<form action="UserComment.php" method="post">     <!--means the form will be submitted to this same page i.e testwebsite.php-->

 <div class="align">
<label for="first_name">First name: </label>
  
<input class="input1" type="text" name="first_name" id="sname" autocomplete="on" maxlength="21" placeholder="Your surname" required>

<span class="error"> 
<?php if ((isset ($_POST["submit"])) && (empty ($_POST["first_name"])))
{echo "*Surname required";} ?> 
</span>
 </div>

<br>
<br>

 <div class="align">
<label for="email" class="d">Email: </label>
  
<input class="input2" type="email" name="email" id="email" autocomplete="on" maxlength="21" placeholder="Email address" required>

<br>
<span class="error"> 
<?php if ((isset ($_POST["submit"])) && (empty ($_POST["email"])))
{echo "*Email required";} ?> 
</span>
  </div>
  

<br><br><br>

 <div class="align">
<label for="message" class="d2">Comment: </label>
  
<textarea name="comment" id="comment" style="word-wrap=break-word;" maxlength="225" placeholder="Comments. . ."> </textarea>
<p class="align2"><small>Maximum of 225 characters.</small></p>
<span class="error"> 
<?php if ((isset ($_POST["submit"])) && (empty ($_POST["comment"])))
{echo "*Message required";} ?> 
</span>
  </div>

<br>
  <br>
  
<input class="set" type="submit" name="submit" value="Post Comment">

</form> 
</div>

<br>
<br>
    
<div style="height:auto; width:100%;">
<?php  
//Set default time zone to Nigeria
date_default_timezone_set('Africa/Lagos'); 


error_reporting(E_ALL ^ E_NOTICE);          //report all errors but don't give me error notice, because I have an undefined variable:$_SESSION['count'];


//steps to take after user submits details
if(isset($_POST['submit'])) 
{
    
$first_name=$email=$comment=$name=$email_add=$user_comment=""; 

$first_name=$_POST['first_name'];
$email=$_POST['email'];
$comment=$_POST['comment'];

//Apply some styling on the variables
$name="<p class='a'> $first_name</p>";
$email_add="<p class='b'> $email</p>";
$user_comment="<p class='b'> $comment</p>";

//By joining the three variables together, it's easy to display them at once.
$user_details=$name . $email_add . $user_comment; 
$user_detailsone=$name . $email_add . $user_comment;           
$user_detailstwo=$name . $email_add . $user_comment; 

$_SESSION['count'];


if (!empty($user_details))
{
    
if(empty($_SESSION['count']))
{
$_SESSION['one']=$user_detailsone . date('h:i:sa');	  //it will hold the submission from a user and give the timestamp
$_SESSION['count']=1;
unset($_POST['submit']);
}

elseif  ((isset($_POST['submit'])) && ($_SESSION['count']=1))
{
$_SESSION['two']=$user_detailstwo . date('h:i:sa');		
$_SESSION['count']=2;
unset($_POST['submit']);
}

elseif  ((isset($_POST['submit'])) && ($_SESSION['count']=2))
{
echo "You can only make two posts on this page";
echo "<meta http-equiv='refresh' content='2;url=UserCommentpageTwo.php'>";
}

echo $_SESSION['one'];
echo $_SESSION['two'];

}    

    
}
?>
</div>
<br>

<a class="next" href='UserCommentpageTwo.php'> Next Page</a>

<br><br><br>

</body>
</html>





