<?PHP
# Account Maker Config
$config['site']['serverPath'] = "C:/Users/jonas/Desktop/fusionking/";
$config['site']['useServerConfigCache'] = false;
$config['site']['worlds'] = array(0 => 'King-Baiak');
$towns_list[0] = array(1 => 'Principal');
$config['site']['newchar_towns2'] = 1; // -- AQUI COLOQUE A CITY EM QUE O PERSONAGEM IRÁ NASCER
$config['site']['google_captcha_key'] = "6Lc0QcwZAAAAAJUMNfZW0wcd9evGVtF2O9TT_Kuy";
$config['site']['google_captcha_secret'] = "6Lc0QcwZAAAAANDybSAOGRQekfM9rlrOKa_-rKTb";
$config['site']['google_captcha_enabled'] = false;
$config['site']['google_captcha_host'] =  'king-baiak.com.br';

#Clock
$config['site']['clockactive'] = true;
$config['site']['ThemeBoxes'] = true;
$config['site']['PlayerThemer'] = true;
$config['site']['CastleWarBox'] = true;
$config['site']['GuildsThemer'] = true;

$config['site']['outfit_images_url'] = '/outfit.php';
$config['site']['item_images_url'] = '/images/items/';
$config['site']['item_images_extension'] = '.gif';
$config['site']['flag_images_url'] = '/images/flags/';
$config['site']['flag_images_extension'] = '.png';
$config['site']['players_group_id_block'] = 3;
$config['site']['limitDeath'] = 8;
$config['site']['levelVideo'] = 100;

# PAGE: donate.php
$config['site']['usePagseguro'] = false; //true show / false hide
$config['site']['usePaypal'] = false;	//true show / false hide
$config['site']['useDeposit'] = false;	//true show / false hide
$config['site']['useZaypay'] = false;	//true show / false hide
$config['site']['useContenidopago'] = false;	//true show / false hide
$config['site']['useOnebip'] = false;	//true show / false hide

# Pagseguro config By IVENSPONTES
$config['pagSeguro']['email'] = "braga101079@gmail.com"; //Email Pagseguro
$config['pagSeguro']['token'] = "50f4a08c-27fe-4c62-89b4-d29891b4a849e0741afa405893c57fbdf29a0bb1931cd782-1a9f-49e5-8f44-e83374e59e19"; // TOKEN
$config['pagSeguro']['urlRedirect'] = 'http://king-fusion.com.br/index.php?subtopic=pagconcluido'; //turn off redirect and notifications in pagseguro.com.br
$config['pagSeguro']['urlNotification'] = 'http://king-fusion.com.br/retpagseguro.php'; //your return location

$config['pagSeguro']['productName'] = 'Premium Points';
$config['pagSeguro']['productValue'] = 1.00; 	// 1.50 = R$ 1,50 etc...
$config['pagSeguro']['doublePoints'] = true; 	## Double points - true is on / false is off

$config['pagSeguro']['host'] = 'localhost';		## YOUR HOST
$config['pagSeguro']['database'] = '';	## DATABASE
$config['pagSeguro']['databaseUser'] = '';	## USER
$config['pagSeguro']['databasePass'] = '';		## PASSWORD

# Create Account Options
$config['site']['one_email'] = true;
$config['site']['create_account_verify_mail'] = false;
$config['site']['verify_code'] = false;
$config['site']['email_days_to_change'] = 3;
$config['site']['newaccount_premdays'] = 0;
$config['site']['send_register_email'] = false;

# Create Character Options
$config['site']['newchar_vocations'][0] = array(1 => 'Sorcerer Sample', 2 => 'Druid Sample', 3 => 'Paladin Sample', 4 => 'Knight Sample');
$config['site']['newchar_towns'][0] = array(9);
$config['site']['max_players_per_account'] = 10;


# Emails Config
$config['site']['send_emails'] = true;
$config['site']['mail_address'] = "xxx@xxxx.com.br";
$config['site']['smtp_enabled'] = true;
$config['site']['smtp_host'] = "smtp.xxxxx.com.br";
$config['site']['smtp_port'] = 587;
$config['site']['smtp_auth'] = true;
$config['site']['smtp_user'] = "xxx@xxx.com.br";
$config['site']['smtp_pass'] = "xxx";

# PAGE: whoisonline.php
$config['site']['private-servlist.com_server_id'] = 0;
/*
Server id on 'private-servlist.com' to show Players Online Chart (whoisonline.php page), set 0 to disable Chart feature.
To use this feature you must register on 'private-servlist.com' and add your server.
Format: number, 0 [disable] or higher
*/

