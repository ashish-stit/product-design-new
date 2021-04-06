<?php
require('autoload.php');
global $lumise, $lumise_helper;
$upload_url="http://localhost/product-design/";
    $servername='localhost';
    $username='root';
    $password='';
    $dbname = "productnew";
    $items=array();
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM product_order_products";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
	$items[]=$row;
    
  }
include(theme('header.php'));
?>
        <div class="lumise-products">
            <div class="lumise-list">
               <div class="container">
		        <form class="" action="products.php" method="get">
		        	<ul>
	                <?php
	                
	                if (count($items) > 0) {
	                    foreach($items as $item):
	                    {
	                    ?>
                           
                        <li>
                        	<a> <figure><?php
                                 $screenshots = json_decode($item['screenshots']);
                                foreach ($screenshots as $screenshot) {
                					echo '<img src="'.$upload_url.'orders/'.$screenshot.'" class="lumise-order-thumbnail" />';
                				}
                            }
                           
                            ?><div class="overlay"></div></figure>
                            <div class="content"><input type="checkbox" id="page" name="page" value="design">&nbsp;&nbsp;<?php echo $item['product_name'];?></div></a>
                         <div class="lumise-action">
                                            <?php ?>
                                                <a href="<?php echo $lumise->cfg->tool_url;?>?design_print=<?php echo $item['design'];?>&order_print=<?php echo $item['order_id'];?>&product_base=<?php echo $item['product_id'];?>&cart_id=<?php echo $item['cart_id'];?>" target="_blank" class="lumise-button"><?php echo $lumise->lang('Edit'); ?></a>
                                               
                                            <?php ?>
                                               <a href="#" class="lumise-item-action" data-item="<?php echo $item['order_id'];?>" data-func="delete"><?php echo $lumise->lang('Delete'); ?></a>
                                        </div>
                      
					 </li>
	                    <?php
                         
	                    endforeach;
	                }
	                ?>
	            </ul>
	         </form>
	       </div>
		</div>
      </div>

<?php include(theme('footer.php'));?>