<html><head>
</head>
<?php
include('index.php');
?>
<body>
<form method="post" action="">
<input type="hidden" name="posted" value="true">
  ID&nbsp;<input type="id" name="id" placeholder="Enter the ID of customer"><br/>

  Name:&nbsp;<input type="text" name="name" placeholder="Enter the Name of customer"><br/>
  Address:&nbsp;<input type="text" name="address" placeholder="recent address"></br>
  <input type="submit" value="Submit">
  &nbsp;&nbsp;<input type="reset" value="RESET">
 </body>
  </html>
  <?php
  if(isset($_POST['posted']))

  {
    include('function.php');
    $add=new telephone;
    $add->update_the_customer();
  }

  ?>