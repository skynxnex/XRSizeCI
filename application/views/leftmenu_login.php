<div id="leftmenu" class="span3">
			<div id="login" class="row">
				<?php
					echo validation_errors();
					if($this->session->userdata('login') == 'fail') {
						echo 	'<div class="alert alert-error">
									<p>Användarnamn eller lösenord felaktiga.</p>
								</div>';
					}
				?>
				<form id="loginform" class="form-vertical well" action="<?php echo base_url(); ?>user/login" method="post">
					<div class="box">
						<label for="uname">Användarnamn:</label>
						<input id="uname" class="required" type="text" name="uname" />
					</div>
					<div class="box">
						<label for="password">Lösenord:</label>
						<input id="password" type="password" name="pass" class="required" />
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
