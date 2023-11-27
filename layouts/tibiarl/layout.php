<?php
	$update_interval = 1;
	if (!isset($world_id)) {
		$world_id = 0;
		$world_name = $config['server']['serverName'];
	}
	
	$order = $_REQUEST['order'];
	if($order == 'level')
		$orderby = 'level';
	elseif($order == 'vocation')
		$orderby = 'vocation';
		
	if(empty($orderby))
		$orderby = 'name';
		$tmp_file_name = 'cache/whoisonline-'.$orderby.'-'.$world_id.'.tmp';

	if(file_exists($tmp_file_name) && filemtime($tmp_file_name) > (time() - $update_interval)){
		$tmp_file_content = explode(",", file_get_contents($tmp_file_name));
		$number_of_players_online = $tmp_file_content[0];
		$players_rows = $tmp_file_content[1];
	} else{
		$players_online_data = $SQL->query('SELECT * FROM players WHERE world_id = '.(int) $world_id.' AND online > 0 ORDER BY '.$orderby);$number_of_players_online = 0;
		foreach($players_online_data as $player){
			$number_of_players_online++;
			$acc = $SQL->query('SELECT * FROM '.$SQL->tableName('accounts').' WHERE '.$SQL->fieldName('id').' = '.$player['account_id'].'')->fetch();
			if(is_int($number_of_players_online / 2))
				$bgcolor = $config['site']['darkborder'];
		}
	}

	date_default_timezone_set('America/Sao_Paulo');

	$nextOpenTimes = array(
		'Sunday 21:00',
		'Monday 21:00',
		'Tuesday 21:00',
		'Wednesday 21:00',
		'Thursday 21:00',
		'Friday 21:00',
		'Saturday 21:00',
	);
	$daysOpen = array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat');

	function getNextCastleOpening($daysOpen, $nextOpenTimes)
	{
		if (in_array(date('D'), $daysOpen) && date('H') == '21' && date('M')) {
			return 0;
		}

		$openTimes = array();
		$currentTime = strtotime('now');
		foreach ($nextOpenTimes as $nextOpenTime) {
			$openTime = strtotime($nextOpenTime);
			if ($openTime < $currentTime) {
				continue;
			}

			array_push($openTimes, $openTime - $currentTime);
		}

		usort($openTimes, function($a, $b) {
		  return $a > $b;
		});

		return $openTimes[0];
	}

	$openTime = getNextCastleOpening($daysOpen, $nextOpenTimes);
	$elementId = 'NextCastleOpening';

	function anti_injection($sql){
		// remove palavras que contenham sintaxe sql
		$sql = preg_replace(sql_regcase("/(from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/"),"",$sql);
		$sql = trim($sql);//limpa espaços vazio
		$sql = strip_tags($sql);//tira tags html e php
		$sql = addslashes($sql);//Adiciona barras invertidas a uma string
		return $sql;
	}
?>
<html>
<head>
<link href="//use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
<meta charset="utf-8">
<title><?PHP echo $title ?></title>
<meta name="description" content="Tibia is a free massively multiplayer online role-playing game (MMORPG)">
<meta name="author" content="Felipe">
<meta http-equiv="content-language" content="en">
<meta name="keywords" content="free online rpg, free mmorpg, mmorpg, mmog, online role playing game, online multiplayer game, internet game, online rpg, rpg">
<!--ICON-->
<link rel="shortcut icon" href="<?PHP echo $layout_name; ?>/images/general/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?PHP echo $layout_name; ?>/images/general/favicon.ico" type="image/x-icon">
<!--CSS'S-->
<link href="<?PHP echo $layout_name; ?>/css/basic_d.css" rel="stylesheet" type="text/css">
<link href="<?PHP echo $layout_name; ?>/css/news.css" rel="stylesheet" type="text/css">
<!--JS--> 
<script id="float_discord" src="./layouts/tibiarl/js/discord_float_plugin.js?vs=7.0.3" data-id="855153116507930624&theme=dark" async></script>
<script id="twitter-wjs" src="<?PHP echo $layout_name; ?>/js/widgets.js"></script>
<link href="//fonts.googleapis.com/css?family=Fondamento" rel="stylesheet">
<script id="facebook-jssdk" async src="<?PHP echo $layout_name; ?>/js/all.js"></script>
<script type="text/javascript" src="<?PHP echo $layout_name; ?>/js/jquery.js"></script>
<script type="text/javascript" src="<?PHP echo $layout_name; ?>/js/ajaxcip.js"></script>
<script type="text/javascript" src="<?PHP echo $layout_name; ?>/js/generic.js"></script>
<script type="text/javascript" src="<?PHP echo $layout_name; ?>/js/create_character.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.25/angular.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script type="text/javascript" src="<?PHP echo $layout_name; ?>/js/clipboard.min.js"></script>
<script type="text/javascript">  
var loginStatus=0; 
loginStatus='<?PHP if($logged){ ?>true<?PHP }else{ ?>false<?PHP } ?>';  
var activeSubmenuItem='<?PHP echo $subtopic; ?>';  
var JS_DIR_IMAGES=0; 
JS_DIR_IMAGES='<?PHP echo $layout_name; ?>/images/';  
var JS_DIR_ACCOUNT=0; 
JS_DIR_ACCOUNT='';  
var g_FormName='';  
var g_FormField='';  
var g_Deactivated=false;
var FB_TryLogin = 0;
var FB_ForceReload = 0;
</script>
<script type="text/javascript">
  if(top.location != window.location) {
    top.location = self.location;
  }
</script>
<script type="text/javascript" src="<?PHP echo $layout_name; ?>/initialize.js"></script>

<link href="<?PHP echo $layout_name; ?>/css/facebook.css" rel="stylesheet" type="text/css">  
</head>

