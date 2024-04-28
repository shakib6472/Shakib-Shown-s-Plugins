<?php
$wp_dummy_content_generatorQueryData = wp_dummy_content_generatorGetFakeProductsList();
$wp_dummy_content_generatorProductData = $wp_dummy_content_generatorQueryData->posts; 
?>
<h2>Bellow are all the products generated by this plugin 
 	<?php if ( !empty($wp_dummy_content_generatorProductData) ) { ?>
	 	<span class="deleteSpan">
		 	<form action='<?php echo esc_url(admin_url('admin-post.php'))?>' method="">
			    <input type="hidden" name="action" value="wp_dummy_content_generator_deleteproducts" />
			    <input type="hidden" name="nonce" value="<?=wp_create_nonce('wpdcg-ajax-nonce')?>" />
			    <input type="submit" name="submit" value="Delete dummy products">
			</form>
		</span>

 	<?php } ?>
</h2>
<table id="wp_dummy_content_generatorListProductsTbl" class="stripe" style="width:100%">
	<thead>
		<tr>
			<th>#</th>
			<th>Product title</th>
			<th>Product Status</th>
			<th>Created date</th>
		</tr>
	</thead>
	<tbody>
		<?php
		if ( !empty($wp_dummy_content_generatorProductData) ) {
			$counter = 1;
			foreach ($wp_dummy_content_generatorProductData as $key => $productDatavalue){ ?>
				<tr>
					<td><?=$counter?></td>
					<td><?=$productDatavalue->post_title?></td>

					<td><?=$productDatavalue->post_status?></td>
					<td><?=date("F jS, Y", strtotime($productDatavalue->post_date));?></td>
				</tr>
				<?php
				$counter++;
			}
			wp_reset_postdata();
		} ?>
	</tbody>
</table>