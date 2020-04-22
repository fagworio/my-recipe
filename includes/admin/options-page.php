<?php

function mr_plugin_opts_page() {
    ?>
		<div class="wrap">
		<div class="card">
				<div class="card-body">
					<h3 class="card-title"><?php _e('My Recipe Settings', 'myrps' ); ?></h3>
					<form method="POST" action="admin-post.php">
						<input type="hidden" name="action" value="mr_save_options" />
						<?php wp_nonce_field( 'mr_options_verify' ); ?>
						<div class="form-group">
							<label><?php _e('User login required for rating recipes', 'myrps'); ?></label>
							<select class="form-control" name="mr_rating_login_required">
								<option value="1">No</option>
								<option value="2">Yes</option>
							</select>
						</div>
						<div class="form-group">
							<label><?php _e('User login required for submitting recipes', 'myrps'); ?></label>
							<select class="form-control" name="mr_submission_login_required">
								<option value="1">No</option>
								<option value="2">Yes</option>
							</select>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary"><?php _e('Update', 'myrps'); ?></button>
						</div>
					</form>
				</div>
			</div>
		</div>
    <?php
}