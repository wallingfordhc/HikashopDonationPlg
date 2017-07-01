<?php
/*
* A payment plugin called "Donation2". This is the main file of the plugin.
*/

// You need to extend from the hikashopPaymentPlugin class which already define lots of functions in order to simplify your work
class plgHikashopDonation2 extends hikashopPaymentPlugin
{
	function plgHikashopDonation3(&$subject, $config){
		parent::__construct($subject, $config);
	}

	// Call a trigger, AFterProductsLoad
function onAfterCartProductsLoad(&$cart) {
	if(!@include_once(rtrim(JPATH_ADMINISTRATOR,DS).DS.'components'.DS.'com_hikashop'.DS.'helpers'.DS.'helper.php')){ return false; }

		$cartClass = hikashop_get('class.cart');

		//$cartClass->update(47,1,$add=0,$type='product',$resetCartWhenUpdate=true,$force=false);
	
$cart2      = $cartClass->loadFullCart();
if ($cart2) {
    $numberOfProducts = count($cart2->products);
    for ($i = 0; $i < $numberOfProducts; $i++) {
        $productID[$i] = $cart2->products[$i]->product_id;
    }
    if (in_array("47", $productID)) {

echo("<div class='alert alert-success'><strong>Thank you!</strong> Your donation is greatly appreciated.</div>");
    } else {
echo("<div class='alert alert-warning'><strong><a href='/index.php?option=com_hikashop&ctrl=product&task=updatecart&product_id=47&quantity=1&checkout=2'>Click here to add £35 ( or your choice of amount) </a></strong> to your order for our new pitch fund.</div>");
    }
}

}


}
