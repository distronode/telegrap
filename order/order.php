<meta charset="ISO-8859-1">
<style>
	body{margin:0;padding:0;text-align:center;}
	.order_list_r *{font-size:12px;font-family:verdana,Sans-serif;font-weight:normal;}
	table.order_list_r{border-collapse: collapse;padding:10px;display: inline-block;}
	.order_list_r tr th,.order_list_r tr td{border:1px solid #eee;padding:5px;vertical-align:top;} 
	.order_list_r tr th{color:#f47727;background-color: #fff9f9;}
	.order_list_r tr td{color:#333;    word-break: break-word;vertical-align: top;}
	tr.single_items td{background-color:#f9f9f9;padding:10px;border-bottom:1px solid #ddd;}
	tr.single_items td:last-child{border-bottom:0;}
	ul.pagination{display:block;margin:0;padding:0;}
	.pagination li{display:inline-block;}
	.pagination li a {border: 1px solid #d4d4d4;border-radius: 3px;padding: 5px;font-size: 11px;color: #000;text-decoration: none;font-family: verdana,sans-serif;}
	.pagination li.disabled a {color:#989898;}
	.single_items{display:none;}
	.order_list_r tr td b{color:#f47727;}
	.display_table_row{display:table-row!important;}
</style>

<?php
//header('Content-Type: text/html; charset=utf-8');
	ob_start();
	session_start();
?>

<?php 
    error_reporting(0);
	$base_url="store.ringid.com";
	$config_base_url="https://portal.ringid.com";
	
	//$base_url="wefie.com";
	//$config_base_url="http://devauth.ringid.com:8090";
	
	$no_of_records_per_page = 10;
	$pageno = 1;
	$order_status='payment_complete';
	if($_SESSION['username']==''){
		header("Location: index.php");
		die();
	}
	if(isset($_POST['status'])){
		$data=json_decode("{ \"entity\":{ \"entity_id\":{$_POST['entity_id']},\"increment_id\":{$_POST['entity_id']}, \"state\": \"processing\", \"status\":\"{$_POST['status']}\"}}");
		$payload = json_encode($data);
		$ch = curl_init("https://$base_url/rest/all/V1/orders/");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLINFO_HEADER_OUT, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
		$headers = [
			'accept: application/json',
			'Content-Type: application/json',
			'Authorization: Bearer bdk50mst0c15me08c0hzbb42ne6bwoqk'
		];
		curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
		$result = utf8_decode(curl_exec($ch));
		curl_close($ch);
	}
	if (isset($_GET['pageno'])){
		$pageno = $_GET['pageno'];
	}
	if (isset($_POST['per_page']) && $_POST['per_page']!=''){
		$no_of_records_per_page = $_POST['per_page'];
		$_SESSION['per_page'] = $no_of_records_per_page;
	}
	if (isset($_POST['status_filter']) && $_POST['status_filter']!=''){
		$order_status = $_POST['status_filter'];
		$_SESSION['status_filter'] = $order_status;
	}
	if ($_SESSION['per_page']!=''){
		$no_of_records_per_page=$_SESSION['per_page'];
	}
	if ($_SESSION['status_filter']!=''){
		$order_status=$_SESSION['status_filter'];
	}
	//if($_SESSION['total_item']<=($no_of_records_per_page*$pageno) && $_SESSION['total_item']!=''){
	//	$no_of_records_per_page=$_SESSION['total_item'];
	//	$pageno=1;
	//}
	$orders=array();
	$ch = curl_init();
	
	//if($_SESSION['total_item']<($no_of_records_per_page*$pageno)){
	//	echo 'here '.$_SESSION['last_entity'];
	//	$last_entity_api=$_SESSION['last_entity'];
	//curl_setopt($ch, CURLOPT_URL,"https://$base_url/S343597635699/rest/all/V1/orders?searchCriteria%5BfilterGroups%5D%5B0%5D%5Bfilters%5D%5B0%5D%5Bfield%5D=entity_id&searchCriteria%5BfilterGroups%5D%5B0%5D%5Bfilters%5D%5B0%5D%5Bvalue%5D=$last_entity_api&searchCriteria%5BfilterGroups%5D%5B0%5D%5Bfilters%5D%5B0%5D%5BconditionType%5D=lt&searchCriteria%5BfilterGroups%5D%5B1%5D%5Bfilters%5D%5B0%5D%5Bfield%5D=status&searchCriteria%5BfilterGroups%5D%5B1%5D%5Bfilters%5D%5B0%5D%5Bvalue%5D=$order_status&searchCriteria%5BfilterGroups%5D%5B1%5D%5Bfilters%5D%5B0%5D%5BconditionType%5D=eq&searchCriteria%5BsortOrders%5D%5B0%5D%5Bfield%5D=entity_id&searchCriteria%5BpageSize%5D=31&searchCriteria%5BcurrentPage%5D=1");
	//echo "https://$base_url/S343597635699/rest/all/V1/orders?searchCriteria%5BfilterGroups%5D%5B0%5D%5Bfilters%5D%5B0%5D%5Bfield%5D=entity_id&searchCriteria%5BfilterGroups%5D%5B0%5D%5Bfilters%5D%5B0%5D%5Bvalue%5D=$last_entity_api&searchCriteria%5BfilterGroups%5D%5B0%5D%5Bfilters%5D%5B0%5D%5BconditionType%5D=lt&searchCriteria%5BfilterGroups%5D%5B1%5D%5Bfilters%5D%5B0%5D%5Bfield%5D=status&searchCriteria%5BfilterGroups%5D%5B1%5D%5Bfilters%5D%5B0%5D%5Bvalue%5D=$order_status&searchCriteria%5BfilterGroups%5D%5B1%5D%5Bfilters%5D%5B0%5D%5BconditionType%5D=eq&searchCriteria%5BsortOrders%5D%5B0%5D%5Bfield%5D=entity_id&searchCriteria%5BpageSize%5D=31&searchCriteria%5BcurrentPage%5D=1";
	//}else{
		curl_setopt($ch, CURLOPT_URL,"https://$base_url/S343597635699/rest/all/V1/orders?searchCriteria%5BfilterGroups%5D%5B0%5D%5Bfilters%5D%5B0%5D%5Bfield%5D=status&searchCriteria%5BfilterGroups%5D%5B0%5D%5Bfilters%5D%5B0%5D%5Bvalue%5D=$order_status&searchCriteria%5BfilterGroups%5D%5B0%5D%5Bfilters%5D%5B0%5D%5BconditionType%5D=eq&searchCriteria%5BfilterGroups%5D%5B0%5D%5Bfilters%5D%5B1%5D%5Bfield%5D=status&searchCriteria%5BfilterGroups%5D%5B0%5D%5Bfilters%5D%5B1%5D%5Bvalue%5D=$order_status&searchCriteria%5BfilterGroups%5D%5B0%5D%5Bfilters%5D%5B1%5D%5BconditionType%5D=eq&searchCriteria%5BsortOrders%5D%5B0%5D%5Bfield%5D=entity_id&searchCriteria%5BsortOrders%5D%5B0%5D%5Bdirection%5D=DESC&searchCriteria%5BpageSize%5D=$no_of_records_per_page&searchCriteria%5BcurrentPage%5D=$pageno");
	//}
	
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
	$orders = $json['items'];
	//print_r($orders);exit;
	$total_count=$json['total_count'];
	$total_rows = $total_count;
	//if($_SESSION['total_item']<($no_of_records_per_page*$pageno)){
		$_SESSION['total_item']=$total_count;
	//}
	$total_pages = ceil($total_rows / $no_of_records_per_page);
	//print_r($orders);exit;
	
	
	$actual_link = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
	
?>

<div style="width:1300px;margin:0 auto;margin-top:20px;">	
	<ul class="pagination"  style="float:left;width:370px;">
		<li>
			<form action="order.php" method="post" style="width:230px;float:left;">
				<select name='per_page'>
					<option value='1' <?php if($_POST['per_page']==1 || $_SESSION['per_page']==1){?> selected="selected" <?php }?>>1</option>
					<option value='10' <?php if($_POST['per_page']==10 || $_SESSION['per_page']==10){?> selected="selected" <?php }?>>10</option>
					<option value='20' <?php if($_POST['per_page']==20  || $_SESSION['per_page']==20){?> selected="selected" <?php }?>>20</option>
					<option value='30' <?php if($_POST['per_page']==30  || $_SESSION['per_page']==30){?> selected="selected" <?php }?>>30</option>
					<option value='40' <?php if($_POST['per_page']==40  || $_SESSION['per_page']==40){?> selected="selected" <?php }?>>40</option>
					<option value='50' <?php if($_POST['per_page']==50  || $_SESSION['per_page']==50){?> selected="selected" <?php }?>>50</option>
					<option value='100' <?php if($_POST['per_page']==100  || $_SESSION['per_page']==100){?> selected="selected" <?php }?>>100</option>
					<!--<option value='<?php echo $total_count;?>' <?php if($_POST['per_page']==$total_count  || $_SESSION['per_page']==$total_count){?> selected="selected" <?php }?>><?php echo $total_count;?></option>-->
				</select>
				<select name='status_filter'>
					<option value='' >Select Action</option>
					<option value='payment_complete' <?php if($_POST['status_filter']=='payment_complete' || $_SESSION['status_filter']=='payment_complete'){?> selected="selected" <?php }?>>Payment Done</option>
					<option value='on_shipment' <?php if($_POST['status_filter']=='on_shipment' || $_SESSION['status_filter']=='on_shipment'){?> selected="selected" <?php }?>>Order Shipped</option>
					<option value='complete'<?php if($_POST['status_filter']=='complete' || $_SESSION['status_filter']=='complete'){?> selected="selected" <?php }?>>Complete</option>
				</select>
				<input type="submit" name="search" value="Search">
				
				<!--<a href="javascript:void(0);" style="display: inline-block; color: #000; border: 1px solid #ddd; padding: 3px 10px; font-size: 12px; background-color: #eee; font-weight: bold;" onclick="download_excell();"><i class="fa fa-file-excel-o green_r"></i>Download&nbsp;Excell</a>-->
			</form>
			<form action="<?php echo $actual_link?>" method="post" target="_blank"  style="width:100px;float:left;">
				<input type="submit" name="download" value="Download Excel">
			</form>
		</li>
	</ul>
	<ul class="pagination"  style="float:right;width:390px;">
		<li style="font-size:12px;padding-right:20px;">Showing <b><?php echo $no_of_records_per_page*($pageno-1) .'</b> to <b>'. $no_of_records_per_page*$pageno?></b>. Total Ordered: <b><?php echo $total_count;?></b></li>
		<li><a href="?pageno=1">First</a></li>
		<li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
			<a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
		</li>
		<li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
			<a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
		</li>
		<li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
	</ul>

        
	<div style="clear:both"></div>
	
	
	<?php if(isset($_POST['download'])){?>
	
	<?php 
		echo "<table id='table_wrapper_excel' class='order_list_r' style='visibility:hidden;'>";
		echo "<tr><th style='border:thin solid black;'>Order&nbsp;Number</th><th width='10%' style='border:thin solid black;'>Status</th><th style='border:thin solid black;'>Date&nbsp;&&nbsp;Time</th><th style='border:thin solid black;'>Sender&nbsp;Name</th><th style='border:thin solid black;'>Sender&nbsp;ID</th><th style='border:thin solid black;'>Sender&nbsp;Phone</th><th width='10%' style='border:thin solid black;'>Billing Name</th><th width='10%' style='border:thin solid black;'>Billing Address</th><th width='10%' style='border:thin solid black;'>Billing Phone</th><th width='10%' style='border:thin solid black;'>Receiver Name</th><th width='10%' style='border:thin solid black;'>Receiver Phone</th><th width='10%' style='border:thin solid black;'>Receiver Address</th><th width='10%' style='border:thin solid black;'>From Office</th><th width='10%' style='border:thin solid black;'>City</th><th width='15%' style='border:thin solid black;'>Product Name</th><th width='15%' style='border:thin solid black;'>SKU</th> <th width='15%' style='border:thin solid black;'>Supplier Name</th><th width='15%' style='border:thin solid black;'>order qty</th><th width='15%' style='border:thin solid black;'>Unit Price</th><th width='15%' style='border:thin solid black;'>Total Price</th><th width='15%' style='border:thin solid black;'>Shippping Charge</th></tr>";
		
		
		if(count($orders)>0){
			$i=1;
			foreach($orders as $order){
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
			}
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
		
		
		if(count($orders)>0){
			foreach($orders as $order){
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
					//$temp_order_number=$order['entity_id'];
					if(count($all_single_item)>0){
						
						$item_counter=1;
						//print_r($all_single_item);
						$temp_order_number='';
						foreach($all_single_item as $al_s){
							echo "<tr style='border-bottom:1px solid black;'>";
					if($order['customer_firstname']=="{$order['customer_lastname']}"){
						$customer_name=$order['customer_firstname'].'&nbsp;';
					}else{
						$customer_name=$order['customer_firstname'].' '.$order['customer_lastname'];
					}
					
					date_default_timezone_set('GMT');
					$datetime = new DateTime($order['created_at']);
					$la_time = new DateTimeZone('Asia/Dhaka');
					$datetime->setTimezone($la_time);
					
					echo "<td align='center' style='color:#f47727;text-decoration:none;border:thin solid black;'><a style='color:#f47727;text-decoration:none;' href='javascript:void(0)' onclick='show_item({$order['entity_id']})'>{$order['entity_id']}</a></td>";
					echo "<td align='left' style='text-transform:capitalize;border:thin solid black;'>".str_replace('_',' ',$order['status'])."</td>";
					echo "<td align='left' style='border:thin solid black;'>".$datetime->format('d/m/Y h:i A')."</td>";
					echo "<td align='left' style='border:thin solid black;'>{$customer_name}</td>";
					echo "<td align='left' style='border:thin solid black;'>{$d['rId']}</td>";
					echo "<td align='left' style='border:thin solid black;'>".substr($details,1,3).''.substr($details,4,20)."</td>";
					
					
					
					echo "<td align='left' style='border:thin solid black;'>{$order['billing_address']['firstname']} {$order['billing_address']['lastname']}</td>";
					echo "<td align='left' style='border:thin solid black;'>{$order['billing_address']['street'][0]}</td>";
					echo "<td align='left' style='border:thin solid black;'>".substr($order['billing_address']['telephone'],1,3).'&nbsp;'.substr($order['billing_address']['telephone'],3,20)."</td>";
					
					
					echo "<td align='left' style='border:thin solid black;'>{$order['extension_attributes']['shipping_assignments'][0]['shipping']['address']['firstname']} {$order['extension_attributes']['shipping_assignments'][0]['shipping']['address']['lastname']}</td>";
					
					
					echo "<td align='left' style='border:thin solid black;'>".substr($order['extension_attributes']['shipping_assignments'][0]['shipping']['address']['telephone'],1,3).'&nbsp;'.substr($order['extension_attributes']['shipping_assignments'][0]['shipping']['address']['telephone'],3,20)."</td>";
					
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
			}
			$_SESSION['last_entity']=$last_entity;
			
			
			
		}
		echo "</table>";
	?>
	
	
	<script type="text/javascript">
	var uri = 'data:application/vnd.ms-excel;base64,';
		var template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><style>#table_wrapper_excel tr td{border:1pt solid black;}</style><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><meta http-equiv="content-type" content="application/vnd.ms-excel; charset=UTF-8"></head><body><table>{table}</table></body></html>'; 
		var base64 = function(s) {
			return window.btoa(unescape(encodeURIComponent(s)))
		};
		var format = function(s, c) {
			return s.replace(/{(\w+)}/g, function(m, p) {
				return c[p];
			})
		};
		var table_div = document.getElementById('table_wrapper_excel').innerHTML;
		htmls = table_div;
		var ctx = {
			worksheet : 'Worksheet',
			table : htmls
		}
		var link = document.createElement("a"); 
		link.download = '<?php echo $order_status?>_order_list_' + Math.floor((Math.random() * 9999999) + 1000000) + '.xls';
		link.href = uri + base64(format(template, ctx));
		link.click();
</script>
	
	
	<?php }else{?>
	
	<?php 
		echo "<table id='table_wrapper' class='order_list_r'>";
		echo "<tr><th>Order&nbsp;Id</th><th>Date&nbsp;&&nbsp;Time</th><th>Buyer&nbsp;Name</th><th width='10%'>Buyer&nbsp;Info</th><th width='10%'>Delivered&nbsp;To</th><th width='10%'>Billing</th><th width='10%'>Shipping</th> <th width='10%'>Status</th> <th>No.Items</th> <th>T&nbsp;Qty</th> <th>Price</th> <th width='15%'>Details</th><th>Action</th></tr>";
		
		
		if(count($orders)>0){
			//print_r($orders);exit;
			$i=1;
			foreach($orders as $order){
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
			}
			
			//echo $utid.'<br/>';
			
			$buyer_details='';
			if($utid!=''){
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL,"$config_base_url/configportal/UserBasicInfo?utIds=$utid");
				curl_setopt($ch, CURLOPT_ENCODING,"UTF-8");
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				$buyer_info = (curl_exec($ch));
				$buyer_details = json_decode($buyer_info, true);
				//$buyer_details = $buyer_details['lst'][0];
				curl_close ($ch);
			}
			$buyer_details=$buyer_details['lst'];

			//print_r($buyer_details);exit;
			
			//echo $partial.'<br/>';
			
			$delivered_to_details='';
			if($partial!=''){
				//echo "https://portal.ringid.com/configportal/UserBasicInfo?rIds=$partial";exit;
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL,"$config_base_url/configportal/UserBasicInfo?rIds=$partial");
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				$gift_to_info = (curl_exec($ch));
				//$gift_to_info = stripslashes(html_entity_decode(rtrim($gift_to_info, "\0")));
				$gift_to_info =iconv(mb_detect_encoding($gift_to_info, mb_detect_order(), true), "UTF-8", $gift_to_info);
				$delivered_to_details = json_decode($gift_to_info);
				//echo json_last_error(); // 4 (JSON_ERROR_SYNTAX)
				//echo json_last_error_msg(); // unexpected character 
				//$delivered_to_details =  $delivered_to_details['lst'][0];
				curl_close ($ch);
			}

			//$delivered_to=$delivered_to_details['lst'];
			//$delivered_to_details=(array) $delivered_to_details->lst;
			//print_r($delivered_to_details->lst);
			$delivered_to_details=$delivered_to_details->lst;
		}
		
		
		if(count($orders)>0){
			//print_r($orders);exit;
			foreach($orders as $order){
				$gift='';
				$buyer_userid=explode('@',$order['customer_email']);
				if($order['status']=='payment_complete'){
					$order['status']='payment_done';
				}
				$utid=$buyer_userid[0];
				//$buyer_details='';
				//if($utid!=''){
					//$ch = curl_init();
					//curl_setopt($ch, CURLOPT_URL,"https://portal.ringid.com/configportal/UserBasicInfo?utIds=$utid");
					//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					//$buyer_info = curl_exec ($ch);
					//$buyer_details = json_decode($buyer_info, true);
					//$buyer_details = $buyer_details['lst'][0];
					//curl_close ($ch);
				//}
				
				
				foreach($buyer_details as $d){
					if($d['utId']=="$utid"){
						$details=$d['fn'].'<br/>'.$d['rId'].'<br/>'.$d['dc'].''.$d['mbl'];
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
					//print_r($delivered_to);
					if($delivered_to->rId=="21$ringid_partial"){
						//print_r($delivered_to);
						$deliver_details=$delivered_to->owner->fn.'<br/>'.$delivered_to->owner->rId.'<br/>'.$delivered_to->owner->dc.''.$delivered_to->owner->mbl;
						//{$delivered_to_details['fn']}<br/>{$delivered_to_details['rId']}<br/>{$delivered_to_details['owner']['dc']}{$delivered_to_details['owner']['mbl']}
						break;
					}else{
						$deliver_details='';
					}
				}

				//$delivered_to_details='';
				//if($ringid_partial!=''){
				//	$ch = curl_init();
				//	curl_setopt($ch, CURLOPT_URL,"https://portal.ringid.com/configportal/UserBasicInfo?rIds=21$ringid_partial");
				//	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				//	$gift_to_info = curl_exec ($ch);
				//	$delivered_to_details = json_decode($gift_to_info, true);
				//	$delivered_to_details =  $delivered_to_details['lst'][0];
				//	curl_close ($ch);
				//}
				echo "<tr style='border-bottom:1px solid black;'>";
					if($order['customer_firstname']=="{$order['customer_lastname']}"){
						$customer_name=$order['customer_firstname'];
					}else{
						$customer_name=$order['customer_firstname'].' '.$order['customer_lastname'];
					}
					
					date_default_timezone_set('GMT');
					$datetime = new DateTime($order['created_at']);
					$la_time = new DateTimeZone('Asia/Dhaka');
					$datetime->setTimezone($la_time);


//date('d/m/Y h:i A',strtotime($order['created_at']))
					
					echo "<td align='center' style='color:#f47727;text-decoration:none;'><a  target='_blank' style='color:#f47727;text-decoration:none;' href='details.php?id={$order['entity_id']}' onclick='show_item({$order['entity_id']})'>{$order['entity_id']}</a></td>";
					echo "<td align='left'>".$datetime->format('d/m/Y h:i A')."</td>";
					echo "<td align='left'>{$customer_name}</td>";
					echo "<td align='left'>{$details}</td>";
					echo "<td align='left'>{$deliver_details}</td>";
					echo "<td align='left'>{$order['billing_address']['firstname']} {$order['billing_address']['lastname']}<br/>{$order['billing_address']['street'][0]}<br/>{$order['billing_address']['telephone']}</td>";
					echo "<td align='left'>{$order['extension_attributes']['shipping_assignments'][0]['shipping']['address']['firstname']} {$order['extension_attributes']['shipping_assignments'][0]['shipping']['address']['lastname']}<br/>{$order['extension_attributes']['shipping_assignments'][0]['shipping']['address']['telephone']}<br/>{$order['extension_attributes']['shipping_assignments'][0]['shipping']['address']['street'][0]}</td>";
					echo "<td align='left' style='text-transform:capitalize;'>".str_replace('_',' ',$order['status'])."</td>";
					echo "<td align='center'>{$order['total_item_count']}</td>";
					echo "<td align='center'>{$order['total_qty_ordered']}</td>";
					echo "<td align='right'>{$order['grand_total']}</td>";
					echo "<td align='right'>";
					$all_single_item=$order['items'];
					//print_r($all_single_item);
					if(count($all_single_item)>0){
						$item_counter=1;
						foreach($all_single_item as $al_s){
							//Created: {$al_s['created_at']}<br/> 
							echo "Name: {$al_s['name']}<br/>Ordered Qty: {$al_s['qty_ordered']}<br/>Price: {$al_s['price']}<br/>Store Name: {$al_s['extension_attributes']['product_owner_name']}<br/>Owner Id: {$al_s['extension_attributes']['product_owner_id']}";
							if(count($all_single_item)!=$item_counter && count($all_single_item)>1){
								echo "<hr/>";
							}
						$item_counter++;
						}
					}
					echo "</td>";
					echo "<td align='right'><form method='post' id='myform_{$order['entity_id']}' action='order.php'><input type='hidden' name='entity_id' value='{$order['entity_id']}'><select name='status'  onchange='submitform({$order['entity_id']});'><option value=''>Select Action</option><option value='on_shipment'>On Shipment</option><option value='complete'>Complete</option></select></form><br/><a target='_blank' style='color: #000000; text-decoration: none; border: 1px solid #ddd; padding: 5px 10px; border-radius: 5px; background-color: #f9f9f9;' href='details.php?id={$order['entity_id']}&printauto=1'>Invoice</a></td>";
				echo "</tr>";
				//$all_single_item=$order['items'];
				//if(count($all_single_item)>0){
				//	foreach($all_single_item as $al_s){
				//		echo "<tr class='single_items' style='border-bottom:1px solid red;' id='show_{$order['entity_id']}'>";
				//			echo "<td colspan='12'>Name: {$al_s['name']}<br/>Ordered Qty: {$al_s['qty_ordered']}<br/>Price: {$al_s['price']}<br/>Store Name: {$al_s['extension_attributes']['product_owner_name']}<br/>Owner Id: {$al_s['extension_attributes']['product_owner_id']}</td>";
				//		echo "</tr>";
				//	}
				//}	
				
				$last_entity=$order['entity_id'];
				
			}
			$_SESSION['last_entity']=$last_entity;
		}
		echo "</table>";
	?>
	
	<?php }?>
	
	
	
	
	
</div>
<script type="text/javascript">
	function submitform(entity){
		if (!confirm('Are you sure to change status for order Id: ' + entity + '')) {
            return false;
        }
		document.forms["myform_"+entity].submit();
	}
	function show_item(entity){
		var element = document.getElementById("show_"+entity);
		element.classList.toggle("display_table_row");
		//document.getElementById("show_"+entity).style.display="table-row";
	}
</script>



<script type="text/javascript">
	function download_excell(){
		var uri = 'data:application/vnd.ms-excel;base64,';
		var template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'; 
		var base64 = function(s) {
			return window.btoa(unescape(encodeURIComponent(s)))
		};
		var format = function(s, c) {
			return s.replace(/{(\w+)}/g, function(m, p) {
				return c[p];
			})
		};
		var table_div = document.getElementById('table_wrapper').outerHTML;
		htmls = table_div;
		var ctx = {
			worksheet : 'Worksheet',
			table : htmls
		}
		var link = document.createElement("a"); 
		link.download = '<?php echo $order_status?>_order_list_' + Math.floor((Math.random() * 9999999) + 1000000) + '.xls';
		link.href = uri + base64(format(template, ctx));
		link.click();
	}
</script>