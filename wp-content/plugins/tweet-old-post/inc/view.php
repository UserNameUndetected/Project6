 <?php
    $remote_check = $this->getRemoteCheck();
    $beta_user =  $this->getBetaUserStatus();
?>
 <script type="text/javascript">
 var ropProAvailable = <?php
    echo (CWP_TOP_PRO) ? 'true' : 'false';
 ?>;
 var cwpfbadd = <?php echo isset($_GET["fbadd"]) ? "true" : "false"; ?>;

 </script>
<div class="cwp_top_wrapper">
	<!--<div class="announcement clearfix">
		<h2><?php _e("After 6 months of hard work, we have just released", 'tweet-old-post'); ?> <b>ThemeIsle</b>, <?php _e("the island of WordPress themes.", 'tweet-old-post'); ?></h2>
		<a class="show-me" href="https://themeisle.com/?utm_source=topadmin&utm_medium=announce&utm_campaign=top"><?php _e("Show Me", 'tweet-old-post'); ?></a>
	</div> end .announcement -->

	<header id="cwp_top_header" class='clearfix'>
		<h1 class="top_logo">
			<?php if (CWP_TOP_PRO) {
				echo "Revive Old Post PRO";
			} else echo "Revive Old Post"; ?>

		</h1>
		<span class="slogan"><?php _e("by", 'tweet-old-post'); ?> <a href="https://themeisle.com/?utm_source=topadmin&utm_medium=announce&utm_campaign=top">ThemeIsle</a></span>

		<div class="cwp_top_actions">

			<a href="https://twitter.com/intent/tweet?text=Check-out%20this%20awesome%20plugin%20-%20&url=http%3A%2F%2Fthemeisle.com%2Fplugins%2Ftweet-old-post-lite%2F&via=themeisle" class="tweet-about-it"><span></span> <?php _e("Show your love", 'tweet-old-post'); ?></a>
			<a target="_blank" href="http://wordpress.org/support/view/plugin-reviews/tweet-old-post#postform" class="leave-a-review"><span></span> <?php _e("Leave A Review", 'tweet-old-post'); ?></a>
		</div><!-- end .cwp_top_actions -->
	</header><!-- end .cwp_top_header -->

	<section class="cwp_top_container clearfix">


		<div class="cwp_top_status">

		<?php if($this->pluginStatus != 'true') {  ?>
			<p class='inactive'>
				<?php _e("Revive Old Post is not set to post!", 'tweet-old-post'); ?>
			</p>
		<?php } ?>
			<p class='inactive cwp-error-label inactive-rop-error-label'>

				<?php
					_e("Here you can see errors and notifications if they exist.", 'tweet-old-post');

				?>
			</p>
			<p class='active-rop-error-label cwp-error-label'>

			</p>

		</div><!-- end .cwp_top_status -->
		<div id="cwp-top-container-form" class="clearfix">
		<div id="cwp_top_tabs" class="clearfix">
			<ul id="tabs_menu">
				<li class="active" > <?php _e('Accounts','tweet-old-post'); ?> </li>
				<li > <?php _e('General settings','tweet-old-post'); ?> </li>
				<li ><?php _e('Post Format','tweet-old-post'); ?></li>
				<li <?php if(!CWP_TOP_PRO): ?> class="pro-version" <?php endif; ?>><?php _e('Custom Schedule','tweet-old-post'); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
                <?php // Added by Ash/Upwork ?>
				<li   ><?php _e('Manage queue','tweet-old-post'); ?> </li>
                <?php // Added by Ash/Upwork ?>
				<li class="rop-error-log"><span class="no-error"> </span></span><?php _e('Log','tweet-old-post'); ?></li>

			</ul>

				<form action="" method="post" id="cwp_top_form" class="clearfix">


			<div class="tab  active"><?php  require_once(ROPPLUGINPATH."/inc/view-accounts.php"); ?></div>
					<div class="tab">


			<?php foreach ($cwp_top_fields as $field) {

				if(CWP_TOP_PRO){
					if(isset($field['available_pro'])){
						if($field['available_pro'] == 'no')
							continue ;

					}

				}

				?>

				<fieldset class="option twp<?php echo $field['option']; ?>" >
						<div class="left">
							<label for="<?php echo $field['option']; ?>"> <?php _e($field['name'],'tweet-old-post'); ?> </label>
							<span class="description"> <?php _e($field['description'],'tweet-old-post'); ?> </span>

							<?php if($field['type'] == 'categories-list') { ?>
								<button class='select-all'><?php _e("Select All",'tweet-old-post');?></button>
							<?php } ?>

						</div><!-- end .left -->
						<div class="right">
							<?php CWP_TOP_Core::generateFieldType( $field ); ?>
						</div><!-- end .right -->
					</fieldset><!-- end .option -->
			<?php } ?>


			</div>

			<div class="tab"><?php  require_once(ROPPLUGINPATH."/inc/view-postformat.php"); ?></div>
			<div class="tab"><?php  require_once(ROPPLUGINPATH."/inc/view-postschedule.php"); ?></div>
            <?php // Added by Ash/Upwork ?>
			<div class="tab"><?php  require_once(ROPPLUGINPATH."/inc/view-advancedscheduling.php"); ?></div>
            <?php // Added by Ash/Upwork ?>
			<div class="tab clearfix">
				<div class="rop-log-container clearfix">

					<a href="#" id="rop-clear-log"><?php _e('Clear Log','tweet-old-post'); ?></a>
					<ul id="rop-log-list">


					</ul>
				</div>
			</div>
			<!-- end #cwp_top_form -->
		</div><div class="cwp_top_footer">
				<a class="reset-settings" id="reset-settings" href="#"><span></span> <?php  _e("Reset", 'tweet-old-post'); ?></a>
				<a class="update-options" id="update-options"href="#"><span></span><?php _e("Save", 'tweet-old-post'); ?></a>
				<?php if($this->pluginStatus != 'true' ): ?>

					<a class="tweet-now" id="tweet-now" href="#"><span></span> <?php _e("Start Sharing", 'tweet-old-post'); ?></a>
				<?php else: ?>

					<a class="stop-tweet-old-post" id="stop-tweet-old-post" href="#"><span></span> <?php _e("Stop Sharing", 'tweet-old-post'); ?></a>

				<?php endif; ?>
				<a class="see-sample-tweet" id="see-sample-tweet" href="#"><span></span> <?php _e("See Sample Post", 'tweet-old-post'); ?></a>
			</div><!-- end .cwp_top_footer -->
			<p><?php _e("We are not affiliated or partner with Twitter/Facebook/Linkedin in any way.", 'tweet-old-post'); ?></p>
				</form></div>
		<aside class="sidebar">
			<ul>
				<li class="rop-twitter-clock" data-current="<?php echo $this->getTime(); ?>"><?php echo __("Now is: ",'tweet-old-post')." <b> </b> " ?></li>
				<?php
				if($this->pluginStatus == 'true' ): ?>
						<?php
							foreach($all_networks  as $nn) {
								if(wp_next_scheduled($nn.'roptweetcron',array($nn)) === false) continue;
					     ?>
						<li class="rop-twitter-countdown rop-network-countdown"><?php echo __("Revive Old Post will post on",'tweet-old-post')." <span class='rop-network-name'>".$nn."</span> ".__("in the next",'tweet-old-post'); ?>: <span data-timestamp="<?php echo  wp_next_scheduled($nn.'roptweetcron',array($nn)) ; ?>" class='rop-network-timestamp'></span></li>
				<?php } ?>
				<?php endif; ?>
				<li class="rop-beta-user"><div class="rop-left"><?php  _e("Beta user",'tweet-old-post');?> </div><a href="#" id="rop-beta-button" class="rop-right <?php echo $beta_user; ?>"></a><div class="rop-clear" ></div><span class="rop-beta-desc"><?php  _e("As a beta user you will have access to the latest stable releases before going to production",'tweet-old-post');?></span></li>
				<li class="rop-beta-user"><div class="rop-left"><?php  _e("Remote check",'tweet-old-post');?></div><a href="#" id="cwp_remote_check" class="<?php echo $remote_check; ?> rop-right "></a><div class="rop-clear" ></div><span class="rop-beta-desc"><?php  _e("We will send you a ping each 15 minutes in order to assure that posts will be sent to social networks on time.   ",'tweet-old-post');?> </span> </li>
				<li class="upgrade"><a target="_blank" href="https://themeisle.com/plugins/tweet-old-post-pro/?utm_source=bannerright&utm_medium=announce&utm_campaign=top&upgrade=true"> <?php _e("Upgrade Tweet Old Post for only $9.99 - Upgrade To Pro Now!", 'tweet-old-post'); ?></a></li>

			</ul>
		</aside><!-- end .sidebar -->
	</section><!-- end .cwp_top_container -->

	<div class="cwp_sample_tweet_preview">
		<div class="cwp_sample_tweet_preview_inner">
			<h2><?php _e('Sample Post Preview','tweet-old-post');?> Twitter</h2>
			<span class="sample_tweet sample_tweet_twitter"></span>
			<h2><?php _e('Sample Post Preview','tweet-old-post');?> Facebook</h2>
			<span class="sample_tweet sample_tweet_facebook"></span>
			<h2><?php _e('Sample Post Preview','tweet-old-post');?>   LinkedIn</h2>
			<span class="sample_tweet sample_tweet_linkedin"></span>
			<h2><?php _e('Sample Post Preview','tweet-old-post');?>   XING</h2>
			<span class="sample_tweet sample_tweet_xing"></span>
			<h2><?php _e('Sample Post Preview','tweet-old-post');?>   Tumblr</h2>
			<span class="sample_tweet sample_tweet_tumblr"></span>
			<button class="top_close_popup"><?php _e('Close preview','tweet-old-post');?></button>
			<button class="tweetitnow"><?php _e('Share now','tweet-old-post');?></button>
		</div><!-- end .cwp_sample_tweet_preview_inner -->
	</div><!-- end .cwp_sample_tweet_preview -->

	<div class="cwp_user_pages">
		<div class="cwp_sample_tweet_preview_inner">
			<h2><?php _e('Choose a Profile or Page','tweet-old-post');?></h2>
			<div class="cwp_user_pages_inner"></div>
			<button class="top_close_popup"><?php _e('Close preview','tweet-old-post');?></button>
					</div><!-- end .cwp_sample_tweet_preview_inner -->
	</div><!-- end .cwp_sample_tweet_preview -->

	<div class="cwp_fbapp_preview">
		<div class="cwp_sample_tweet_preview_inner top_auth_inner">
			<h2><?php _e('Add Your Facebook Account Following The Instructions On The Left','tweet-old-post');?></h2>
			<span class="sample_tweet top_sample_auth">
				<div class="top_left_instructions">
				<ol>
					<li><?php _e('Go on','tweet-old-post');?>  <a href="https://developers.facebook.com/apps/" target="_blank">developers.facebook.com/apps</a>  </li>
					<li><?php _e('Click on <strong>Create New App</strong> from the top right corner','tweet-old-post');?> </li>
					<li><?php _e('Enter a <strong>Display Name</strong> and <strong>Namespace</strong> and click on Create App','tweet-old-post');?> </li>
					<li><?php _e('Once you arrive on the app dashboard, copy your <strong>App ID</strong> and <strong>App Secret</strong> in the fields on the right','tweet-old-post');?> </li>
					<li><?php _e('Go on Settings tab from the left sidebar menu add the contact email and click on <strong>Add Platform</strong> and select <strong>Website</strong>','tweet-old-post');?> </li>
					<li><?php printf(__('Copy/Paste this url : <strong>%s</strong> into App Domains and Site URL fields and <strong>Save</strong>','tweet-old-post'),top_settings_url());?> </li>
					<li><?php _e('Go on Status & Review tab and set your app live from the top-right switch.','tweet-old-post');?> </li>
					<li><?php _e('Now everything is done, click on <strong>Authorize App</strong> button.','tweet-old-post');?> </li>
				</ol>
					<h3><?php _e('You can follow this <a target="_blank" href="http://docs.themeisle.com/article/66-how-to-create-a-facebook-application" > tutorial</a> for more detailed instructions','tweet-old-post'); ?></h3>
			</div>
			<form action="" method="post" id="cwp_top_form" class="  top_auth_form">
			<fieldset class="option twptop_opt_app_id">
				<div class="left">
					<label for="top_opt_app_id"><?php _e('Facebook App ID','tweet-old-post');?>   </label>
					<span class="description"><?php _e('ID from your app created on facebook website.','tweet-old-post');?>   </span>


				</div><!-- end .left -->
				<div class="right">
					<input type="text" placeholder="1487991504767913" value="<?php get_option('cwp_top_app_id');?>" name="top_opt_app_id" id="top_opt_app_id">
				</div><!-- end .right -->
			</fieldset>

			<fieldset class="option twptop_opt_app_secret">
				<div class="left">
					<label for="top_opt_app_secret"><?php _e('Facebook App Secret','tweet-old-post');?>  </label>
					<span class="description"><?php _e('Secret from your app created on facebook website. ','tweet-old-post');?> </span>

				</div><!-- end .left -->
				<div class="right">
					<input type="text" placeholder="5124ea6d46e64da3c306f12812d0e4fx" value="<?php get_option('cwp_top_app_secret');?>" name="top_opt_app_secret" id="top_opt_app_secret">
				</div><!-- end .right -->
			</fieldset>

			<button class="top_authorize" service="facebook"><?php _e('Authorize App','tweet-old-post');?></button>
			</form>
		</span><button class="top_close_popup"><?php _e('Close preview','tweet-old-post');?></button>
		</div><!-- end .cwp_sample_tweet_preview_inner -->
	</div><!-- end .cwp_sample_tweet_preview -->

	<div class="cwp_not_version_preview">
		<div class="cwp_sample_tweet_preview_inner top_auth_inner">
			<h2><?php _e('You need to have the latest version of Revive Old Post Pro in order to use this feature. Please update it or download for your account here <a href="https://themeisle.com/purchase-history" target="_blank">https://themeisle.com/purchase-history</a>','tweet-old-post');?></h2>

		</span><button class="top_close_popup"><?php _e('Close','tweet-old-post');?></button>
		</div><!-- end .cwp_sample_tweet_preview_inner -->
	</div><!-- end .cwp_sample_tweet_preview -->

		<div class="cwp_lkapp_preview">
		<div class="cwp_sample_tweet_preview_inner top_auth_inner">
			<h2><?php _e('Add Your Linkedin Account Following The Instructions On The Left','tweet-old-post');?></h2>
			<span class="sample_tweet top_sample_auth">
				<div class="top_left_instructions">
				<ol>
					<li><?php _e('Go on','tweet-old-post');?> <a href="https://www.linkedin.com/secure/developer?newapp=" target="_blank">linkedin.com/secure/developer?newapp=</a></li>
					<li><?php _e('Enter the required details and pay special attention to the further fields :','tweet-old-post');?></li>
					<li><?php _e('Make sure you set Live Status to LIVE','tweet-old-post');?> </li>
					<li><?php _e('Default Scope should have r_basicprofile and w_share checked','tweet-old-post');?></li>
					<li><?php printf(__('Copy/Paste this url : <strong>%s</strong> into OAuth 2.0 Redirect URLs field and <strong>Save</strong>','tweet-old-post'),top_settings_url());?> </li>
					<li><?php _e('Once all required fields are filled click on Add Application button, get the API Key and Secret Key and paste them in the fields on the right','tweet-old-post');?></li>

					<li><?php _e('Now everything is done, click on <strong>Authorize App</strong> button.','tweet-old-post');?></li>
				</ol>
			</div>
			<form action="" method="post" id="cwp_top_form" class="  top_auth_form">
			<fieldset class="option twptop_opt_app_id">
				<div class="left">
					<label for="top_opt_app_id"><?php _e('Linkedin API Key','tweet-old-post');?>  </label>
					<span class="description"><?php _e('API Key that you get once you create an app','tweet-old-post');?>  </span>


				</div><!-- end .left -->
				<div class="right">
					<input type="text" placeholder="1487991504767913" value="<?php get_option('cwp_top_lk_app_id');?>" name="top_opt_app_id" id="top_opt_app_id_lk">
				</div><!-- end .right -->
			</fieldset>

			<fieldset class="option twptop_opt_app_secret">
				<div class="left">
					<label for="top_opt_app_secret"><?php _e('Linkedin Secret Key','tweet-old-post');?>  </label>
					<span class="description"><?php _e('Secret Key that you get once you create an app','tweet-old-post');?> </span>


				</div><!-- end .left -->
				<div class="right">
					<input type="text" placeholder="5124ea6d46e64da3c306f12812d0e4fx" value="<?php get_option('cwp_top_lk_app_id');?>" name="top_opt_app_secret" id="top_opt_app_secret_lk">
				</div><!-- end .right -->
			</fieldset>

			<button class="top_authorize" service="linkedin"><?php _e('Authorize App','tweet-old-post');?></button>
			</form>
		</span><button class="top_close_popup"><?php _e('Close preview','tweet-old-post');?></button>
		</div><!-- end .cwp_sample_tweet_preview_inner -->
	</div><!-- end .cwp_sample_tweet_preview -->

		<div class="cwp_xingapp_preview">
		<div class="cwp_sample_tweet_preview_inner top_auth_inner">
			<h2><?php _e('Add Your XING Account Following The Instructions On The Left','tweet-old-post');?></h2>
			<span class="sample_tweet top_sample_auth">
				<div class="top_left_instructions">
				<ol>
					<li><?php _e('Go on','tweet-old-post');?> <a href="https://dev.xing.com/applications/dashboard" target="_blank"> https://dev.xing.com/applications/dashboard</a></li>
					<li><?php _e('If you already made an application you will see it’s info here, otherwise click “Create app” button.','tweet-old-post');?></li>
					<li><?php _e("Fill 'Application Name', click 'Save'",'tweet-old-post');?> </li>
				 	<li><?php printf(__('Copy/Paste the Consumer Key and Consumer Secret in the fields from the right.  ','tweet-old-post'),top_settings_url());?> </li>

					<li><?php _e('Now everything is done, click on <strong>Authorize App</strong> button.','tweet-old-post');?></li>
				</ol>
			</div>
			<form action="" method="post" id="cwp_top_form" class="  top_auth_form">
			<fieldset class="option twptop_opt_app_id">
				<div class="left">
					<label for="top_opt_app_id"><?php _e('Consumer Key','tweet-old-post');?>  </label>
					<span class="description"><?php _e('Consumer Key','tweet-old-post');?>  </span>


				</div><!-- end .left -->
				<div class="right">
					<input type="text" placeholder="Consumer Key"   id="top_opt_app_id_xing">
				</div><!-- end .right -->
			</fieldset>

			<fieldset class="option twptop_opt_app_secret">
				<div class="left">
					<label for="top_opt_app_secret"><?php _e('Consumer Secret','tweet-old-post');?>  </label>
					<span class="description"><?php _e('Consumer Secret','tweet-old-post');?> </span>


				</div><!-- end .left -->
				<div class="right">
					<input type="text" placeholder="Consumer Secret" id="top_opt_app_secret_xing">
				</div><!-- end .right -->
			</fieldset>

			<button class="top_authorize" service="xing"><?php _e('Authorize App','tweet-old-post');?></button>
			</form>
		</span><button class="top_close_popup"><?php _e('Close preview','tweet-old-post');?></button>
		</div><!-- end .cwp_sample_tweet_preview_inner -->
	</div><!-- end .cwp_sample_tweet_preview -->