# PAGE: characters.php
$config['site']['quests'] = array('Backpack Regeneration' => 9881, 'Firewalker Boots' => 5999, 'Cursed Skull' => 722424, 'Real Falcon' => 54637, 'Supremo Falcon' => 713256, 'Aura 10% Dodge' => 722641, 'Fusion SD' => 712594, 'Bless Infinita' => 34212, 'Boost Ataque 1' => 32150, 'Boost Ataque 2' => 32151, 'Magia 30RR' => 21466, 'Magia 40RR' => 21374, 'Acesso a Roshamuul' => 79432, 'Acesso a Oramond' => 85742, 'Conjure 3x' => 64859, 'Conjure 4x' => 64858, 'Conjure 10x' => 64860);
$config['site']['show_skills_info'] = false;
$config['site']['show_vip_storage'] = 0;

# PAGE: accountmanagement.php
$config['site']['send_mail_when_change_password'] = false;
$config['site']['send_mail_when_generate_reckey'] = false;
$config['site']['generate_new_reckey'] = true;
$config['site']['generate_new_reckey_price'] = 10;

# PAGE: guilds.php
$config['site']['guild_need_level'] = 8;
$config['site']['guild_need_pacc'] = false;
$config['site']['guild_image_size_kb'] = 50;
$config['site']['guild_description_chars_limit'] = 2000;
$config['site']['guild_description_lines_limit'] = 6;
$config['site']['guild_motd_chars_limit'] = 250;

# PAGE: adminpanel.php
$config['site']['access_admin_panel'] = 6;
$config['site']['access_tickers'] = 6;
$config['site']['access_admin_painel'] = 6;
$config['site']['access_staff_painel'] = 6;

# PAGE: latestnews.php
$config['site']['news_limit'] = 5;

# PAGE: killstatistics.php
$config['site']['last_deaths_limit'] = 40;

# PAGE: team.php
$config['site']['groups_support'] = array(2, 3, 4, 5, 6, 7);

# PAGE: highscores.php
$config['site']['groups_hidden'] = array(4, 5, 6, 7);
$config['site']['accounts_hidden'] = array(1, 2);

# PAGE: shopsystem.php
$config['site']['shop_system'] = true;
$config['site']['shopguild_system'] = true;

# PAGE: lostaccount.php
$config['site']['email_lai_sec_interval'] = 180;

# Layout Config
$config['site']['layout'] = 'tibiarl';
$config['site']['vdarkborder'] = '#505050';
$config['site']['darkborder'] = '#D4C0A1';
$config['site']['lightborder'] = '#F1E0C6';
$config['site']['download_page'] = true;
$config['site']['serverinfo_page'] = true;

