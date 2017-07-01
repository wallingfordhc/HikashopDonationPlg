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

	// Call a trigger, AfterProductsLoad - 
function onBeforeCartUpdate(&$cartClass,&$cart,$product_id,$quantity,$add,$type,$resetCartWhenUpdate,$force,&$do) {
	if(!@include_once(rtrim(JPATH_ADMINISTRATOR,DS).DS.'components'.DS.'com_hikashop'.DS.'helpers'.DS.'helper.php')){ return false; }

		$cartClass = hikashop_get('class.cart');

		
	
$cart2      = $cartClass->get();
if ($cart2) {
    $numberOfProducts = count($cart2);
	$cartkeys = array_keys($cart2);
    for ($i = 0; $i < $numberOfProducts; $i++) {
        $productID[$i] = $cart2[$cartkeys[$i]]->product_id;
	    echo ($productID[$i]);
    }
	//check to see if the donation product is included in the cart - if not add it
    if (in_array("48", $productID)) {
	    echo ("thanks");
    } else {
	    // add product with product_id = 48 to the cart
	$cartClass->update(48,1,$add=0,$type='product',$resetCartWhenUpdate=true,$force=false);
    echo ("not here");
    }
}

}


}
