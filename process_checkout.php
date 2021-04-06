<?php 
	
require('autoload.php');
global $lumise, $lumise_helper;
// if(isset($_POST['action']=="placeorder")){
    $order_id=$_GET['order_id'];
    $data = $lumise->connector->save_order($order_id);  
    if(isset($data['order_id'])){
		//add action before redirect for process payment.
		//$lumise_helper->process_payment($data['order_data']);
        $lumise_helper->redirect($lumise->cfg->url. 'success.php?order_id='. $data['order_id']);
 }// else {
// 	    print_r($data);
// 	    return;
//     }
// }
$lumise_helper->redirect($lumise->cfg->url. 'checkout.php');
