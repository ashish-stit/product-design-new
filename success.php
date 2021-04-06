<?php 
	
require('autoload.php');
global $lumise, $lumise_helper;

$order = $lumise->connector->get_session('lumise_justcheckout');
$order_id = $order['id'];
$user = $order['user'];

if(isset($_POST['txn_id'])){
    //update order data
    $db = $lumise->get_db();
	$db->where ('id', $order_id)->update ('orders', array(
        'txn_id' => $_POST['txn_id'],
    ));
	
	$db->where ('id', $order_id);
	$db->where ('status', 'pending')->update ('orders', array(
        'status' => 'processing'
    ));
    $order['status'] = 'processing';
}

$page_title = $lumise->lang('Thank you');

include(theme('header.php'));

?>
        <div class="container">
            <div id="confirm" class="thankyou">
                <div class="col-md-12 pt-3">
                    <h3><?php echo $lumise->lang('Thank you. Your design has been saved.'); ?></h3>
					<div class="mt-30"></div>
                    <div class="form-actions">
                        <a href="<?php echo $lumise->cfg->url;?>" class="btn btn-large btn-primary">
	                        <?php echo $lumise->lang('Continue'); ?>
	                    </a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>   
<?php
	
if(isset($_GET['order_id']) && isset($order['id']) && $order['id'] == $_GET['order_id']){
	echo "<script>localStorage.setItem('LUMISE-CART-DATA', '');</script> ";
}
	
include(theme('footer.php'));
