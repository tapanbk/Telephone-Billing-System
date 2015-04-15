<?php
class telephone
{

/*-----------------------------connect to the database using the constructor--------------------------*/
function __construct()
{
	
    $con=mysql_connect("localhost","root","");
     if(!$con)
      {

	    die('couldnot connect to:'.mysql_error());
      }

        mysql_select_db("telephone",$con);
  }

       




/*-----------------------------add new customer to the system-----------------------------------------*/

       function add_the_new_costumer()
           {

	         $name=$_POST['name'];
	           $address=$_POST['address'];
              mysql_query("INSERT INTO customers(name,address) VALUES ('$name','$address')");
 	          echo 'insert sucessful in the database';
 	
          }


 



 /*-----------------------------delete the existing customer from the database---------------------------*/

        function delete_the_customer()
          {
           $id=$_POST['id'];
           
         mysql_query("DELETE FROM customers WHERE id='$id'");

     

          }




 /*-----------------------------UPdate the details about the existing customer--------------------------------*/


          function update_the_customer()
           {
           	$name=$_POST['name'];
           	$address=$_POST['address'];
           	$id=$_POST['id'];
              mysql_query("UPDATE customers SET name='$name', address='$address' WHERE id='$id'");
              

           }

/*-------------------------------Calculate the bill and update the bills into database-----------------------------*/

           function bill_calculate()
           {
              $id=$_POST['id'];
              $call=$_POST['call'];
           	  $amount=$_POST['paid_amount'];


         $result= mysql_query("SELECT * FROM customers WHERE id='$id'");
                  while($row=mysql_fetch_array($result))
                       {

                            $left= $row['bill'];
                              if($left!=0)
                                {
                                   echo 'Your Due amount from the previous months is '.$left.'<br/>';
                                }  
                        
                        }


                if($call<=250)
                   {

                       $temp=200+$left;
              	       echo 'Your bill is Rs.'.$temp;
                    }

                  else
                    {

              	       $call=$call-250;
              	       $temp=$left+$call*2;
              	       $temp=200+$temp;
              	       echo 'Your Bill is Rs.'.$temp;
                     }
                   if($temp>$amount)
                   {
      
                      $due=$temp-$amount;
                      echo '<br/>Your due amount is '.$due;
                   }
                   else
                       {
                   	      $due=0;
                          $temp=$amount-$temp;
                         echo '<br/>You have got Rs.'.$temp.' return';
                      }  
                

/*----------------------------------passing the above calculated data into database for future--------------------------*/

                    mysql_query("UPDATE customers SET bill='$due' WHERE id='$id'");
                 


             }


    function display_customer()
    {

     $id=$_POST['id'];
     $result=mysql_query("SELECT * FROM customers where id='$id'");
     echo " details<br/>";
     echo "<table>";
     echo "<th>Name</th><th>Address</th><th>Due left<th>";
     while($row=mysql_fetch_array($result))
       {

       	echo '<tr><td>'.$row['name'].'</td>';
       	echo '<td>'.$row['address'].'</td>';
       	echo '<td>'.$row['bill'].'</td></tr>';
       }
       echo '</table>';
     
    }
}