<div class="cwp_tumblrapp_preview">
		<div class="cwp_sample_tweet_preview_inner top_auth_inner">
			<h2><?php _e('Add Your Thumblr Account Following The Instructions On The Left','tweet-old-post');?></h2>
			<span class="sample_tweet top_sample_auth">
				<div class="top_left_instructions">
				<ol>
					<li><?php _e('Go on','tweet-old-post');?> <a href="https://www.tumblr.com/oauth/apps" target="_blank"> https://www.tumblr.com/oauth/apps</a></li>
					<li><?php _e('If you already made an application you will see it’s info here, otherwise click “Register application” button.','tweet-old-post');?></li>
					<li><?php _e("Click 'Register application'”' button. Fill 'Application Name', 'Application Website', all other fields (just enter your website URL to the 'Default callback URL') and click Register'.",'tweet-old-post');?> </li>
				 	<li><?php printf(__('Copy/Paste the Consumer Key and Consumer Secret in the fields from the right.  ','tweet-old-post'),top_settings_url());?> </li>
				 	<li><?php printf(__('Fill URL of your Tumblr Blog.  ','tweet-old-post'));?> </li>

					<li><?php _e('Now everything is done, click on <strong>Authorize App</strong> button.','tweet-old-post');?></li>
				</ol>
			</div>
			<form action="" method="post" id="cwp_top_form" class="  top_auth_form">
			<fieldset class="option twptop_opt_app_id">
				<div class="left">
					<label for="top_opt_app_id"><?php _e('Consumer Key','tweet-old-post');?>  </label>
					<span class="description"><?php _e('Consumer Key','tweet-old-post');?>  </span>


				</div><!-- end .left -->
				<div class="right">
					<input type="text" placeholder="Consumer Key"   id="top_opt_app_id_tumblr">
				</div><!-- end .right -->
			</fieldset>

			<fieldset class="option twptop_opt_app_secret">
				<div class="left">
					<label for="top_opt_app_secret"><?php _e('Consumer Secret','tweet-old-post');?>  </label>
					<span class="description"><?php _e('Consumer Secret','tweet-old-post');?> </span>


				</div><!-- end .left -->
				<div class="right">
					<input type="text" placeholder="Consumer Secret" id="top_opt_app_secret_tumblr">
				</div><!-- end .right -->
			</fieldset>
			<fieldset class="option twptop_opt_app_secret">
				<div class="left">
					<label for="top_opt_app_secret"><?php _e('Tumblr url Blog','tweet-old-post');?>  </label>
					<span class="description"><?php _e('Tumblr url Blog','tweet-old-post');?> </span>


				</div><!-- end .left -->
				<div class="right">
					<input type="text" placeholder="Tumblr url Blog" id="top_opt_app_url_tumblr">
				</div><!-- end .right -->
			</fieldset>

			<button class="top_authorize" service="tumblr"><?php _e('Authorize App','tweet-old-post');?></button>
			</form>
		</span><button class="top_close_popup"><?php _e('Close preview','tweet-old-post');?></button>
		</div><!-- end .cwp_sample_tweet_preview_inner -->
	</div><!-- end .cwp_sample_tweet_preview -->

</div><!-- end .cwp_top_wrapper -->