///Lista de itens Characters
///exemplo
//$config['site']['itensname'] = array(ID DO ITEM => 'DESCRIÇÃO DO ITEM',ID DO ITEM => 'DESCRIÇÃO DO ITEM');
$config['site']['itensname'] = array(
    //Extreme Mage Helmet
	2662 => '(Arm:365, magic level +20, protection all +7%).<br><br><font color="green"><b><big>Item VIP</big></b></font>',
    //Extreme Mage Robe
	8866 => '(Arm:365, magic level +20, protection all +7%).<br><br><font color="green"><b><big>Item VIP</big></b></font>',
    //Extreme Mage Legs
	7730 => '(Arm:365, magic level +20, protection all +7%).<br><br><font color="green"><b><big>Item VIP</big></b></font>',
    //Extreme Mage Boots
	7892 => '(reflect: 30% for tiny damage, speed +225, faster regeneration).<br><br><font color="green"><b><big>Item VIP</big></b></font>',
    //Extreme Mage Shield
	8907 => '(Def:365, magic level +20).<br><br><font color="green"><b><big>Item VIP</big></b></font>',
    //Extreme Mage Amulet
	7888 => '(Def:365, magic level +20).<br><br><font color="green"><b><big>Item VIP</big></b></font>',
    //Extreme Staff
	12702 => '(Extreme Staff).<br><br><font color="green"><b><big>Item VIP</big></b></font>',
    //Donate Ring
	10309 => '(Arm:30, club fighting +10, sword fighting +10, axe fighting +10, distance fighting +10, magic level +10, protection all +5%, reflect: 35% for tiny damage, faster regeneration).<br><br><font color="green"><b><big>Item VIP</big></b></font>',
    //Extreme Pally Helmet
	7903 => '(Arm:365, distance fighting +20, protection all +7%).<br><br><font color="green"><b><big>Item VIP</big></b></font>',
    //Extreme Pally Armor
	8880 => '(Arm:365, distance fighting +20, protection all +7%).<br><br><font color="green"><b><big>Item VIP</big></b></font>',
    //Extreme Pally Legs
	7885 => '(Arm:365, distance fighting +20, protection all +7%).<br><br><font color="green"><b><big>Item VIP</big></b></font>',
    //Extreme Pally Boots
	7886 => '(reflect: 30% for tiny damage, speed +275, faster regeneration).<br><br><font color="green"><b><big>Item VIP</big></b></font>',
    //Extreme Pally Shield
	8909 => '(Def:365, distance fighting +20).<br><br><font color="green"><b><big>Item VIP</big></b></font>',
	//Extreme Bow
	11112 => '(Atk:385, distance fighting +15).<br><br><font color="green"><b><big>Item VIP</big></b></font>',
    //Extreme Pally Amulet
	11387 => '(Arm:50, distance fighting +25, protection all +4%).<br><br><font color="green"><b><big>Item VIP</big></b></font>',
    //Extreme Kina Helmet
	7939 => '(Arm:370, club fighting +20, sword fighting +20, axe fighting +20, protection all +7%).<br><br><font color="green"><b><big>Item VIP</big></b></font>',
    //Extreme Kina Armor
	8886 => '(Arm:370, club fighting +20, sword fighting +20, axe fighting +20, protection all +7%).<br><br><font color="green"><b><big>Item VIP</big></b></font>',
    //Extreme Kina Legs
	7894 => '(Arm:370, club fighting +20, sword fighting +20, axe fighting +20, protection all +7%).<br><br><font color="green"><b><big>Item VIP</big></b></font>',
    //Extreme Kina Boots
	7891 => '(reflect: 30% for tiny damage, speed +275, faster regeneration).<br><br><font color="green"><b><big>Item VIP</big></b></font>',
    //Extreme Kina Shield
	8906 => '(Def:370, club fighting +20, sword fighting +20, axe fighting +20).<br><br><font color="green"><b><big>Item VIP</big></b></font>',
    //Extreme Kina Amulet
	8266 => '(Arm:50, club fighting +25, sword fighting +25, axe fighting +25, protection all +4%).<br><br><font color="green"><b><big>Item VIP</big></b></font>',
    //Extreme Sword
	12772 => '(Atk:255 physical + 25 energy, Def:40, axe fighting +15).<br><br><font color="green"><b><big>Item VIP</big></b></font>',
    //Extreme Axe
	12771 => '(Atk:255 physical + 25 energy, Def:40, axe fighting +15).<br><br><font color="green"><b><big>Item VIP</big></b></font>',
    //Extreme Club
	12574 => '(Atk:255 physical + 25 energy, Def:40, axe fighting +15).<br><br><font color="green"><b><big>Item VIP</big></b></font>',
    //Legendary Helmet
	12681 => '(Arm:150, club fighting +5, sword fighting +5, axe fighting +5, distance fighting +5, magic level +5, protection all +2%).<br><br><font color="green"><b><big>Item FREE</big></b></font>',
    //Legendary Armor
	12682 => '(Arm:150, club fighting +5, sword fighting +5, axe fighting +5, distance fighting +5, magic level +5, protection all +2%).<br><br><font color="green"><b><big>Item FREE</big></b></font>',
    //Legendary Legs
	12683 => '(Arm:150, club fighting +5, sword fighting +5, axe fighting +5, distance fighting +5, magic level +5, protection all +2%).<br><br><font color="green"><b><big>Item FREE</big></b></font>',
    //Legendary Boots
	12679 => '(Arm:150, club fighting +5, sword fighting +5, axe fighting +5, distance fighting +5, magic level +5, protection all +2%).<br><br><font color="green"><b><big>Item FREE</big></b></font>',
    //Legendary Shield
	12672 => '(Def:150, club fighting +5, sword fighting +5, axe fighting +5, distance fighting +5, magic level +5).<br><br><font color="green"><b><big>Item FREE</big></b></font>',
    //Legendary Ring
	2122 => '(club fighting +5, sword fighting +5, axe fighting +5, distance fighting +5, magic level +5, protection all +1%, faster regeneration).<br><br><font color="green"><b><big>Item FREE</big></b></font>',
    //Legendary Staff
	12678 => '(Atk:270, distance fighting +5).<br><br><font color="green"><b><big>Item FREE</big></b></font>',
	//Legendary Sword
	12676 => '(Atk:200 physical + 15 energy, Def:40, sword fighting +8).<br><br><font color="green"><b><big>Item FREE</big></b></font>',
	//Legendary Axe
	12675 => '(Atk:200 physical + 15 energy, Def:40, axe fighting +8).<br><br><font color="green"><b><big>Item FREE</big></b></font>',
	//Legendary Club
	12677 => '(Atk:200 physical + 15 energy, Def:40, club fighting +8).<br><br><font color="green"><b><big>Item FREE</big></b></font>',
    //Backpack Regeneration
	12670 => '(faster regeneration).<br><br><font color="green"><b><big>Item FREE</big></b></font>',
    //Real Boots
	12770 => '(Arm:10, speed +125, faster regeneration).<br><br><font color="green"><b><big>Item FREE</big></b></font>',);
	
$SQLlink = mysqli_connect("localhost", "root", "", "hu318s");

if (!$SQLlink) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
?>