<body onBeforeUnLoad="SaveMenu();" onUnload="SaveMenu();" data-twttr-rendered="true">
<script type="text/javascript">
  window.fbAsyncInit = function() {
    FB.init({
      appId      : 497232093667125, // App ID
      status     : true,              // check login status
      cookie     : true,              // enable cookies to allow the server to access the session
      xfbml      : true               // parse XFBML
    });
    FB.Event.subscribe('auth.login', function() {
      var URLHelper = "?";
      if (window.location.search.replace("?", "").length > 0) {
        URLHelper = "&";
      }
      if (FB_TryLogin == 1) {
        window.location = window.location + URLHelper + "step=facebooktrylogin&wasreloaded=1";
      } else if (FB_TryLogin == 2) {
        window.location = window.location + URLHelper + "page=facebooktrylogin&wasreloaded=1";
      } else {
        window.location = window.location + URLHelper + "wasreloaded=1";
      }
    });
    FB.Event.subscribe('auth.logout', function(a_Response) {
      if (a_Response.status !== 'connected') {
        window.location.href=window.location.href;
      } else {
        /* nothing to do here*/
      }
    });
    FB.Event.subscribe('auth.statusChange', function(response) {
      if (FB_ForceReload == 1 && response.status == "connected") {
        var URLHelper = "?";
        if (window.location.search.replace("?", "").length > 0) {
          URLHelper = "&";
        }
        window.location = window.location + URLHelper + "step=facebooktrylogin&wasreloaded=1";
      }
    });
  };
  (function(d){
    var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
    if (d.getElementById(id)) {return;}
    js = d.createElement('script'); js.id = id; js.async = true;
    js.src = "//connect.facebook.net/en_US/all.js";
    ref.parentNode.insertBefore(js, ref);
  }(document));
</script>
<a name="top"></a>
<div id="MainHelper1">
<div id="MainHelper2">
<div id="ArtworkHelper1">
<div id="ArtworkHelper2">
<!--<div id="HeaderArtworkDiv" style="background-image:url(<?PHP echo $layout_name; ?>/images/header/background-artwork.jpg);"></div>-->
</div>
</div>
<div id="DeactivationContainer" onclick="DisableDeactivationContainer();"></div>

<div id="Bodycontainer">
<div id="ContentRow">
<div id="MenuColumn">
<div id="LeftArtwork">
	<a href="/?subtopic=latestnews">
		<img id="TibiaLogoArtworkTop" src="<?PHP echo $layout_name; ?>/images/header/tibia-logo-artwork-top.png" alt="logoartwork">
	</a>
