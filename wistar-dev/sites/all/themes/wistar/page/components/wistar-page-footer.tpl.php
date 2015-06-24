					<div id="footer_container">
						<div id="footer_elements">
							<div class="footer_column_wrapper">
								<div class="info">
									<div class="column first">
										<div class="footer_section site_information">
											<div class="logo_container"></div>
											<div class="location_text">
												The Wistar Institute<br />
												3601 Spruce Street<br />
												Philadelphia, PA 19104<br />
												215-898-3700<br />
											</div>
										</div>
										<div class="footer_section">
											<img src="/sites/all/themes/wistar/images/layout/ncicc.jpg" />
										</div>
									</div>
									<div class="column">
										<h3>Connect with Wistar:</h3>

										<div id="menu-footer-social" class="icon_link_list left">
											<?php 
												$soc_links = menu_tree_all_data('menu-footer-social');
												print menu_tree_output( $soc_links );
											?>
										</div>
									</div>
									<div class="column">
										<?php $menu = module_invoke('menu_block', 'block', 'view', 8); ?>
										<?php print $menu['content'];?>								
									</div>
								</div>
								<div class="footer_section_menus">
									<div class="footer_section_menu blue">
										<h3>The Institute</h3>
										<?php $menu = module_invoke('menu_block', 'block', 'view', 5); ?>
										<?php print $menu['content'];?>
									</div>
									<div class="footer_section_menu lime">
										<h3>Our Science</h3>
										<?php $menu = module_invoke('menu_block', 'block', 'view', 6); ?>
										<?php print $menu['content'];?>
									</div>																	
									<div class="footer_section_menu orange">
										<h3>Wistar Today</h3>
										<?php $menu = module_invoke('menu_block', 'block', 'view', 7); ?>
										<?php print $menu['content'];?>
									</div>																	
								</div>
							</div>
							<div class="column last">
								<div class="quick_links_container">
									<div class="quick_links_elements">
										<h3>Quicklinks:</h3>									
										<div class="quick_links">
											<?php $menu = module_invoke('menu_block', 'block', 'view', 12); ?>
											<?php print $menu['content'];?>																
										</div>
									</div>
								</div>
								<div class="subscribe_container">
									<div class="subscribe_elements">
										<h3>Sign up for our newsletter:</h3>									
										<div class="subscribe_form">
											<form method="POST" action="http://wistar.convio.net/site/Survey">
												<input type="hidden" name="cons_info_component" id="cons_info_component" value="t" />
												<input type="hidden" name="SURVEY_ID" id="SURVEY_ID" value="1162" />
												<input type="text" name="cons_email" id="cons_email" value="Email Address" size="14" maxlength="255" onfocus="if(this.value == 'Email Address'){this.value='';}" onblur="if(this.value == ''){this.value='Email Address';}" />
												<span style="display:none">
													<input type="text" name="denySubmit" id="denySubmit" value="" alt="This field is used to prevent form submission by scripts." />
													Please leave this field empty
												</span>
												<input type="submit" name="ACTION_SUBMIT_SURVEY_RESPONSE" id="ACTION_SUBMIT_SURVEY_RESPONSE" value="Subscribe" class="Button" />
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>					
					</div>
				</div>
			</div>
			<?php print theme('wistar_featured_image', wistar_theme_get_active('featured_image')); ?>				
			<?php if($alert):?>
				<?php print theme('wistar_alert', $alert); ?>				
			<?php endif; ?>
			<?php if($quicklinks): ?>
				<?php print theme('wistar_quicklinks'); ?>				
			<?php endif; ?>
		</div>
		<?php print theme('wistar_messages', $messages); ?>		
		<?php print $closure; ?>
		<?php print theme('wistar_ga'); ?>
		<!--SHADOWBOX POPUP BEGIN-->
		<link rel="stylesheet" type="text/css" href="<?php echo $base_path; ?>shadowbox/shadowbox.css">
		<script type="text/javascript" src="<?php echo $base_path; ?>shadowbox/shadowbox.js"></script>
		<script type="text/javascript">
		function Set_Cookie(name,value,expires,path,domain,secure){
			//set time, it's in milliseconds
			var today=new Date();
			today.setTime(today.getTime());
			//if the expires variable is set, make the correct expires time
			//the current script below will set it for x number of days
			//to make it for hours, delete * 24
			//for minutes, delete * 60 * 24
			if(expires)
				expires=expires*1000*60*60;
			var expires_date=new Date(today.getTime()+(expires));
			document.cookie=name+"="+escape(value)+((expires)?";expires="+expires_date.toGMTString():"")+((path)?";path="+path:"")+((domain)?";domain="+domain:"")+((secure)?";secure":"");
		}

		//this fixes an issue with the old method, ambiguous values
		//with this test document.cookie.indexOf( name + "=" );
		function Get_Cookie(check_name){
			//first we'll split this cookie up into name/value pairs
			//note: document.cookie only returns name=value, not the other components
			var a_all_cookies=document.cookie.split(';');
			var a_temp_cookie='';
			var cookie_name='';
			var cookie_value='';
			var b_cookie_found=false; // set boolean t/f default f
			for(i=0;i<a_all_cookies.length;i++){
				//now we'll split apart each name=value pair
				a_temp_cookie=a_all_cookies[i].split( '=' );
				//and trim left/right whitespace while we're at it
				cookie_name=a_temp_cookie[0].replace(/^\s+|\s+$/g,'');
				//if the extracted name matches passed check_name
				if(cookie_name==check_name){
					b_cookie_found=true;
					//we need to handle case where cookie has no value but exists (no = sign, that is):
					if(a_temp_cookie.length>1)
						cookie_value=unescape(a_temp_cookie[1].replace(/^\s+|\s+$/g,''));
					//note that in cases where cookie is initialized but no value, null is returned
					return cookie_value;
					break;
				}
				a_temp_cookie=null;
				cookie_name='';
			}
			if(!b_cookie_found)
				return null;
		}
		</script>
		<script type="text/javascript">
		Shadowbox.init({
		    // let's skip the automatic setup because we don't have any
		    // properly configured link elements on the page
		    skipSetup: true
		});

		window.onload = function() {

			currentDate = new Date(); //system current date
		    currentMonth = currentDate.getMonth() + 01;
		    currentDay = currentDate.getDate();
		    currentYear = currentDate.getFullYear();
		    currentHours = currentDate.getHours();
		    currentMinutes = currentDate.getMinutes();
		    currentSeconds = currentDate.getSeconds();

		    currentcpDateTime = currentMonth + "/" + currentDay + "/" + currentYear + " " + currentHours + ":" + currentMinutes + ":" + currentSeconds;
		    
			var date_start = '12/30/2013 01:00:00';
			var date_end = '12/31/2013 23:59:00';

			//var date_start = '12/20/2013 11:20:00';
			//var date_end = '12/20/2013 11:30:00';

			if(currentcpDateTime > date_start && currentcpDateTime < date_end){
				var shadowboxtestCookie = Get_Cookie('shadowboxtest');
				if(shadowboxtestCookie == null) {
					var popup = document.getElementById('shadow-popup').innerHTML;
					// open a welcome message as soon as the window loads
					Shadowbox.open({
						content:    popup,
						player:     "html",
						title:      "",
						height:     500,
						width:      700
					});
					Set_Cookie('shadowboxtest','set','','/','','');	
				}
			}
		};
		</script>
		<script type="text/javascript">// <![CDATA[
		function redirectShadowboxLink(){
			//window.parent.location = 'https://secure2.convio.net/wistar/site/Donation2?df_id=1460&1460.donation=form1';
			Shadowbox.close();
		}
		// ]]></script>
		<div id="shadow-popup" style="display:none;">
			<style type="text/css">
				#sb-wrapper-inner {
					border: none;
				}
				#sb-info{
					display: none;
				}
				#sb-player {
					background: #263549;
					overflow: hidden !important;
				}
				#sb-player div.image {
					width: 383px;
					float: left;
				}
				#sb-player div.text {
					width: 317px;
					float: left;
				}
				#sb-player div.text div.inner {
					padding: 85px 50px 50px 35px;
				}
				#sb-player div.text h2 {
					color: #fff;
					font-size: 34px;
					line-height: 38px;
					margin: 0;
					padding: 0;
				}
				#sb-player div.text p {
					color: #7bb7c6;
					font-size: 19px;
					line-height: 24px;
					margin: 25px 0 0;
					padding: 0 0 25px;
					font-family: "DINMedium";
				}
				#sb-player div.text a.donate {
					-webkit-box-shadow: 0px 0px 10px rgba(255, 255, 255, 0.15);
					-moz-box-shadow:    0px 0px 10px rgba(255, 255, 255, 0.15);
					box-shadow:         0px 0px 10px rgba(255, 255, 255, 0.15);
					width: 210px;
				}
			</style>
			<div class="image">
				<img src="<?php echo base_path(); ?>sites/all/themes/wistar/images/layout/donate.jpg" />
			</div>
			<div class="text">
				<div class="inner">
					<h2>JOIN US IN SAVING LIVES</h2>
					<p>Please make a 2013 year-end donation and help us cure cancer and other deadly diseases.</p>
					<a class="donate" onclick="redirectShadowboxLink();" href="https://secure2.convio.net/wistar/site/Donation2?df_id=1500&1500.donation=form1" target="_blank" style="
	    display: block; background: #79b3c4; border: 3px solid #047791; text-align: center; line-height: 37px; font-size: 14px; margin: 6px 0 0;
	    text-decoration: none;  text-transform: uppercase; font-family: &quot;DINMedium&quot;;
	    color: #ffffff;
	">Donate <span style="
	    color: #43768f; font-size: 12px; text-transform: uppercase; font-family: &quot;DINMedium&quot;;
	">&gt;</span></a>
				</div>
			</div>
		</div>
		<!--SHADOWBOX POPUP END-->
	</body>
</html>
