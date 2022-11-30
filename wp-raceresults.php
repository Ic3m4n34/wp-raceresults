<?php
/**
 * Plugin Name: WP Race Results
 * Plugin URI: https://github.com/Ic3m4n34/wp-raceresults
 * Description: Einbinden von RaceResult, Ergebnisse : [dbr3rrinclude_results raceid="xxxxx" lang="de" cookie-message="Cookies akzeptieren"], Teilnehmer: [dbr3rrinclude_participants raceid="xxxxx" lang="de" cookie-message="Cookies akzeptieren"], Anmeldung: [dbr3rrinclude_registration raceid="xxxxx" lang="de" key="xxxxxxxxxxx"]. Optionale Parameter sind color1 und color2 Beispiel: [dbr3rrinclude_results raceid="xxxxx" lang="de" color1="#00305B" color2="#79BFFF" cookie-message="Cookies akzeptieren"]
 * Author: Dittberner & Strokosch GbR, race result AG / modified by Nico Meyer
 * Version: 1.0.3
*/



//  adds support for a "simplenote" shortcode
add_shortcode( 'dbr3rrinclude_results','display_results' );
add_shortcode( 'dbr3rrinclude_participants','display_participants' );
add_shortcode( 'dbr3rrinclude_registration','display_registration' );

function display_results( $atts ) {
  $cookie_set = false;
	$external_media = null;
	if (isset($_COOKIE['borlabs-cookie'])) {
			$cookie = json_decode(stripslashes($_COOKIE['borlabs-cookie']), true);
			$external_media = $cookie['consents']['external-media'];
			// check if external_media array includes 'raceresult
			if (in_array('raceresult', $external_media)) {
				$cookie_set = true;
			}
	}

	extract(  $atts  );
	$raceid = ($atts['raceid']);
	$lang = ($atts['lang']);
	$color1 = ($atts['color1']);
	$color2 = ($atts['color2']);
  $cookie_message = ($atts['cookie-message']);
  	$returnstr = '';
  	if($color1 != "" && $color2 != ""){
	  	$returnstr.='
	<style>
       .RRPublish div.TileHead { background-color:'.$color1.' !important}
       .RRPublish div.MainDiv { padding: 1% 0 1% 0 !important}
       .RRPublish div.ListNav { background-color:'.$color1.' !important; color:#FFFFFF !important}
       .RRPublish a.aShowAll { color:'.$color1.' !important}
       .RRPublish tr.Hover:hover { background-color:'.$color2.' !important; }
       .RRPublish select { background-color:'.$color1.' !important; }
       .RRPublish table.MainTable td { white-space:normal !important }
	</style>';
	  	}
   $returnstr.='
   <div id="divRRPublish" class="RRPublish"></div>
	<script type="text/javascript" src="//my.raceresult.com/RRPublish/load.js.php?lang='.$lang.'"></script>
	<script type="text/javascript">
	<!--
	        var rrp=new RRPublish(document.getElementById("divRRPublish"), '.$raceid.', "results");
	-->
	</script>

	';
		if ($cookie_set) {
			return  $returnstr;
		}
		return $cookie_message;
}
function display_participants( $atts ) {
	$cookie_set = false;
	$external_media = null;
	if (isset($_COOKIE['borlabs-cookie'])) {
			$cookie = json_decode(stripslashes($_COOKIE['borlabs-cookie']), true);
			$external_media = $cookie['consents']['external-media'];
			// check if external_media array includes 'raceresult
			if (in_array('raceresult', $external_media)) {
				$cookie_set = true;
			}
	}

	extract(  $atts  );
	$raceid = ($atts['raceid']);
	$lang = ($atts['lang']);
	$color1 = ($atts['color1']);
	$color2 = ($atts['color2']);
	$cookie_message = ($atts['cookie-message']);
  	$returnstr = '';
  	if($color1 != "" && $color2 != ""){
	  	$returnstr.='
	<style>
       .RRPublish div.TileHead { background-color:'.$color1.' !important}
       .RRPublish div.MainDiv { padding: 1% 0 1% 0 !important}
       .RRPublish div.ListNav { background-color:'.$color1.' !important; color:#FFFFFF !important}
       .RRPublish a.aShowAll { color:'.$color1.' !important}
       .RRPublish tr.Hover:hover { background-color:'.$color2.' !important; }
       .RRPublish select { background-color:'.$color1.' !important; }
       .RRPublish table.MainTable td { white-space:normal !important }
	</style>';
	  	}
   $returnstr.='
		<div id="divRRPublish" class="RRPublish"></div>
		<script type="text/javascript" src="//my.raceresult.com/RRPublish/load.js.php?lang='.$lang.'"></script>
		<script type="text/javascript">
		<!--
						var rrp=new RRPublish(document.getElementById("divRRPublish"), '.$raceid.', "participants");
		-->
		</script>
	';
		if ($cookie_set) {
			return  $returnstr;
		}
		return $cookie_message;
}
function display_registration( $atts ) {
	$cookie_set = false;
	$external_media = null;
	if (isset($_COOKIE['borlabs-cookie'])) {
			$cookie = json_decode(stripslashes($_COOKIE['borlabs-cookie']), true);
			$external_media = $cookie['consents']['external-media'];
			// check if external_media array includes 'raceresult
			if (in_array('raceresult', $external_media)) {
				$cookie_set = true;
			}
	}

	extract(  $atts  );
	$raceid = ($atts['raceid']);
	$lang = ($atts['lang']);
	$key = ($atts['key']);
	$color1 = ($atts['color1']);
	$color2 = ($atts['color2']);
  	$returnstr = '';
  	if($color1 != "" && $color2 != ""){
	  	$returnstr.='
	<style>
       .RRPublish div.TileHead { background-color:'.$color1.' !important}
       .RRPublish div.MainDiv { padding: 1% 0 1% 0 !important}
       .RRPublish div.ListNav { background-color:'.$color1.' !important; color:#FFFFFF !important}
       .RRPublish a.aShowAll { color:'.$color1.' !important}
       .RRPublish tr.Hover:hover { background-color:'.$color2.' !important; }
       .RRPublish select { background-color:'.$color1.' !important; }
       .RRPublish table.MainTable td { white-space:normal !important }
	</style>';
	  	}
   $returnstr.='
		<script type="text/javascript">
<!--
        var RRReg_eventid='.$raceid.';
        var RRReg_key="'.$key.'";
        var RRReg_PreferredRegistration="single";
        var RRReg_PreferredContest=0;
        var RRReg_server="https://events2.raceresult.com";
-->
</script>
<script type="text/javascript" src="https://events2.raceresult.com/registration/init.js?lang='.$lang.'"></script>

	';
		if ($cookie_set) {
			return  $returnstr;
		}
		return $cookie_message;
}


?>