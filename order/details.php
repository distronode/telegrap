
<?php
ob_start();
session_start();
?>

<?php
 error_reporting(0);
if($_SESSION['username']==''){
		header("Location: index.php");
		die();
	}
//$order_id=1430;
if(isset($_GET['id'])){
	$order_id = $_GET['id'];
}
else{
  echo "provide order id";
  exit();
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://store.ringid.com/S343597635699/rest/all/V1/orders/".$order_id);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$headers = [
    'accept: application/json',
    'Content-Type: application/json',
    'Authorization: Bearer bdk50mst0c15me08c0hzbb42ne6bwoqk'
];

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$order_list = curl_exec ($ch);

$json = json_decode($order_list, true);


curl_close ($ch);

if($json != null && !isset($json['items'])){
	echo "No items found";
	exit();
}
$order = $json;
//print_r($order);exit;
?>



<?php 
/*		echo "<table id='table_wrapper_excel' class='order_list_r'>";
		echo "<tr><th style='border:thin solid black;'>Order&nbsp;Number</th><th width='10%' style='border:thin solid black;'>Status</th><th style='border:thin solid black;'>Date&nbsp;&&nbsp;Time</th><th style='border:thin solid black;'>Sender&nbsp;Name</th><th style='border:thin solid black;'>Sender&nbsp;ID</th><th style='border:thin solid black;'>Sender&nbsp;Phone</th><th width='10%' style='border:thin solid black;'>Billing Name</th><th width='10%' style='border:thin solid black;'>Billing Address</th><th width='10%' style='border:thin solid black;'>Billing Phone</th><th width='10%' style='border:thin solid black;'>Receiver Name</th><th width='10%' style='border:thin solid black;'>Receiver Phone</th><th width='10%' style='border:thin solid black;'>Receiver Address</th><th width='10%' style='border:thin solid black;'>From Office</th><th width='10%' style='border:thin solid black;'>City</th><th width='15%' style='border:thin solid black;'>Product Name</th><th width='15%' style='border:thin solid black;'>SKU</th> <th width='15%' style='border:thin solid black;'>Supplier Name</th><th width='15%' style='border:thin solid black;'>order qty</th><th width='15%' style='border:thin solid black;'>Unit Price</th><th width='15%' style='border:thin solid black;'>Total Price</th><th width='15%' style='border:thin solid black;'>Shippping Charge</th></tr>";
		
		
		if(count($order)>0){
			$i=1;
			//foreach($orders as $order){
				$gift='';
				$buyer_userid=explode('@',$order['customer_email']);
				
				if($buyer_userid[0]!=''){
					$utid.=$buyer_userid[0];
					if(count($orders)!=$i){
						$utid.=',';
					}
				}
				
				$gift=$order['extension_attributes']['shipping_assignments'][0]['shipping']['address']['firstname'];
				$gift_explode=explode(')',$gift);
				if (strpos($gift_explode[0],'Gift to')== false) {
					$gift_explode[0]='';
				}
				
				$ringid_partial=trim(str_replace('(Gift to','',$gift_explode[0]));	
				if($ringid_partial!=''){
					$ringid_partial="21$ringid_partial";
					$partial.=(int)$ringid_partial;
					if(count($orders)!=$i){
						$partial.=',';
					}
				}
				$i++;				
			//}
			$buyer_details='';
			if($utid!=''){
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL,"$config_base_url/configportal/UserBasicInfo?utIds=$utid");
				curl_setopt($ch, CURLOPT_ENCODING,"UTF-8");
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				$buyer_info = (curl_exec($ch));
				$buyer_details = json_decode($buyer_info, true);
				curl_close ($ch);
			}
			$buyer_details=$buyer_details['lst'];
			$delivered_to_details='';
			if($partial!=''){
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL,"$config_base_url/configportal/UserBasicInfo?rIds=$partial");
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				$gift_to_info = (curl_exec($ch));
				$gift_to_info =iconv(mb_detect_encoding($gift_to_info, mb_detect_order(), true), "UTF-8", $gift_to_info);
				$delivered_to_details = json_decode($gift_to_info);
				curl_close ($ch);
			}
			$delivered_to_details=$delivered_to_details->lst;
		}
		
		
		if(count($order)>0){
				$gift='';
				$buyer_userid=explode('@',$order['customer_email']);
				if($order['status']=='payment_complete'){
					$order['status']='payment_done';
				}
				$utid=$buyer_userid[0];
				foreach($buyer_details as $d){
					if($d['utId']=="$utid"){
						$details=$d['dc'].'&nbsp;'.$d['mbl'];
						break;
					}else{
						$details='';
					}
				}
				$gift=$order['extension_attributes']['shipping_assignments'][0]['shipping']['address']['firstname'];
				$gift_explode=explode(')',$gift);
				if (strpos($gift_explode[0],'Gift to')== false) {
					$gift_explode[0]='';
				}
				$ringid_partial=trim(str_replace('(Gift to','',$gift_explode[0]));
				foreach($delivered_to_details as $delivered_to){
					if($delivered_to->rId=="21$ringid_partial"){
						$deliver_details=$delivered_to->owner->fn.'<br/>'.$delivered_to->owner->rId.'<br/>'.$delivered_to->owner->dc.''.$delivered_to->owner->mbl;
						break;
					}else{
						$deliver_details='';
					}
				}
				$all_single_item=$order['items'];
				if(count($all_single_item)>0){
					$item_counter=1;
					$temp_order_number='';
					foreach($all_single_item as $al_s){
						echo "<tr style='border-bottom:1px solid black;'>";
				if($order['customer_firstname']=="{$order['customer_lastname']}"){
					$customer_name=$order['customer_firstname'].'&nbsp;';
				}else{
					$customer_name=$order['customer_firstname'].' '.$order['customer_lastname'];
				}
				echo "<td align='center' style='color:#f47727;text-decoration:none;border:thin solid black;'><a style='color:#f47727;text-decoration:none;' href='javascript:void(0)' onclick='show_item({$order['entity_id']})'>{$order['entity_id']}</a></td>";
				echo "<td align='left' style='text-transform:capitalize;border:thin solid black;'>".str_replace('_',' ',$order['status'])."</td>";
				echo "<td align='left' style='border:thin solid black;'>".date('d/m/Y h:i A',strtotime($order['created_at']))."</td>";
				echo "<td align='left' style='border:thin solid black;'>{$customer_name}</td>";
				echo "<td align='left' style='border:thin solid black;'>{$d['rId']}</td>";
				echo "<td align='left' style='border:thin solid black;'>".$details."</td>";
				echo "<td align='left' style='border:thin solid black;'>{$order['billing_address']['firstname']}</td>";
				echo "<td align='left' style='border:thin solid black;'>{$order['billing_address']['street'][0]}</td>";
				echo "<td align='left' style='border:thin solid black;'>".substr($order['billing_address']['telephone'],0,4).'&nbsp;'.substr($order['billing_address']['telephone'],4,20)."</td>";
				echo "<td align='left' style='border:thin solid black;'>{$order['extension_attributes']['shipping_assignments'][0]['shipping']['address']['firstname']}</td>";
				echo "<td align='left' style='border:thin solid black;'>".substr($order['extension_attributes']['shipping_assignments'][0]['shipping']['address']['telephone'],0,4).'&nbsp;'.substr($order['extension_attributes']['shipping_assignments'][0]['shipping']['address']['telephone'],4,20)."</td>";
				echo "<td align='left' style='border:thin solid black;'>{$order['extension_attributes']['shipping_assignments'][0]['shipping']['address']['street'][0]}</td>";
				if($order['extension_attributes']['shipping_assignments'][0]['shipping']['address']['firstname']=='RingStore'){
					$office_add='RingStore';
				}else{
					$office_add='';
				}
				echo "<td align='left' style='border:thin solid black;'>{$office_add}</td>";
				echo "<td align='left' style='border:thin solid black;'>{$order['extension_attributes']['shipping_assignments'][0]['shipping']['address']['city']}</td>";
				echo "<td align='right' style='border:thin solid black;'>{$al_s['name']}</td>";
				echo "<td align='right' style='border:thin solid black;'>{$al_s['sku']}</td>";
				echo "<td align='right' style='border:thin solid black;'>{$al_s['extension_attributes']['product_owner_name']}</td>";
				echo "<td align='right' style='border:thin solid black;'>{$al_s['qty_ordered']}</td>";
				echo "<td align='right' style='border:thin solid black;'>{$al_s['price']}</td>";
				$total=$al_s['qty_ordered']*$al_s['price'];
				echo "<td align='right' style='border:thin solid black;'>{$total}</td>";	
				if($temp_order_number!=$order['entity_id']){
					echo "<td align='right' style='border:thin solid black;'>{$order['base_shipping_amount']}</td>";	
				}else{
					echo "<td align='right' style='border:thin solid black;'>&nbsp;</td>";	
				}							
				echo "</tr>";
					$item_counter++;
					$temp_order_number=$order['entity_id'];
					}	
				}
			$last_entity=$order['entity_id'];
			$_SESSION['last_entity']=$last_entity;
		}
		echo "</table>";
*/
	?>


