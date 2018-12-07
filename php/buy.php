<?
include("autorization.php"); 

$id = $_POST['id'];
$userlogin = $_SESSION['user_login'];

$take_id = "SELECT client_id FROM clientage WHERE client_login='$userlogin'";

$takeresult = executeRequest($take_id);

if(mysql_num_rows($takeresult) == 1)
{
	$findproperty = "SELECT * FROM property WHERE id_property = '$id'";
	$findpropertyresult = executeRequest($findproperty);
	$takeresult = mysql_fetch_assoc($takeresult);
	$client_id = $takeresult['client_id'];
	if(mysql_num_rows($findpropertyresult) == 1)
	{
		$findpropertyresult = mysql_fetch_assoc($findpropertyresult);
		
		$id_prop = $findpropertyresult['id_property'];
		$type = $findpropertyresult['property_type'];
		$address = $findpropertyresult['address'];
		$cost = $findpropertyresult['cost'];
		$code = $findpropertyresult['property_code'];
		
		$queryToSold = "INSERT INTO sold(id_property,property_type,address,client_id,date_sale) VALUES('$id_prop','$type','$address','$client_id',Now())";
		executeRequest($queryToSold);
		$queryToContracts = "INSERT INTO contracts(property_code,cost,client_id,conclusion_date) VALUES('$code','$cost','$client_id',Now())";
		executeRequest($queryToContracts);
	}
	$deletePropertyQuery = "UPDATE property SET deleted = 1 WHERE id_property='$id'";
	executeRequest($deletePropertyQuery);
}
header("Location: ../property_list.php");
?>