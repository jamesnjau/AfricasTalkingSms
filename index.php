<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<title>SMS</title>
</head>
<body> 
  <div class="container mt-5">
    <div class="row">
      <div class="col-8">

        <?php
        if(isset($_POST['submit'])){
            require_once 'sms.php';
            $livesms = new SMS();
            @$phone=$_POST['phone'];
            @$message=$_POST['message'];
            @$result = $livesms->send($phone, $message);
          }   
          if (@$result['success'] && !empty($result['message'])) {
            echo '<div class="alert alert-primary" role="alert">
            '.@$result['message'].'
            </div>';
          }elseif (!@$result['success'] && !empty($result['message'])) {
            echo '<div class="alert alert-danger" role="alert">
            '.@$result['message'].'
            </div>';
          }
         ?>
      
      <h2>Send SMS To A Phone Number</h2>
   <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <div class="form-group row">
      <label for="staticEmail" class="col-sm-2 col-form-label">Phone</label>
      <div class="col-sm-10">
      <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone number">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputPassword" class="col-sm-2 col-form-label">Message</label>
      <div class="col-sm-10">
        <textarea class="form-control" id="message" name="message" placeholder="Enter your message"></textarea>
      </div>
    </div>
    <div class="row">
      <div class="col-sm">
        <button name="submit" class="btn btn-primary btn-sm">Send</button>
      </div>
      <div class="col-sm">
           
      </div>
    </div>
  </form>
      </div>
    </div>
  </div>  
 
</body>
</html>
