<!-- register modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="register">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">Customer Registration</h4>

	        <p id="reg_successMsg" class="hide"></p>
			<p id="reg_errorMsg" class="hide"></p>
	      </div>
	      <div class="modal-body">
	        <form>
	          <div class="form-group">
			    <label for="name">Name:</label>
			    <input type="text" class="form-control" id="reg_name" required>
			  </div>
			  <div class="form-group">
			    <label for="email">Email address:</label>
			    <input type="email" class="form-control" id="reg_email" required>
			  </div>
			  <div class="form-group">
			    <label for="pwd">Password:</label>
			    <input type="password" class="form-control" id="reg_password" required>
			  </div>
			  <div class="form-group">
			    <label for="pwd">Confirm Password:</label>
			    <input type="password" class="form-control" id="reg_confirm_password" required>
			  </div>
			  <div class="form-group">
			    <label for="pwd">Mobile number:</label>
			    <input type="number" class="form-control" id="reg_mobile" required>
			  </div>
			  <div class="form-group">
				 <label for="comment">Address:</label>
				 <textarea class="form-control" rows="4" id="reg_address" required></textarea>
			  </div>
			  <button type="button" class="btn btn-primary" onclick="user.register();">Register</button>
			</form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- register modal -->