</div>
<?PHP include "loginbox.php"; ?>
<?php include "downloadbox.php"; ?>
<div id='Menu'> 
	<div id='MenuTop' style='background-image:url(<?PHP echo "$layout_name"; ?>/images/general/box-top.gif);'></div> 
		<div id='news' class='menuitem'> 
			<span onClick="MenuItemAction('news')"> 
				<div class='MenuButton' style='background-image:url(<?PHP echo "$layout_name"; ?>/images/menu/button-background.gif);'> 
					<div onMouseOver='MouseOverMenuItem(this);' onMouseOut='MouseOutMenuItem(this);'><div class='Button' style='background-image:url(<?PHP echo "$layout_name"; ?>/images/menu/button-background-over.gif);'></div> 
						<span id='news_Lights' class='Lights'> 
							<div class='light_lu' style='background-image:url(<?PHP echo "$layout_name"; ?>/images/menu/green-light.gif);'></div> 
							<div class='light_ld' style='background-image:url(<?PHP echo "$layout_name"; ?>/images/menu/green-light.gif);'></div> 
							<div class='light_ru' style='background-image:url(<?PHP echo "$layout_name"; ?>/images/menu/green-light.gif);'></div> 
						</span> 
						<div id="news_Icon" class="Icon" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/icon-news.gif);"></div>
						<div id="community_Label" class="menufonts" style="background: transparent url(/layouts/tibiarl/images/menu/bg_menu.gif">News</div>	  
						<div id='news_Extend' class='Extend' style='background-image:url(<?PHP echo "$layout_name"; ?>/images/general/plus.gif);'></div> 
					</div> 
				</div> 
			</span> 
			<div id="news_Submenu" class="Submenu">
			<a href="?subtopic=latestnews">
				<div id="submenu_latestnews" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
					<div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
					<div id="ActiveSubmenuItemIcon_latestnews" class="ActiveSubmenuItemIcon" style="background-image: url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
					<div id="ActiveSubmenuItemLabel_latestnews" class="SubmenuitemLabel">Latest News</div>
					<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
				</div>
			</a>
			<a href="?subtopic=archive">
				<div id="submenu_archive" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
					<div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
					<div id="ActiveSubmenuItemIcon_archive" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
					<div id="ActiveSubmenuItemLabel_archive" class="SubmenuitemLabel">News Archive</div>
					<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
			</a>
			<a href="?subtopic=serverinfo">
				<div id="submenu_serverinfo" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
					<div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
					<div id="ActiveSubmenuItemIcon_serverinfo" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
					<div id="ActiveSubmenuItemLabel_serverinfo" class="SubmenuitemLabel" style='color:orange'>Server Info</div>
					<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
				</div>
			</a>
			<a href="?subtopic=changelog">
				<div id="submenu_serverinfo" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
					<div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
					<div id="ActiveSubmenuItemIcon_serverinfo" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
					<div id="ActiveSubmenuItemLabel_serverinfo" class="SubmenuitemLabel" style='color:red'>Changelog</div>
					<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
				</div>
			</a>
			<a href="?subtopic=tradeoff">
				<div id="submenu_tradeoff" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
                <div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
				<div id="ActiveSubmenuItemIcon_tradeoff" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
				<div id="ActiveSubmenuItemLabel_tradeoff" class="SubmenuitemLabel">Trade OFF <img src="/images/hot.gif"/></div>
				<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
		</div>
		</a>
		<a href="?subtopic=reset_system">
				<div id="submenu_resetsystem" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
                <div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
				<div id="ActiveSubmenuItemIcon_tradeoff" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
				<div id="ActiveSubmenuItemLabel_tradeoff" class="SubmenuitemLabel">Reset System <img src="/images/hott.gif"/></div>
				<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
		</div>
		</a>
	</div>
	</div>
	<div id="guilds" class="menuitem">
	<span onclick="MenuItemAction('guilds')">
	 <div class='MenuButton' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/button-background.gif);'> 
    <div onMouseOver='MouseOverMenuItem(this);' onMouseOut='MouseOutMenuItem(this);'><div class='Button' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/button-background-over.gif);'></div> 
      <span id="guilds_Lights" class="Lights">
        <div class='light_lu' style='background-image:url(<?PHP echo "$layout_name"; ?>/images/menu/green-light.gif);'></div> 
		<div class='light_ld' style='background-image:url(<?PHP echo "$layout_name"; ?>/images/menu/green-light.gif);'></div> 
		<div class='light_ru' style='background-image:url(<?PHP echo "$layout_name"; ?>/images/menu/green-light.gif);'></div> 
      </span>
          <div id="guilds_Icon" class="Icon" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/icon-wars.gif);"></div>
          <div id="guilds_Label" class="menufonts" style="background: transparent url(/layouts/tibiarl/images/menu/bg_menu.gif">Wars </div>	  
		<div id="guilds_Extend" class="Extend" style="background-image: url(<?PHP echo $layout_name; ?>/images/general/plus.gif);"></div>
		</div>
	</span>
  </div>	
				<div id="guilds_Submenu" class="Submenu">
					<a href="?subtopic=guilds">
						<div id="submenu_guilds" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
							<div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
							<div id="ActiveSubmenuItemIcon_guilds" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
							<div id="ActiveSubmenuItemLabel_guilds" class="SubmenuitemLabel">Guilds</div>
							<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
						</div>
					</a>
					<a href="?subtopic=warcastle">
						<div id="submenu_warcastle" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
							<div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
							<div id="ActiveSubmenuItemIcon_warcastle" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
							<div id="ActiveSubmenuItemLabel_warcastle" class="SubmenuitemLabel">War Castle</div>
							<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
						</div>
					</a>
					<a href="?subtopic=wars">
						<div id="submenu_warcastle" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
							<div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
							<div id="ActiveSubmenuItemIcon_warcastle" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
							<div id="ActiveSubmenuItemLabel_warcastle" class="SubmenuitemLabel">War System <img src="images/green.gif"/></div>
							<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
					</div>
					</a>
					<a href="?subtopic=exerciseweapon"> <!-- Exercise Weapon -->
						<div id="submenu_exerciseweapon" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
							<div id="ActiveSubmenuItemIcon_exerciseweapon" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
						</div>
					</a>
					<a href="?subtopic=founderaura"> <!-- Aura Exclusiva -->
						<div id="submenu_founderaura" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
							<div id="ActiveSubmenuItemIcon_founderaura" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
						</div>
					</a>
					<a href="?subtopic=founderoutfit"> <!-- Founder Outfit Exclusivo -->
						<div id="submenu_founderoutfit" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
							<div id="ActiveSubmenuItemIcon_founderoutfit" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
						</div>
					</a>
					<!--<a href="?subtopic=guildoutfit">
						<div id="submenu_guildoutfit" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
							<div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
							<div id="ActiveSubmenuItemIcon_guildoutfit" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
							<div id="ActiveSubmenuItemLabel_guildoutfit" class="SubmenuitemLabel">Comando !guildoutfit</div>
							<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
						</div>
					</a>
					<a href="?subtopic=guildbc">
						<div id="submenu_guildbc" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
							<div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
							<div id="ActiveSubmenuItemIcon_guildbc" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
							<div id="ActiveSubmenuItemLabel_guildbc" class="SubmenuitemLabel">Comando !guildbc <img src="/layouts/tibiarl/images/new.gif"></div>
							<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
						</div>
					</a>-->
				</div>
			</div>
			<div id="community" class="menuitem">
				<span onclick="MenuItemAction('community')">
  <div class='MenuButton' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/button-background.gif);'> 
    <div onMouseOver='MouseOverMenuItem(this);' onMouseOut='MouseOutMenuItem(this);'><div class='Button' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/button-background-over.gif);'></div> 
      <span id='community_Lights' class='Lights'> 
        <div class='light_lu' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/green-light.gif);'></div> 
        <div class='light_ld' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/green-light.gif);'></div> 
        <div class='light_ru' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/green-light.gif);'></div> 
      </span> 
											<div id="community_Icon" class="Icon" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/icon-community.gif);"></div>
                                            <div id="community_Label" class="menufonts" style="background: transparent url(/layouts/tibiarl/images/menu/bg_menu.gif">Community</div>	  
      <div id='community_Extend' class='Extend' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/plus.gif);'></div> 
 
    </div> 
  </div> 
  </div>
			<div id="community_Submenu" class="Submenu">
				<a href="?subtopic=characters">
					<div id="submenu_characters" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
						<div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
						<div id="ActiveSubmenuItemIcon_characters" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
						<div id="ActiveSubmenuItemLabel_characters" class="SubmenuitemLabel">Characters</div>
						<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
					</div>
				</a>
				<a href="?subtopic=whoisonline">
					<div id="submenu_whoisonline" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
						<div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
						<div id="ActiveSubmenuItemIcon_whoisonline" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
						<div id="ActiveSubmenuItemLabel_whoisonline" class="SubmenuitemLabel">Who is online</div>
						<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
					</div>
				</a>
				<a href="?subtopic=highscores">
					<div id="submenu_highscores" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
						<div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
						<div id="ActiveSubmenuItemIcon_highscores" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
						<div id="ActiveSubmenuItemLabel_highscores" class="SubmenuitemLabel">Highscores</div>
						<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
					</div>
				</a>
				<a href="?subtopic=killstatistics">
					<div id="submenu_killstatistics" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
						<div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
						<div id="ActiveSubmenuItemIcon_killstatistics" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
						<div id="ActiveSubmenuItemLabel_killstatistics" class="SubmenuitemLabel">Kill Statistics</div>
						<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
					</div>
				</a>
				<a href="?subtopic=houses">
					<div id="submenu_houses" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
						<div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
						<div id="ActiveSubmenuItemIcon_houses" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
						<div id="ActiveSubmenuItemLabel_houses" class="SubmenuitemLabel">Houses</div>
						<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
					</div>
				</a>
				<a href="?subtopic=castsystem">
					<div id="submenu_castsystem" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
						<div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
						<div id="ActiveSubmenuItemIcon_castsystem" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
						<div id="ActiveSubmenuItemLabel_castsystem" class="SubmenuitemLabel">Cast System  <img src="/images/hot.gif"/></div>
						<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
					</div>
				</a>
				<a href="?subtopic=mining">
					<div id="submenu_mining" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
						<div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
						<div id="ActiveSubmenuItemIcon_castsystem" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
						<div id="ActiveSubmenuItemLabel_castsystem" class="SubmenuitemLabel"><font color="orange">Mining System</font>  <img src="/images/hott.gif"></div>
						<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
					</div>
				</a>
				<a href='?subtopic=sellpoints'>
  					<div id='submenu_sellpoints' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'>
						<div class='LeftChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
						<div id='ActiveSubmenuItemIcon_show_history' class='ActiveSubmenuItemIcon' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);'></div>
						<div class='SubmenuitemLabel'><span style='color:#00fb54'><i class='fa fa-shopping-cart' aria-hidden='true'></i> Sellpoints <img src="images/hott.gif"/> </div>
						<div class='RightChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
  					</div>
				</a>
			</div>
		<div id="eventos" class="menuitem">
				<span onclick="MenuItemAction('eventos')">
  <div class='MenuButton' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/button-background.gif);'> 
    <div onMouseOver='MouseOverMenuItem(this);' onMouseOut='MouseOutMenuItem(this);'><div class='Button' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/button-background-over.gif);'></div> 
      <span id='eventos_Lights' class='Lights'> 
        <div class='light_lu' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/green-light.gif);'></div> 
        <div class='light_ld' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/green-light.gif);'></div> 
        <div class='light_ru' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/green-light.gif);'></div> 
      </span> 
		<div id="eventos_Icon" class="Icon" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/icon-events.gif);"></div>
         <div id="eventos_Label" class="menufonts" style="background: transparent url(/layouts/tibiarl/images/menu/bg_menu.gif">Eventos</div>	  
      <div id='eventos_Extend' class='Extend' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/plus.gif);'></div> 
 
    </div> 
  </div>
  </div>

