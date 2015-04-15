<html><head>
</head>
<?php
include('index.php');
?>
<body>
<form method="post" action="operation.php">
<input type="hidden" value="true" name="posted">
  ID&nbsp;<input type="number" name="id" placeholder="Enter the ID of customer"><br/>
  <select name="operation">
  <option value="display" selected>Display</option>
  <option value="delete" >DELETE</option</option>
  </select>
  <input type="submit" value="SUBMIT">

  &nbsp;&nbsp;<input type="reset" value="RESET">
  </form>
 </body>
  </html>
  <?php
        
         if(isset($_POST['posted']))
           {
             include('function.php');
              $sym=$_POST['operation'];
              $operate=new telephone;
               if($sym=='delete')
                 {
  
                     $operate->delete_the_customer();
                 }

               else
                  {
                    $operate->display_customer();
                  }
          }
  ?>
