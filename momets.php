<?php
include 'connection.php';
if(isset($_GET['doget']))
{//echo "<script>alert('enteredddd')</script>";
    $result=mysqli_query($conn,"SELECT messages from moments");
   
$return_arr = array();
    while($row = mysqli_fetch_row($result))
{   
    
    $word = $row[0];
    
    $return_arr[] = array(
                    "message" => $word,
                   
                );
            }
echo json_encode($return_arr);

        
}
else
{

$result=mysqli_query($conn,"SELECT * from moment");
   
$return_arr = array();
    while($row = mysqli_fetch_row($result))
{   
    
    $word = $row[1];
    
    $return_arr[] = array(
                    "word" => $word,
                   
                );
            }
echo json_encode($return_arr);

        }       

        


?>