<div id="eventos_Submenu" class="Submenu">
				<a href="?subtopic=dtt">
  					<div id="submenu_cpanel" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
						<div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
						<div id="ActiveSubmenuItemIcon_cpanel" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
						<div id="ActiveSubmenuItemLabel_cpanel" class="SubmenuitemLabel">Defend the Towers <img src="layouts/tibiarl/images/general/tower.gif" height="14" width="14"></div>
						<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
  					</div>
				</a>
				<a href="?subtopic=snowball">
  					<div id="submenu_cpanel" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
						<div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
						<div id="ActiveSubmenuItemIcon_cpanel" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
						<div id="ActiveSubmenuItemLabel_cpanel" class="SubmenuitemLabel">Snowball Event <img src="layouts/tibiarl/images/general/neve.png" height="14" width="14"></div>
						<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
  					</div>
				</a>
				<a href="?subtopic=ctf">
  					<div id="submenu_cpanel" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
						<div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
						<div id="ActiveSubmenuItemIcon_cpanel" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
						<div id="ActiveSubmenuItemLabel_cpanel" class="SubmenuitemLabel">Capture the Flag <img src="layouts/tibiarl/images/general/ctf.png" height="14" width="14"></div>
						<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
  					</div>
				</a>
				<a href="?subtopic=battlefield">
  					    <div id="submenu_cpanel" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
						<div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
						<div id="ActiveSubmenuItemIcon_cpanel" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
						<div id="ActiveSubmenuItemLabel_cpanel" class="SubmenuitemLabel">Battlefield Event <img src="layouts/tibiarl/images/general/team.png" height="14" width="14"></div>
						<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
  					</div>
		</div>
		</a>
		</div>
			<div id="account" class="menuitem">
				<span onClick="MenuItemAction('account')"> 
  <div class='MenuButton' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/button-background.gif);'> 
    <div onMouseOver='MouseOverMenuItem(this);' onMouseOut='MouseOutMenuItem(this);'><div class='Button' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/button-background-over.gif);'></div> 
      <span id='account_Lights' class='Lights'> 
        <div class='light_lu' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/green-light.gif);'></div> 
        <div class='light_ld' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/green-light.gif);'></div> 
        <div class='light_ru' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/green-light.gif);'></div> 
      </span> 
      										<div id="account_Icon" class="Icon" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/icon-account.gif);"></div>
      										<div id="community_Label" class="menufonts" style="background: transparent url(/layouts/tibiarl/images/menu/bg_menu.gif">Account</div>	  
      <div id='account_Extend' class='Extend' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/plus.gif);'></div> 
    </div> 
  </div> 
			<div id="account_Submenu" class="Submenu">
			<?PHP
			if($group_id_of_acc_logged >= $config['site']['access_admin_panel']){
			?>
				<a href="?subtopic=cpanel">
  					<div id="submenu_cpanel" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
						<div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
						<div id="ActiveSubmenuItemIcon_cpanel" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
						<div id="ActiveSubmenuItemLabel_cpanel" class="SubmenuitemLabel"><font color=red>Admin Panel</font></div>
						<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
  					</div>
				</a>
			<?PHP } ?>
				<a href="?subtopic=accountmanagement">
  					<div id="submenu_accountmanagement" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
						<div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
						<div id="ActiveSubmenuItemIcon_accountmanagement" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
						<div id="ActiveSubmenuItemLabel_accountmanagement" class="SubmenuitemLabel">Account Management</div>
						<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
  					</div>
				</a>
				<a href="?subtopic=createaccount">
  					<div id="submenu_createaccount" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
    					<div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
						<div id="ActiveSubmenuItemIcon_createaccount" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
						<div id="ActiveSubmenuItemLabel_createaccount" class="SubmenuitemLabel">Create Account</div>
						<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
  					</div>
				</a>
				<?PHP
				if($config['site']['download_page']){
				?>
				<a href="?subtopic=download">
  					<div id="submenu_download" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
						<div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
						<div id="ActiveSubmenuItemIcon_download" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
						<div id="ActiveSubmenuItemLabel_download" class="SubmenuitemLabel"><font color="#00FFFF">Download Client</font></div>
						<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
  					</div>
				</a>
				<?PHP } ?>
				<a href="?subtopic=lostaccount">
  					<div id="submenu_lostaccount" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
						<div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
						<div id="ActiveSubmenuItemIcon_lostaccount" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
						<div id="ActiveSubmenuItemLabel_lostaccount" class="SubmenuitemLabel">Lost Account?</div>
						<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
  					</div>
				</a>
			</div>
		</div>
			<div id="team" class="menuitem">
				<span onclick="MenuItemAction('team')">
  <div class='MenuButton' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/button-background.gif);'> 
    <div onMouseOver='MouseOverMenuItem(this);' onMouseOut='MouseOutMenuItem(this);'><div class='Button' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/button-background-over.gif);'></div> 
      <span id='team_Lights' class='Lights'> 
        <div class='light_lu' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/green-light.gif);'></div> 
        <div class='light_ld' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/green-light.gif);'></div> 
        <div class='light_ru' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/green-light.gif);'></div> 
      </span> 
      										<div id="support_Icon" class="Icon" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/icon-support.gif);"></div>
      										<div id="community_Label" class="menufonts" style="background: transparent url(/layouts/tibiarl/images/menu/bg_menu.gif">Support</div>	  
      <div id='team_Extend' class='Extend' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/plus.gif);'></div> 
    </div> 
  </div> 				
			
			<div id="team_Submenu" class="Submenu">
				<a href="?subtopic=tibiarules">
  					<div id="submenu_tibiarules" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
						<div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
						<div id="ActiveSubmenuItemIcon_tibiarules" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
						<div id="ActiveSubmenuItemLabel_tibiarules" class="SubmenuitemLabel">Tibia Rules</div>
						<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
  					</div>
				</a>
				<a href="?subtopic=team">
  					<div id="submenu_team" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
						<div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
						<div id="ActiveSubmenuItemIcon_team" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
						<div id="ActiveSubmenuItemLabel_team" class="SubmenuitemLabel">Support List</div>
						<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
  					</div>
				</a>
			</div>
		</div>
		<?PHP
			if($config['site']['shop_system']){
		?>
			<div id="shops" class="menuitem">
				<span onclick="MenuItemAction('shops')">
  <div class='MenuButton' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/button-background.gif);'> 
    <div onMouseOver='MouseOverMenuItem(this);' onMouseOut='MouseOutMenuItem(this);'><div class='Button' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/button-background-over.gif);'></div> 
      <span id='shops_Lights' class='Lights'> 
        <div class='light_lu' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/green-light.gif);'></div> 
        <div class='light_ld' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/green-light.gif);'></div> 
        <div class='light_ru' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/green-light.gif);'></div> 
      </span> 
      										<div id="shop_Icon" class="Icon" style="background-image:url(<?php echo $layout_name; ?>/images/global/menu/icon-shops.gif);"></div>
      										<div id="community_Label" class="menufonts" style="background: transparent url(/layouts/tibiarl/images/menu/bg_menu.gif">Shop</div>	  
      <div id='shops_Extend' class='Extend' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/plus.gif);'></div> 
    </div> 
  </div> 
			<div id="shops_Submenu" class="Submenu">
				<a href='?subtopic=accountmanagement'>
  					<div id='submenu_donate' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'>
    					<div class='LeftChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
						<div id='ActiveSubmenuItemIcon_donate' class='ActiveSubmenuItemIcon' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);'></div>
						<div class='SubmenuitemLabel'><span style='color:yellow'><i class='fa fa-credit-card' aria-hidden='true'></i> Donatar</span></div>
						<div class='RightChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
  					</div>
				</a>
				<a href='?subtopic=shopsystem'>
  					<div id='submenu_shopsystem' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'>
						<div class='LeftChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
						<div id='ActiveSubmenuItemIcon_shopsystem' class='ActiveSubmenuItemIcon' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);'></div>
						<div class='SubmenuitemLabel'><span style='color:#00fb54'><i class='fa fa-shopping-cart' aria-hidden='true'></i> Shop Offer</span></div>
						<div class='RightChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
  					</div>
				</a>
				<a href='?subtopic=shopguild'>
  					<div id='submenu_shopguild' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'>
						<div class='LeftChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
						<div id='ActiveSubmenuItemIcon_shopguild' class='ActiveSubmenuItemIcon' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);'></div>
						<div class='SubmenuitemLabel'><span style='color:orange'><i class="fa fa-users" aria-hidden="true"></i> Shop Guild</span></div>
						<div class='RightChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
  					</div>
				</a>
				<a href="?subtopic=pagconcluido"> <!-- PagSeguro Pagamento Aprovado -->
					<div id="submenu_pagconcluido" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
						<div id="ActiveSubmenuItemIcon_pagconcluido" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
					</div>
				</a>
				<a href="?subtopic=paypalcancel"> <!-- Paypal Pagamento Cancelado -->
					<div id="submenu_paypalcancel" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
						<div id="ActiveSubmenuItemIcon_paypalcancel" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
					</div>
				</a>
				<a href="?subtopic=paypalconcluido"> <!-- Paypal Pagamento Aprovado -->
					<div id="submenu_paypalconcluido" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
						<div id="ActiveSubmenuItemIcon_paypalconcluido" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
					</div>
				</a>
				<?PHP
				if($logged){
				?>
				<a href='?subtopic=shopsystem&action=show_history'>
  					<div id='submenu_show_history' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'>
						<div class='LeftChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
						<div id='ActiveSubmenuItemIcon_show_history' class='ActiveSubmenuItemIcon' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);'></div>
						<div class='SubmenuitemLabel'>Shop History</div>
						<div class='RightChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
  					</div>
				</a>
				<a href='?subtopic=shopguild&action=show_history'>
  					<div id='submenu_show_history' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'>
						<div class='LeftChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
						<div id='ActiveSubmenuItemIcon_show_history' class='ActiveSubmenuItemIcon' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);'></div>
						<div class='SubmenuitemLabel'>Shop Guild History</div>
						<div class='RightChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
  					</div>
				</a>
				<?PHP } ?>
				<?PHP
				if($group_id_of_acc_logged >= $config['site']['access_admin_panel']){
				?>
				<a href='?subtopic=shopadmin'>
  					<div id='submenu_shopadmin' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'>
						<div class='LeftChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
						<div id='ActiveSubmenuItemIcon_shopadmin' class='ActiveSubmenuItemIcon' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);'></div>
						<div class='SubmenuitemLabel'><font color=0099FF>Shop Admin</font></div>
						<div class='RightChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
  					</div>
				</a>
				<a href='?subtopic=shopguildadmin'>
  					<div id='submenu_shopguildadmin' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'>
						<div class='LeftChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
						<div id='ActiveSubmenuItemIcon_shopguildadmin' class='ActiveSubmenuItemIcon' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);'></div>
						<div class='SubmenuitemLabel'><font color=#EB8305>ShopGuild Admin</font></div>
						<div class='RightChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
  					</div>
				</a>
				<?PHP } ?>
				</span>
			</div>
		</div>
		<?PHP } ?>
		<div id="MenuBottom" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/box-bottom.gif);"></div>
		</div>
		<script type="text/javascript">InitializePage();</script></div>
				<div id="ContentColumn">
					<div id="Content" class="Content">
						<div id="ContentHelper">
										<style type="text/css" media="all">
						/*CSS BY Leandro*/
						#clockcontainer {
							position: absolute;
							display: block;
							margin-left: 30%;
							top: -150px;
						}
						#clockdiv {
							font-family: sans-serif;
							color: #5a2800;
							font-weight: 100;
							text-align: center;
							font-size: 18px;
							background: rgb(209, 190, 167);
							padding: 8px;
							border-radius: 5px;
							border: 3px solid #5f4d41;
							margin: 0 auto;
							display: block;
							width: 337px;
						}
						
						#clockdiv > div {
							padding: 5px 10px;
							background: #f1e0c6;
							display: inline-block;
							border: 2px solid #5f4d41;
							border-radius: 5px;
						}

						#clockdiv div > span {
							padding: 6px 6px;
							border-radius: 3px;
							background: #d4c0a1;
							display: inline-block;
							font-size: 34px;
							width: 40px;
						}

						.smalltext {
							padding-top: 5px;
							font-size: 14px;
						}
}
</style>
<?php if($config['site']['clockactive'] == true)
{ 
?>
	<div id="clockcontainer">
						<div id="clockdiv">
						<div class="" style="background: #540909;width: 98%;margin-left: -7px;margin-bottom: 5px;border: none !important;border-radius: 0 !important;">
								<table border="0">
									<tbody>
										<tr>
											<td style="text-align: center;font-weight: bold;width: 319px;">
												<font color="white"><img alt="Cuckoo Clock.gif" src="https://www.tibiawiki.com.br/images/archive/c/c8/20121020213104%21Cuckoo_Clock.gif" width="32" height="32" style="position: absolute;margin-left: -43px;margin-top: -7px;">Tempo para Abertura<img alt="Cuckoo Clock.gif" src="https://www.tibiawiki.com.br/images/archive/c/c8/20121020213104%21Cuckoo_Clock.gif" width="32" height="32" style="position: absolute;margin-left: 10px;margin-top: -7px;"></font>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						  <div>
							<span class="days"></span>
							<div class="smalltext">Dias</div>
						  </div>
						  <div>
							<span class="hours"></span>
							<div class="smalltext">Horas</div>
						  </div>
						  <div>
							<span class="minutes"></span>
							<div class="smalltext">Minutos</div>
						  </div>
						  <div>
							<span class="seconds"></span>
							<div class="smalltext">Segundos</div>
						  </div>
						</div>
					</div>
					
<?php } ?>
	<script>
	function getTimeRemaining(a){var b=Date.parse(a)-Date.parse(new Date),c=Math.floor(b/1e3%60),d=Math.floor(b/1e3/60%60),e=Math.floor(b/36e5%24),f=Math.floor(b/864e5);return{total:b,days:f,hours:e,minutes:d,seconds:c}}function initializeClock(a,b){function h(){var a=getTimeRemaining(b);d.innerHTML=a.days,e.innerHTML=("0"+a.hours).slice(-2),f.innerHTML=("0"+a.minutes).slice(-2),g.innerHTML=("0"+a.seconds).slice(-2),a.total<=0&&clearInterval(i)}var c=document.getElementById(a),d=c.querySelector(".days"),e=c.querySelector(".hours"),f=c.querySelector(".minutes"),g=c.querySelector(".seconds");h();var i=setInterval(h,1e3)}var deadline="November 1 2021 17:00:00";initializeClock("clockdiv",deadline);

	</script>
	
