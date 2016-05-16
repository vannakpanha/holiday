<?php 
	$this->load->view('partail/header');
?>

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
	   	<div class="navbar-header">
	      <a class="navbar-brand" href="#">
	        JQuery Ajax System
	      </a>
	    </div>
	   <ul class="nav navbar-nav navbar-right">
	      <li class="active"><a href="#">Wecome...</a></li>
	      <li><a href="<?php echo base_url('logins/sign_out'); ?>">Logout</a></li> 
	    </ul>
  </div>
</nav>

<div class="container well content">
	<!-- Button trigger modal -->
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
	 Add New product
	</button>

	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	    <form id="add_form" action="<?php echo base_url('manages/add_product'); ?>" method="post">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Add Product</h4>
	      </div>
	      <div class="modal-body">
	        <label>Product name:</label>
	        <input type="text" name="pro_name" id="pro_name" class="form-control">

	        <p class="clearfix"></p>
	        <label>Product Description:</label>
	        <input type="text" name="pro_desc" id="pro_desc" class="form-control">

	        <p class="clearfix"></p>
	        <label>Product Image:</label>
	        <input type="file" name="pro_img" id="pro_img" >

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Save changes</button>
	      </div>
	      </form>
	    </div>
	  </div>
	</div>
	<p class="clearfix"></p>
	<table class="table table-bordered">
		<tr>
			<th>Name</th>
			<th>Description</th>
			<th>Image</th>
			<th>Option</th>
		</tr>
	</table>

</div>


<script type="text/javascript">
	$(function(){
		$.validator.setDefaults({
			submitHandler:function(){
				var pname = $('#pro_name').val();
				var pdesc = $('#pro_desc').val();
				$.ajax({
					url:"<?php echo base_url('manages/add_product') ?>",
					data:{
						pro_name:pname,
						pro_desc:pdesc
					},
					dataType:"json",
					type:"POST",
					success:function(data){
						if(data.status){
							$.notify(data.Message,'success');
							$('.modal').modal('hide');
							var text = '<tr>';
							text += '<td>'+pname+'</td>';
							text += '<td>'+pdesc+'</td>';
							text += '<td></td>';
							text += '<td></td>';
							text += '</tr>';
							$('.table').append(text);
							$('#pro_name').val('');
							$('#pro_desc').val('');
							$('#pro_name').focus();
						}else{
							$.notify(data.Message,'error');
						}
					}
				});
			}
		});

		$('#add_form').validate({
			rules:{
				pro_name:{
					required:true,
					maxlength:40
				},
				pro_desc:{
					maxlength:1000
				}
			},
			messages:{
				pro_name:{
					required:"The Product Name is required!",
					maxlength:"The Product Name no longer than 40 chars"
				},
				pro_desc:{
					maxlength:"The Product Name must less than 1000 chars"
				}
			}
		});
	});
</script>

<?php 
	$this->load->view('partail/footer');
?>