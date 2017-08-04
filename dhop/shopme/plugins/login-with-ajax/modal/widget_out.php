<?php
/*
 * This is the page users will see logged out.
 * You can edit this, but for upgrade safety you should copy and modify this file into your template folder.
 * The location from within your template folder is plugins/login-with-ajax/ (create these directories if they don't exist)
*/
?>
<div class="lwa lwa-template-modal">

	<div class="lwa-modal" style="display: none;">

		<div class="lwa-modal-holder">

			<a class="shopme-modal-button button_grey middle_btn js-lwa-open-login-form" href="<?php echo esc_attr(LoginWithAjax::$url_login); ?>"><?php esc_html_e('Login', 'shopme'); ?></a>

			<?php if ( get_option('users_can_register') && !empty($lwa_data['registration']) ) : ?>
				<a class="shopme-modal-button button_grey middle_btn lwa-links-register-inline js-lwa-open-register-form shopme-form-visible" href="<?php echo esc_attr(LoginWithAjax::$url_register); ?>"><?php esc_html_e('Register', 'shopme'); ?></a>
			<?php endif; ?>

			<form name="lwa-form" class="lwa-form js-lwa-login shopme-form-visible" action="<?php echo esc_attr(LoginWithAjax::$url_login); ?>" method="post">

				<h3><?php esc_html_e('Login','shopme') ?></h3>

				<span class="lwa-status"></span>

				<p class="username_input">
					<label><?php esc_html_e( 'Username','shopme' ) ?></label>
					<input type="text" name="log" id="lwa_user_login" class="input" />
				</p>

				<p class="password_input">
					<label><?php esc_html_e( 'Password','shopme' ) ?> <span class="kw-required"></span></label>
					<input type="password" name="pwd" id="lwa_user_pass" class="input" value="" />
				</p>

				<p><?php do_action('login_form'); ?></p>

				<div class="lwa-submit">

					<div class="kw-sm-table-row row">

						<div class="col-sm-6">

							<div class="kw-input-wrapper">

								<input name="rememberme" type="checkbox" class="kw-small" id="lwa_rememberme" value="forever" />
								<label for="lwa_rememberme"><?php esc_html_e( 'Remember Me', 'shopme' ) ?></label>

							</div><!--/ .kw-input-wrapper -->

						</div>

						<div class="col-sm-6">

							<div class="align-right">

								<?php if( !empty($lwa_data['remember']) ): ?>
									<small>
										<a class="shopme-lwa-links-remember shopme-lwa-open-remember-form" href="<?php echo esc_url(LoginWithAjax::$url_remember); ?>" title="<?php esc_attr_e('Password Lost and Found','shopme') ?>"><?php esc_html_e('Lost your password?','shopme') ?></a>
									</small>
								<?php endif; ?>

							</div><!--/ .align-right -->

						</div>

					</div>

					<p class="lwa-submit-button">
						<input type="submit" name="wp-submit" class="lwa-wp-submit button_grey middle_btn" value="<?php esc_attr_e('Login','shopme'); ?>" tabindex="100" />
						<input type="hidden" name="lwa_profile_link" value="<?php echo !empty($lwa_data['profile_link']) ? 1:0 ?>" />
						<input type="hidden" name="login-with-ajax" value="login" />
						<?php if( !empty($lwa_data['redirect']) ): ?>
							<input type="hidden" name="redirect_to" value="<?php echo esc_url($lwa_data['redirect']); ?>" />
						<?php endif; ?>
					</p>

				</div>

			</form>

			<?php if ( get_option('users_can_register') && !empty($lwa_data['registration']) && $lwa_data['registration'] == 1 ) : //Taken from wp-login.php ?>

				<form class="lwa-form js-lwa-register" name="lwa-register" action="<?php echo esc_attr(LoginWithAjax::$url_register); ?>" method="post">

					<h3><?php esc_html_e('Register','shopme') ?></h3>

					<span class="lwa-status"></span>

					<p>
						<label><?php esc_html_e( 'Username','shopme' ) ?></label>
						<input type="text" name="user_login" id="user_login"  value="" />
					</p>

					<p>
						<label><?php esc_html_e( 'E-mail','shopme' ) ?></label>
						<input type="text" name="user_email" id="user_email" />
					</p>

					<p>
						<?php
						//If you want other plugins to play nice, you need this:
						do_action('register_form');
						?>
					</p>

					<p>
						<label><?php esc_html_e('A password will be e-mailed to you.', 'shopme'); ?></label>
						<input type="submit" value="<?php esc_attr_e('Register','shopme'); ?>" tabindex="100" />
						<input type="hidden" name="login-with-ajax" value="register" />
					</p>

				</form>

			<?php endif; ?>

		</div>

	</div>

	<?php if ( get_option('users_can_register') && !empty($lwa_data['registration']) && $lwa_data['registration'] == 1 ) : //Taken from wp-login.php ?>

		<div class="lwa-modal" style="display: none;">

			<div class="lwa-modal-holder">

				<form class="lwa-form shopme-form-visible" name="lwa-register" action="<?php echo esc_attr(LoginWithAjax::$url_register); ?>" method="post">

					<h3><?php esc_html_e('Register','shopme') ?></h3>

					<span class="lwa-status"></span>

					<p>
						<label><?php esc_html_e( 'Username','shopme' ) ?></label>
						<input type="text" name="user_login" id="user_login"  value="" />
					</p>

					<p>
						<label><?php esc_html_e( 'E-mail','shopme' ) ?></label>
						<input type="text" name="user_email" id="user_email" />
					</p>

					<p>
						<?php
						//If you want other plugins to play nice, you need this:
						do_action('register_form');
						?>
					</p>

					<p>
						<label><?php esc_html_e('A password will be e-mailed to you.', 'shopme'); ?></label>
						<input type="submit" value="<?php esc_attr_e('Register','shopme'); ?>" tabindex="100" />
						<input type="hidden" name="login-with-ajax" value="register" />
					</p>

				</form>

			</div>

		</div>

	<?php endif; ?>

</div>
