<?php
include_once ('mail2/sendgrid-php.php');
$name = $_POST['name'];
$mail = $_POST['mail'];
$phonenumber = $_POST['phonenumber'];
$message = $_POST['message'];
$to='selva.thanvitechnologies@gmail.com';//
$from="microwebzc@gmail.com";//config pana email
$message='<table border="1">
 
  <tr>
    <td>Name</td>
    <td>'.$name.'</td>
   
  </tr>
  <tr>
    <td>Email</td>
    <td>'.$mail.'</td>
   
  </tr>
  <tr>
    <td>Phone</td>
    <td>'.$phonenumber.'</td>
   
  </tr>
  <tr>
    <td>Message</td>
    <td>'.$message.'</td>
   
  </tr>
  
</table>';
//echo $message;
//exit;
$subject = "contact page";
$subject =$customer_name." (".$carrierconfirm['invoice_no'].")"." - Invoice Transaction";
$resmail = sendgridApiMail($to, $message, $subject, $from, '');

        if ($resmail->statusCode() == '202') 
        {
                echo '<h3>mail has been sent successfully</h3><br><input type="button" id="close" value="OK" onclick="window.close()" />';
        }
        else
        {
                echo "not ok";
        }
?>