<script type="text/javascript" src="<?PHP echo $layout_name; ?>/newsticker.js"></script>
				<?PHP echo $news_content; ?>
  				<div id="news" class="Box">
    				<div class="Corner-tl" style="background-image:url(<?PHP echo $layout_name; ?>/images/content/corner-tl.gif);"></div>
					<div class="Corner-tr" style="background-image:url(<?PHP echo $layout_name; ?>/images/content/corner-tr.gif);"></div>
					<div class="Border_1" style="background-image:url(<?PHP echo $layout_name; ?>/images/content/border-1.gif);"></div>
					<div class="BorderTitleText" style="background-image:url(<?PHP echo $layout_name; ?>/images/content/title-background-green.gif);"></div>
    				<img id="ContentBoxHeadline" class="Title" src="pages/headline.php?txt=<?PHP echo ucwords(str_replace('_', ' ', strtolower($subtopic))); ?>" alt="Contentbox headline">
    				<div class="Border_2">
      					<div class="Border_3">
        					<div class="BoxContent" style="background-image:url(<?PHP echo $layout_name; ?>/images/content/scroll.gif);">
								<?PHP echo $main_content; ?>
        					</div>
      					</div>
    				</div>
					<div class="Border_1" style="background-image:url(<?PHP echo $layout_name; ?>/images/content/border-1.gif);"></div>
					<div class="CornerWrapper-b"><div class="Corner-bl" style="background-image:url(<?PHP echo $layout_name; ?>/images/content/corner-bl.gif);"></div></div>
					<div class="CornerWrapper-b"><div class="Corner-br" style="background-image:url(<?PHP echo $layout_name; ?>/images/content/corner-br.gif);"></div></div>
  				</div>
              	<div id="ThemeboxesColumn">
                	<div id="DeactivationContainerThemebox" onclick="DisableDeactivationContainer();"></div>
                	<div id="RightArtwork">
                  		<img id="Monster" src="images/monster/King_Zelos.gif" onclick="window.location = #" alt="Monster of the Week">
                  		<img id="PedestalAndOnline" src="<?PHP echo $layout_name; ?>/images/header/pedestal-and-online.gif" alt="Monster Pedestal and Players Online Box">
                  		<div id="PlayersOnline" onClick="window.location='?subtopic=whoisonline'">
							<?PHP
							$existe = $SQL->query("SELECT COUNT(*) as online FROM `players` WHERE `online` = 1")->fetch();
								echo '<b><font color="#ff6633">[ '.$existe['online'] . ' ]</font></b>';
								echo '<br><b><font color="green">ONLINE</b><br></font>';
							?>
		  				</div>
        			</div>
                	<div id="Themeboxes">
              <?php
                $skills = $SQL->query('SELECT * FROM players WHERE deleted = 0 AND group_id = 1 AND world_id = 0 AND account_id != 3 ORDER BY level DESC LIMIT 10');
              ?>
			  			  
