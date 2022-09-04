<?php


session_start();

    if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
        header('location: login.html');
        exit();
    }
    $id = $_SESSION['id'];
    $c_id = $_SESSION['c_key'];
	$qty = $_SESSION['qty'];
	$address = $_SESSION['address'];
	$cart = $_SESSION['cart'];
?>

<?php

$val_id=urlencode($_POST['val_id']);
$store_id=urlencode("onlin621634a05157e");
$store_passwd=urlencode("onlin621634a05157e@ssl");
$requested_url = ("https://sandbox.sslcommerz.com/validator/api/validationserverAPI.php?val_id=".$val_id."&store_id=".$store_id."&store_passwd=".$store_passwd."&v=1&format=json");

$handle = curl_init();
curl_setopt($handle, CURLOPT_URL, $requested_url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false); # IF YOU RUN FROM LOCAL PC
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false); # IF YOU RUN FROM LOCAL PC

$result = curl_exec($handle);

$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

if($code == 200 && !( curl_errno($handle)))
{

	# TO CONVERT AS ARRAY
	# $result = json_decode($result, true);
	# $status = $result['status'];

	# TO CONVERT AS OBJECT
	$result = json_decode($result);

	# TRANSACTION INFO
	$status = $result->status;
	$tran_date = $result->tran_date;
	$tran_id = $result->tran_id;
	$val_id = $result->val_id;
	$amount = $result->amount;
	$store_amount = $result->store_amount;
	$bank_tran_id = $result->bank_tran_id;
	$card_type = $result->card_type;

	# EMI INFO
	$emi_instalment = $result->emi_instalment;
	$emi_amount = $result->emi_amount;
	$emi_description = $result->emi_description;
	$emi_issuer = $result->emi_issuer;

	# ISSUER INFO
	$card_no = $result->card_no;
	$card_issuer = $result->card_issuer;
	$card_brand = $result->card_brand;
	$card_issuer_country = $result->card_issuer_country;
	$card_issuer_country_code = $result->card_issuer_country_code;

	# API AUTHENTICATION
	$APIConnect = $result->APIConnect;
	$validated_on = $result->validated_on;
	$gw_version = $result->gw_version;

    include('../config/dbconn.php');

	
    $query = "INSERT INTO `payment`(`cust_id`, `payment`, `payment_date`, `Txn id`, `status`, `payment_type`) VALUES ('$id','$amount','$tran_date','$tran_id','$status','$card_type')";
    mysqli_query($connection,$query);

	$query = "INSERT INTO `order`(`user_id`, `product_id`,`quantity`, `shipping_add`, `order_date`, `payment_type`, `totalprice`) VALUES ('$id','$c_id','$qty','$address','$tran_date', '$card_type', '$amount')";
    mysqli_query($connection,$query);

	$query = "UPDATE product SET product_qty=product_qty-'$qty' WHERE product_id=$c_id";
    $result = mysqli_query($connection,$query);

    unset($_SESSION['cart'][$c_id]);

    echo "<script>alert('Payment Successfull')</script>";
    echo "<script>location.href='../pages/user_index.php'</script>";


} else {

	echo "Failed to connect with SSLCOMMERZ";
}
?>