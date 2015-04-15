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

       




/*-----------------------------add new customer to the Telephpne Billing system-----------------------------------------*/

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



/*-------------------------------Calculate the bill and update due amount into database-----------------------------*/

           function bill_calculate()
           {
                $id=$_POST['id'];
                $call=$_POST['call'];
           	    $amount=$_POST['paid_amount'];


                  $result= mysql_query("SELECT * FROM customers WHERE id='$id'");
                   while($row=mysql_fetch_array($result))
                       {
                       	   
                            $id=$row['id'];
                            $name=$row['name'];

                            $left= $row['bill'];
                              
                        
                        }
                 $ret=0;
                 $due=0;

                if($call<=200)
                   {

                         $temp=250+$left;
              	       
                    }

                  else
                    {

              	         $call=$call-200;
              	         $temp=$left+$call*3;
              	         $temp=250+$temp;

              	       
                     }
                   if($temp>$amount)
                      {
                           $due=$temp-$amount;
                      }
                   else
                       {
                   	         $due=0;
                             $ret=$amount-$temp;
                       }  
                
              echo '<table border=4><th>ID</th><th>Name</th><th>Previous Month Due</th><th>Paid Amount</th><th>Total Bill</th>';

                         if($due!=0)
                            {
                          
                                 echo '<th>Due left</th>';
                            }

                          if($ret!=0)
                            {

                                echo '<th>Return</th>';
                            }
  

              echo '<tr><td>'.$id.'</td><td>'.$name.'</td><td>'.$left.'</td><td>'.$amount.'</td><td>'.$temp.'</td>';
                      if($due!=0)
                        {
                            echo '<td>'.$due.'</td>';
                        }
                      

                      if($ret!=0)
                         {
                             echo '<td>'.$ret.'</td>';
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