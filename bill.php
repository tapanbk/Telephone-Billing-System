<html><head>
</head>
<?php
include('index.php');
?>
<body>
<fieldset style="background-color:#2F4F4F">
<legend>Please Enter the Below details carefully</legend>
<form method="post" action="bill.php" >
<input type="hidden" name="posted" value="true">

 ID&nbsp;<input type="id" name="id" placeholder="Enter the ID of customer"><br/>
 <b>Calls :&nbsp;&nbsp;</b><input type="number" name="call"  placeholder="Enter the total number of calls" size="40" required><br/><br/>
 <b>Paid Amount:&nbsp;</b><input type="text" name="paid_amount"  placeholder="Enter the amount paid." size="40" required><br/><br/>
 
<input type="submit" value="Submit">
  &nbsp;&nbsp;<input type="reset" value="RESET">
  </form>
  </fieldset>
  <?php
    if(isset($_POST['posted']))
     {
         include('function.php');
  	     $bill=new telephone;
  	     $bill->bill_calculate();
     }
    ?> 