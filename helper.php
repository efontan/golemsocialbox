<?php 

/**
 * @package ElGolem
 * @subpackage mod_golemsocialbox
 * @version   1.3.2 - 02/08/2012
 * @author    Emmanuel Fontan
 * @copyright (C) 2012 Emmanuel Fontan (email : fontanemmanel@gmail.com)
 *
 * @license		GNU/GPL, see LICENSE.php
 * This program is free software: you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation, either version 3 of the License, or
 (at your option) any later version.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with this program.  If not, see http://www.gnu.org/licenses/.
 *
 *
 */

class modGolemSocialBoxHelper {

	/*
	 ################################################
	#             GET_GOLEMSOCIALBOX	           #
	################################################
	*/
	public static function get_golemsocialbox(&$params) {

		//Get Basic Parameters
		$fblike_enable = $params->get('fblike_enable','yes');
		$tw_follow_button_enable = $params->get('tw_follow_button_enable','yes');
		$pin_follow_button_enable = $params->get('pin_follow_button_enable','yes');
		$gpbadge_enable = $params->get('gpbadge_enable','yes');
		$rss_enable = $params->get('rss_enable','yes');

		$load_css = $params->get('load_css','yes');
		$width = ($params->get('width',250) - 10);

		$moduleclass_sfx = $params->get('moduleclass_sfx','');


		//Add styles
		if ($load_css == 'yes') {
			$document =& JFactory::getDocument();
			$document->addStyleSheet(JURI::root(true) ."/modules/mod_golemsocialbox/css/style.css");
		}

		//Generate the HTML
		$html = '
		<div class="golemsocialbox" id="golemsocialbox" style="width:'.$params->get('width',250).'px;">
		';

		/*
		 ########################################
		#             FBLIKE_BOX	           #
		########################################
		*/
		if ($fblike_enable == 'yes') {
			//Get FBLike Box Parameters
			$fblike_url = $params->get('fblike_url','http://www.facebook.com/platform');
			$fblike_height = (int)$params->get('fblike_height',60);

			$fblike_show_faces = $params->get('fblike_show_faces','true');


			$html .= '
			<div class="golem_fblike_box golem_box" id="golem_fblike_box">
			<div id="fb-root"></div>
			<script>(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, "script", "facebook-jssdk"));</script>
			
		<div class="fb-like-box" data-href="'.$fblike_url.'" data-width="'.$width.'" data-height="'.$fblike_height.'" data-show-faces="'.$fblike_show_faces.'" data-stream="false" data-header="false" data-border-color="#E4EEF5"></div>
			
			
		</div>
		';
		}

		/*
		 ########################################
		#        TWITTER_FOLLOW_BUTTON	       #
		########################################
		*/
		if ($tw_follow_button_enable == 'yes') {
			//Get Twitter Parameters
			$tw_follow_button_user = $params->get('tw_follow_button_user','');

			$tw_follow_button_show_user = (int)$params->get('tw_follow_button_show_user','yes');
			$show_user = ($tw_follow_button_show_user == 'yes')? '':' data-show-screen-name="false"';

			$tw_follow_button_count = $params->get('tw_follow_button_count','true');

			$html .= '
			<div class="golem_twitter_follow_button golem_box" id="golem_twitter_follow_button">

			<a href="https://twitter.com/'.$tw_follow_button_user.'" class="twitter-follow-button" data-show-count="'.$tw_follow_button_count.'"'.$show_user.'>Follow</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

			</div>
			';
		}

		/*
		 ########################################
		#          PINTEREST_FOLLOW	       #
		########################################
		*/
		if ($pin_follow_button_enable == 'yes') {
			//Get Twitter Parameters
			$pin_follow_button_text = $params->get('pin_follow_button_text','');
			$pin_follow_button_url = $params->get('pin_follow_button_url','');

			$html .= '
			<div class="golem_pin_follow_button golem_box" id="golem_pin_follow_button">

			<span class="pinterest_icon">

			'.$pin_follow_button_text.'

			<a href="'.$pin_follow_button_url.'" target="_blank">
			<img src="modules/mod_golemsocialbox/images/pinterest.png" width="63" height="16" alt="Pinterest" />
			</a>

			</span>

			</div>
			';

		}

		/*
		 ########################################
		#          GOOGLE_PAGE_BADGE	       #
		########################################
		*/
		if ($gpbadge_enable == 'yes') {
			//Get FBLike Box Parameters
			$gpbadge_version = $params->get('gpbadge_version','');
			$gpbadge_page_id = $params->get('gpbadge_page_id','');

			$gpbadge_features = $params->get('gpbadge_features','');

			// Height: Small Badge: 69 ; Standar Badge: 131
			$gpheight = ($gpbadge_features == 'small')? 69:131;

			$gpbadge_add_js = $params->get('gpbadge_add_js','yes');


			$html .= '<div class="golem_gp_add_badge golem_box" id="golem_gp_add_badge">';

			if ($gpbadge_add_js == 'yes') {
				$html .= '<script type="text/javascript">
				window.___gcfg = {lang: \'en\'};
				(function()
				{var po = document.createElement("script");
				po.type = "text/javascript"; po.async = true;po.src = "https://apis.google.com/js/plusone.js";
				var s = document.getElementsByTagName("script")[0];
				s.parentNode.insertBefore(po, s);
			})();</script>';
			}

			$html .= '<g:plus href="https://plus.google.com/'.$gpbadge_page_id.'" rel="'.$gpbadge_version.'" width="'.$width.'" height="'.$gpheight.'" theme="light"></g:plus>

			</div>
			';
		}
		/*
		 ########################################
		#               RSS_FEED	           #
		########################################
		*/
		if ($rss_enable == 'yes') {
			//Get FBLike Box Parameters
			$rss_text = $params->get('rss_text','');
			$rss_url = $params->get('rss_url','');
			$rss_button_text = $params->get('rss_button_text','Feed RSS');

			$html .= '
			<div class="golem_rss_feed golem_box" id="golem_rss_feed">

			<span class="rss_icon">

			'.$rss_text.'

			<a href="'.$rss_url.'" title="Feed RSS" target="_blank">
			'.$rss_button_text.'
			<img src="modules/mod_golemsocialbox/images/rss.png" alt="Feed RSS" width="16" height="16" />
			</a>


			</span>

			</div>
			';
		}
		/*
		 ########################################
		*/


		$html .= '
		</div>
		';


		return $html;
	}

}