<style type="text/css" media="all">
  .Toplevelbax {
    top: -1px;
      position: relative;
	margin-left: -15px;
    margin-bottom: -10px;
    width: 300px;
    height: 440px;
  }
  
  .top_level_x
{
	position:absolute;
	top:15px;
	left:57px;
	height:290px;
	width:270px;
	z-index:20;
	text-align:center;
	padding-top:8px;
	font-family:Tahoma,Geneva,sans-serif;
	font-size:9.2pt;
	color:#fc3;
	font-weight:700;
	text-align:right;
	text-decoration:inherit;
	text-shadow:.1em .1em #333
}

a.topfonte
{
	font-family:Verdana,Arial,Helvetica;
	font-size:10px;
	color:#fc3;
	text-decoration:none
}

a:hover.topfonte
{
	font-family:Verdana,Arial,Helvetica;
	font-size:10px;
	color:#CCC;
	text-decoration:none
}

</style>
<div id="Topbar" class="Toplevelbax" style="background-image:url(<?PHP echo $layout_name; ?>/images/header/toplevel.png);">
                <div class="top_level_x">
 <?php
	$limitt = 10;
	$skills = $SQL->query("SELECT name, level, experience, reset, looktype, lookaddons, lookhead, lookbody, looklegs, lookfeet FROM players WHERE group_id < 2 AND name != 'Account Manager' ORDER BY reset DESC LIMIT 10");

	$number_of_rows = 0;

		foreach($skills as $skillss) {
    echo '<div align="left">
		<a href="?subtopic=characters&name='.$skillss['name'].'" class="topfonte"  class="topfont"><font color="#FFD700">&nbsp;&nbsp;&nbsp;&nbsp;'.$a.' - </font>'.$skillss['name'].'<br>
		           <small><font color="white">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Level: ('.$skillss['level']  . ')  - Resets: '. (($skillss["reset"]) > 0 ? $skillss["reset"]  :  0) .'</font></small><br> 
		  <img style="margin-top: -35px; margin-left: -5px; position:  relative;"/>
		  
        </a>

        <img src="./outfit.php?id='.$skillss['looktype'].'&addons='.$skillss['lookaddons'].'&head='.$skillss['lookhead'].'&body='.$skillss['lookbody'].'&legs='.$skillss['looklegs'].'&feet='.$skillss['lookfeet'].'" width="64" height="64" style="width: 64px; height: 64px; position: absolute; background-position: 0 0; background-repeat: no-repeat; left: -57px; margin-top: -70px;">

    </div>';
    $number_of_rows++;

  	}

