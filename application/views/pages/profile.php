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
	

</div>


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<?php 
	$this->load->view('partail/footer');
?>