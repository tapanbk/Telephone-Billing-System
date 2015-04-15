<html>
   <head>
   </head>
   <?php
   include('index.php');
   ?>
  <body>
  <fieldset style="background-color:#2F4F4F">
 <legend>Please Enter the Below details carefully</legend>
  <form method="post" action="">
  <input type="hidden" name="posted" value="true">
  Name:&nbsp;<input type="text" name="name" placeholder="Enter the Name of customer" size="60px" max="40"><br/>
  Address:&nbsp;<input type="text" name="address" placeholder="recent address"size="58px"></br>
  <input type="submit" value="Submit" >
  &nbsp;&nbsp;<input type="reset" value="RESET">
  </form>
  </fieldset>
 </body>
  </html>
  <?php
 
  if(isset($_POST['posted'])){
  	 include('function.php');
 $add=new telephone;

  $add->add_the_new_costumer();
}
  ?>
 