?>
</div>	
</div>		
</div><div id="Topbar" class="Toplevelbox" style="background-image:url(<?PHP echo $layout_name; ?>/images/themeboxes/top_level_top.gif);">
								<div style="background:url(<?PHP echo $layout_name; ?>/images/themeboxes/castle/swords.gif);width: 32px;height: 32px;position: relative;margin-left: 10px;margin-top: -70px;"></div>
								<span class="topleveltext">War Castle</span>
								<div id="RankingBox" class="Themebox" style="height: auto;display: table;margin-top: 27px;">
									<div id="menusrank"></div>
									<table style="font-family: sans-serif; font-size: 12px; height: auto; display: block; background-image:url(<?PHP echo $layout_name; ?>/images/themeboxes/castle/box-bg.gif); margin-bottom: 5px; margin-top: -6px">	
										<tr>
											<td style="">
												<div class="warText">
													<?php
								$castle = $SQL->query("SELECT * FROM `real_castle` ORDER BY `guild_id` DESC LIMIT 1")->fetchAll();
								foreach($castle as $castles)
								{
									setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
									date_default_timezone_set('America/Sao_Paulo');
									$g_id = $SQL->query("SELECT * FROM `guilds` WHERE `id` = ".$castles["guild_id"]."")->fetch();
									echo '<center>
									<a href="?subtopic=guilds&amp;action=show&amp;guild='.$castles["guild_id"].'">
										<div id="realcastleimg"><img src="guild_image.php?id='.$castles['guild_id'].'" width="64" height="64"></div>
										<div id="rtext">
											<a class="realcastlelink" href="?subtopic=guilds&amp;action=show&amp;guild='.$castles["guild_id"].'">'.$castles["guild_name"].'</a>
											<span class="guildtexthoras"><br><br>Próxima batalha:<br> '.$castles["tomorrow"].' às 21:00</span>
										</div>
									</a></center>';
								}
							?>		

													<br>
													
												</div>
											</td>
										</tr> 
									</table>
									<div class="Bottom3" style="background-image:url(<?PHP echo $layout_name; ?>/images/themeboxes/castle/box-bottom.gif);"></div>
								</div>
							</div>
			  
							<!-- current poll theme box -->
							<?PHP
								$time = time();
								$viewpoll = $SQL->query("SELECT * FROM `z_polls` where end > '$time' ORDER BY id DESC LIMIT 1");
								foreach($viewpoll as $p){
								$polls .= '<center>'.$p['question'].'</center>';
									if(isset($p['id'])){
									echo '<div id="CurrentPollBox" class="Themebox" style="background-image:url('.$layout_name.'/images/themeboxes/current-poll/currentpollbox.gif);">
									<div id="CurrentPollText">'.$polls.'</div>
									<a class="ThemeboxButton" href="index.php?subtopic=polls&id= '.$p['id'].'" onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif);"><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);"></div>
										<div class="ButtonText" style="background-image:url('.$layout_name.'/images/buttons/_sbutton_votenow.gif);"></div>
									</a>
									<div class="Bottom" style="background-image:url('.$layout_name.'/images/general/box-bottom.gif);"></div>
									</div>';
									}
								}
						?>

                	</div>
              	</div>
            </div>
		</div>
        <div id="Footer">
        	Copyright by CipSoft GmbH. All rights reserved.<br>
        </div>
	</div>
