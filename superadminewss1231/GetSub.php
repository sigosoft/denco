<?php

header('Content-Type: application/json');

include "db/config.php";

$list=array();

$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE); 

$CategoryID=$input['CategoryID'];


$sql="SELECT * FROM subcategory WHERE CategoryID='$CategoryID'";
$result=mysqli_query($conn,$sql);


$Scene ='<option value="0">-- Select Subcategory --</option> ';

if(mysqli_num_rows($result)>0)
{

while ($row = mysqli_fetch_array($result))
{

$Scene .= '<option value="'.$row['SubcategoryID'].'">'.$row['SubcategoryName'].'</option> ';


};


}
else
{

$Scene .='<option value="0">No Subcategory</option> ';

}       


$tempData = $Scene;

$cleanData =  json_encode($tempData);
print_r($cleanData);



?>