<link href="inv.css" rel="stylesheet">
<style>
	.invoice-title h2, .invoice-title h3 {
		display: inline-block;
	}
	.table > tbody > tr > .no-line {
		border-top: none;
	}

	.table > thead > tr > .no-line {
		border-bottom: none;
	}

	.table > tbody > tr > .thick-line {
		border-top: 2px solid;
	}
	table tr td{font-size:12px;}
	.container{max-width:800px!important;}
	.panel-body tr td{padding:7px 5px;border-bottom:1px solid #eee;}
	@media print{
		.print{display:none!important;}
	}
</style>
<div class="container">
   <!-- <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h2>Invoice</h2><h3 class="pull-right">Order # <?php echo $order['entity_id'];?><br/><p style='font-size:14px;text-align:right;'>Date: <?php echo date('d/m/Y',strtotime($order['created_at']));?></p></h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address style="    border-right: 1px solid #000;">
    				<strong>Billed To:</strong><br>
    					<?php echo $order['billing_address']['firstname'];?><br>
    					<?php echo $order['billing_address']['street'][0];?><br>
    					<?php echo substr($order['billing_address']['telephone'],0,4).'&nbsp;'.substr($order['billing_address']['telephone'],4,20);?><br>
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
        			<strong>Shipped To:</strong><br>
    					<?php echo $order['extension_attributes']['shipping_assignments'][0]['shipping']['address']['firstname'];?><br>
						<?php echo $order['extension_attributes']['shipping_assignments'][0]['shipping']['address']['street'][0];?><br>
    					<?php echo substr($order['extension_attributes']['shipping_assignments'][0]['shipping']['address']['telephone'],0,4).'&nbsp;'.substr($order['extension_attributes']['shipping_assignments'][0]['shipping']['address']['telephone'],4,20);?><br>
    					
    				</address>
    			</div>
    		</div>
    		
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Order summary</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive"  style="overflow: hidden;">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>Item</strong></td>
									<td><strong>SKU</strong></td>
        							<td class="text-right"><strong>Price</strong></td>
        							<td class="text-right"><strong>Qty</strong></td>
        							<td class="text-right"><strong>Total</strong></td>
                                </tr>
    						</thead>
    						<tbody>
							
							<?php 
							$all_single_item=$order['items'];
				if(count($all_single_item)>0){
					$item_counter=1;
					$temp_order_number='';
					foreach($all_single_item as $al_s){
				
				$order['base_shipping_amount'];
				?>
				
				
				<tr>
    								<td><?php echo $al_s['name'];?></td>
									<td><?php echo $al_s['sku'];?></td>
									
    								<td class="text-right"><?php echo $al_s['price'];?></td>
    								<td class="text-right"><?php echo $al_s['qty_ordered'];?></td>
    								<td class="text-right"><?php echo $al_s['qty_ordered']*$al_s['price'];$total+=$al_s['qty_ordered']*$al_s['price'];?></td>
    							</tr>
                                
								
				<?php } }?>
				<tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
									<td class="thick-line"></td>
    								<td class="thick-line text-right" style='font-size:16px;'><strong>Total</strong></td>
    								<td class="thick-line text-right"  style='font-size:16px;'><strong><?php echo $total?></strong></td>
    							</tr>
				
	
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
	
	
	<hr/>-->
	
	<div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<!--<div class="col-xs-4" style="padding:0;"> <h2 class="pull-left">Invoice</h2></div>-->
				<div class="col-xs-6" style="padding:0;text-align:left;"><h3 style="display:block;margin: 0;"><img style="width:200px;" src="logo.png"></h3>
				
				</div>
				<div class="col-xs-6" style="padding:0;"><h3 class="pull-right">Order # <?php echo $order['entity_id'];?><br/><p style='font-size:14px;text-align:right;'>Date: <?php echo date('d/m/Y',strtotime($order['created_at']));?></p></h3></div>
    		<div style="clear:both;"></div>
			</div>
			<div class="col-xs-12" style="padding:0;text-align:center"> <h2 style="margin-top: -25px; border-bottom: 1px solid #ddd; padding-bottom: 10px;text-align:center;">Invoice</h2></div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-5">
    				<address>
    				<strong>Billed To:</strong><br>
    					<?php echo $order['billing_address']['firstname'].'&nbsp;'.$order['billing_address']['lastname'];?><br>
    					<?php echo $order['billing_address']['street'][0];?><br>
    					<?php echo substr($order['billing_address']['telephone'],0,4).'&nbsp;'.substr($order['billing_address']['telephone'],4,20);?><br>
    				</address>
    			</div>
				<div class="col-xs-2"><strong style='text-align: center;font-size: 24;'>Full Paid</strong></div>
    			<div class="col-xs-5 text-right">
    				<address>
        			<strong>Shipped To:</strong><br>
    					<?php echo $order['extension_attributes']['shipping_assignments'][0]['shipping']['address']['firstname'].'&nbsp;'.$order['extension_attributes']['shipping_assignments'][0]['shipping']['address']['lastname'];?><br>
						<?php echo $order['extension_attributes']['shipping_assignments'][0]['shipping']['address']['street'][0];?><br>
    					<?php echo substr($order['extension_attributes']['shipping_assignments'][0]['shipping']['address']['telephone'],0,4).'&nbsp;'.substr($order['extension_attributes']['shipping_assignments'][0]['shipping']['address']['telephone'],4,20);?><br>
    					
    				</address>
    			</div>
    		</div>
    		<!--<div class="row">
    			<div class="col-xs-6">
    				<address>
    					<strong>Payment Method:</strong><br>
    					Visa ending **** 4242<br>
    					jsmith@email.com
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
    					<strong>Order Date:</strong><br>
    					March 7, 2014<br><br>
    				</address>
    			</div>
    		</div>-->
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Order summary</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="" style="overflow: hidden;">
    					<table class="" style="width:100%;">
    						<thead>
                                <tr>
        							<td width="35%"><strong>Item</strong></td>
									<td width="35%"><strong>Supplier Name</strong></td>
        							<td class="text-right"  width="15%"><strong>Qty</strong></td>
        							<td class="text-right"  width="15%"><strong>Total</strong></td>
                                </tr>
    						</thead>
    						<tbody>
							
							<?php 
							$all_single_item=$order['items'];
				if(count($all_single_item)>0){
					$item_counter=1;
					$temp_order_number='';
					foreach($all_single_item as $al_s){
				
				
				?>
				
				
				<tr>
    								<td><?php echo $al_s['name'];?></td>
									<td><?php echo $al_s['extension_attributes']['product_owner_name'];?></td>
    								<td class="text-right"><?php echo $al_s['qty_ordered'];?></td>
    								<td class="text-right">0.00</td>
    							</tr>
                                
								
				<?php } }?>
				
				<tr>
    								<td>Shipping</td>
									<td>&nbsp;</td>
    								<td class="text-right">&nbsp;</td>
    								<!--<td class="text-right"><?php //echo $order['base_shipping_amount'];?></td>-->
									<td class="text-right">0.00</td>
    							</tr>
				
				<tr>
    								<td class="thick-line" style="border-bottom:0;"></td>
									<td class="thick-line"  style="border-bottom:0;"></td>
    								<td class="thick-line text-right" style='font-size:16px;border-bottom:0;' ><strong>Total</strong></td>
    								<!--<td class="thick-line text-right"  style='font-size:16px;border-bottom:0;'><strong>TK <?php //echo $order['base_shipping_amount'];?></strong></td>-->
									<td class="thick-line text-right"  style='font-size:16px;border-bottom:0;'><strong>TK 0.00</strong></td>
    							</tr>
				
	
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
	
	
	
	
	
	
</div>
<?php if($_GET['printauto']==1){?>
<script type="text/javascript">
	window.onload = function() {
  window.print();
};
</script>
<?php }else{?>
<a href="javascript:void(0);" onclick="window.print()" class="print" style='color: #000000; text-decoration: none; border: 1px solid #ddd; padding: 5px 10px; border-radius: 5px; background-color: #f9f9f9;width:50px;margin:50px auto;display: block;'>Print</a>
<?php }?>