</div>
</div>
</div>
</div>
  
  <script type="text/javascript">
    // disable all control elements which are not part of the content container element
    if (g_Deactivated == true) {
      document.getElementById('LoginButtonContainer').style.zIndex = "1";
      document.getElementById('DeactivationContainer').style.display = "block";
      document.getElementById('DeactivationContainer').style.zIndex = "50";
      document.getElementById('DeactivationContainerThemebox').style.display = "block";
      document.getElementById('Monster').style.cursor = "auto";
      document.getElementById('PlayersOnline').style.cursor = "auto";
      document.getElementById('ThemeboxesColumn').style.opacity = "0.30";
      document.getElementById('ThemeboxesColumn').style.MozOpacity = "0.30";
      document.getElementById('ThemeboxesColumn').filters.alpha.opacity = "0.75";
      document.getElementById('ThemeboxesColumn').style.filter = "alpha(opacity=50); opacity: 0.30";
      document.getElementById('Monster').setAttribute("onclick", "")
      document.getElementById('PlayersOnline').setAttribute("onclick", "")
    }
  </script>
  <script> $(document).ready(function() {
		  var ajaxCall = function() {
			  $.post("count.php", function( data ) { $( "#PlayersOnline" ).html( data ); });
		  };
		  setInterval(ajaxCall, 3000);
		}); 
	</script>
  	<div id="HelperDivContainer" style="background-image: url(<?PHP echo $layout_name; ?>/images/content/scroll.gif);">
  		<div class="HelperDivArrow" style="background-image: url(<?PHP echo $layout_name; ?>/images/content/helper-div-arrow.png);"></div>
  		<div id="HelperDivHeadline"></div>
  		<div id="HelperDivText"></div>
 		<center>
  			<img class="Ornament" src="<?PHP echo $layout_name; ?>/images/content/ornament.gif">
  		</center>
  	<br>
	</div>
</body>
</html>