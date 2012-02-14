<div id="leftmenu" class="span3">
			<div id="login">
				<?php
				if($this->session->userdata('user') == 2) {
					echo '<div class="alert alert-error"><p class="red">Falaktigt användarnamn eller lösenord</p></div>';
				}
				?>
				<form id="loginform" class="form-vertical well" action="<?php echo base_url(); ?>user/login" method="post">
					<div class="box">
						<label for="uname">Användarnamn:</label>
						<input id="uname" class="required span2" type="text" name="uname" />
					</div>
					<div class="box">
						<label for="password">Lösenord:</label>
						<input id="password" type="password" name="pass" class="required span2" />
					</div>
					<div class="box">
						<label class="checkbox">
						<input type="checkbox" class="" name="rememberme" value="1">Kom ihåg mig:
						</label>
					</div>
					<div class="box">
						<button class="btn btn-primary" name="login" type="submit" value="login">Logga in</button>
					</div>
				</form>
			</div>
		</div>
