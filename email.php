<?php echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?".">"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>email form</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style type="text/css">

p {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10pt;
}
.dotted {
	background-color: #FFFFCC;
	padding: 15px;
	border: 1px dashed #FF9966;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10pt;
	width: 450px;
}

</style>
</head>

<body>
<?php
/* these 4 items preceded by the dollar sign are the values sent to the php script
if you add more form boxes to your html page than these four, you have to manually type them in as these are typed.
from html form  */
$visitor_name = $_POST['visitor_name'];
$visitor_email = $_POST['visitor_email'];
$select = $_POST['select'];
$message = $_POST['message'];

/*  message_html is the one that gets "printed" to the php page in html  */
$message_html="
<div class=\"dotted\"><p><b>Name:</b> $visitor_name </p>
<p><b>Email:</b> $visitor_email </p>
<p><b>Select:</b> $select </p>
<p><b>Message:</b></p> <i> $message </i>
</div>
";

/*  message_all is the one that gets sent in the email to you "\n" makes a new line in the email. */
$message_all="
Name: $visitor_name \n
Email: $visitor_email \n
Select: $select \n
Message: $message \n

";

/*
 the *mail* command below sends an email directly from the form.
There are 4 sets of double quotes. The are, in order:
1. where the email is being sent to from the form (!!replace my address with yours!!)
2. the subject line in the email
3. The body content of the message itself (dynamically generated)
4. Return email address of the visitor filling out the form (dynamically generated).

*/

/* change "mark@websterart.com" to your email address at hotmail or yahoo */
mail("dahl8677@student.cptc.edu", "from my web site form", "$message_all", "From: $visitor_email");

/* the *print* command below writes html to the php page after they click the submit button and tells your visitor that
the email was successfully sent. */
print "<p>The information you entered in the form: </p>
 $message_html

<p>has been emailed to me</p>
<p>I will try to respond within several days and look forward
 to working with you on your web site.<br> <br>
Thank you for your time. Click your back button to return my web site</p>";

?>



</body>
</html>
