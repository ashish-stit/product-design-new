<?php
require('autoload.php');
global $lumise;

$data = $lumise->connector->get_session('lumise_cart');
$items = isset($data['items']) ? $data['items'] : array();
$fields = array(
    array('email', 'Billing E-Mail'),
    array('address', 'Street Address'),
    array('zip', 'Zip Code'),
    array('city', 'City'),
    array('country', 'Country')
);
$shift_data=array_shift($items);
if (isset($shift_data))
{

  $ids=$shift_data['order_print'];
}
$page_title = $lumise->lang('Checkout');
include(theme('header.php'));
?>
        <form action="<?php echo $lumise->cfg->url;?>process_checkout.php?order_id=<?php echo $ids;?>" method="post" class="form-horizontal"  accept-charset="utf-8"> 
        <div class="container">
            <div class="row">
                <div id="checkout" class="padding6 span12">
                    <?php if(count($items) > 0):?>
                       
                          <div class="col-md-6 order_overview">
                           
                            <div class="form-actions">
                                <button name="submit" type="submit" class="btn btn-large btn-primary">Confirm</button>
                            </div>
                        </div>
                        
                    <?php else:?>
                        <div class="span12">
                            <p><?php echo $lumise->lang('Your cart is currently empty.'); ?></p>
                        </div>
                        <div class="form-actions">
                            <a href="<?php echo $lumise->cfg->url;?>" class="btn btn-large btn-primary"><?php echo $lumise->lang('Update'); ?></a>
                        </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
        </form>
        <script type="text/javascript">
        jQuery(document).ready(function($) {
            $("#checkoutform").validate();
        });
        </script>
<?php
include(theme('footer.php'));
//update cart info
if(!isset($grand_total)){
    $grand_total = 0;
}
$data['total'] = $grand_total;
$lumise->connector->set_session('lumise_cart', $data);
