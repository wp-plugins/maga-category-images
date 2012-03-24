<script type = "text/javascript" src = "https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type = "text/javascript" src = "<?php bloginfo('url'); ?>/wp-content/plugins/maga-category/js/legionPlugin.js"></script>
<script type = "text/javascript" src = "<?php bloginfo('url'); ?>/wp-content/plugins/maga-category/js/jquery.form.js"></script>
<script type = "text/javascript">
	$(document).ready(
		function(){
			$("#myForm").ajaxForm({		
				target: "#resultMsg",
				url: ajaxurl,
				data : { action : 'handle_response'},
				error: function(response)
				{
					alert("Ajax Error!"+response);
				}
			});
		});

</script>
		
<h1>Category Image Assigner v1.0</h1>
Author: Ricardo Magallanes Arco (Maga56)
<hr/>
<br/>
<span style = "color:red">NOTE: Previous entries will be overwritten everytime you upload a new image.</span>

<h4>Choose a Category:</h4>
<select name = "catId" id = "catId" onchange = "displayForm();">
<option value = "0">Select a Category from the List</option>

		<?php 
			$cat = get_categories("hide_empty=0");
		
				foreach($cat as $elem)
				{
					echo '<option value ="'.$elem->term_id.'">'.$elem->name.'</option>';
				}
		 ?>

		</select><br/>

<div id = "imageForm" style = "display:none; width: 600px;">
		<form name = "myForm" id = "myForm" method = "post" enctype = "multipart/form-data" action = "/">

			<h4 id = "myTitle"></h4>
			<input type = "hidden" name = "catValue" id = "catValue" value = "0"/>
			<input type = "file" name = "myFile" id = "myFile"/>
			<input type = "submit" value = "Upload" style = "margin-left:10px;" onclick = "return validate();"/>
		</form>
		<div id = "resultMsg" style = "width: 600px;"></div>
</div>
