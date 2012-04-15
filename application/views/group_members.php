<div id="content" class="span6">
	<?php
		foreach ($members as $member) {
			echo '<div class="member_show span4">';
			if($member->id == $owner_id) {
				echo '<span class="label label-info">Gruppägare</span>';
			}
			foreach($admins as $admin) {
				if($member->id == $admin->user_id) {
					echo '<span class="label label-success">Administratör</span>';
				}
			}
			echo '	<div class="profilepic">
						<img src="http://www.gravatar.com/avatar/'.md5( strtolower( trim($member->email))).'?d=mm" alt="" />
					</div>';
			echo '<div class="member_info"><p><a href="'.base_url().'user/'.$member->id.'">'.$member->name.'</a></p><p>'.$member->email.'</p></div>';
			echo '</div><div class="infodevider"></div>';
		}
	?>
</div>
