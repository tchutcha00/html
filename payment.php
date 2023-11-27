<script src="donates.js"></script>
<?php

error_reporting(E_ALL ^ E_STRICT ^ E_NOTICE);

// true = show sent queries and SQL queries status/status code/error message
define('DEBUG_DATABASE', false);



define('INITIALIZED', true);

// if not defined before, set 'false' to load all normal
if(!defined('ONLY_PAGE'))
	define('ONLY_PAGE', false);
	
// check if site is disabled/requires installation
include_once('./system/load.loadCheck.php');

// fix user data, load config, enable class auto loader
include_once('./system/load.init.php');

// DATABASE
include_once('./system/load.database.php');
if(DEBUG_DATABASE)
	Website::getDBHandle()->setPrintQueries(true);
// DATABASE END

// LOGIN
if(!ONLY_PAGE)
	include_once('./system/load.login.php');
// LOGIN END

// COMPAT
// some parts in that file can be blocked because of ONLY_PAGE constant
include_once('./system/load.compat.php');
// COMPAT END

// LOAD PAGE
include_once('./system/load.page.php'); 

if($logged){ ?>


<?php if($_GET['method'] == "Paygol"): ?>


<center>

<img src="https://s3.amazonaws.com/files.enjin.com/950672/paygol.png" title="Paygol Image">
<!-- PayGol JavaScript -->
<script src="http://www.paygol.com/micropayment/js/paygol.js" type="text/javascript"></script> 

<!-- PayGol Form -->
<form name="pg_frm" method="post" action="paygol.php" ><br>
<table class="tableunline" style="width: 95%" border="0" cellpadding="4" cellspacing="1">
  
  <tr class="color">
            <td colspan=""><strong></strong></td>
    </tr>

    <tr bgcolor="#505050"><td><b><font color="white">Paygol Donate</font></b><br /></td></tr>
	
	<tr bgcolor="<?php echo $config['site']['lightborder']; ?>"><td>
     Paygol is automatic, when payout the points will automatic in your account.
</td></tr>
  
    <tr bgcolor="<?php echo $config['site']['lightborder']; ?>">
<td>
 Yout account name: <strong><?= $account_logged->getName(); ?> </strong>.<p>
 <input type="hidden" name="pg_custom" value="<?= $account_logged->getName(); ?>"><p>
 <input type="hidden" name="id_acc" value="<?= $account_logged->getId(); ?>"><p>
 <input type="hidden" name="sort" value="<?= (int)date('ymdHism') . (int)$account_logged->getId() ?>"><p>
 <label>Digite o valor:</label>
 <input type="number" name="pg_price" value="" placeholder="Digite o valor"><br>
 
     
</center>
</td>
</tr>
<tr bgcolor="<?php echo $config['site']['lightborder']; ?>">
<td><input type="image" src="https://p.simg.uol.com.br/out/pagseguro/i/botoes/carrinhoproprio/btnFinalizar.jpg" name="pg_button"/>  </td>

</tr>
</table>
</form>

<?php endif; ?>


<?php 
if($_GET['method'] == "BancodoBrasil"){ // Voc~s tem banco do brasil? 
    ?>
    <form id="formBancoBrasil" method="post">
      <center> <img src="images/brasil.jpeg" width="380" height="78"></center><br><br>
        <table border="0" cellspacing="1" cellpadding="4" width="100%">
        <tr bgcolor="#505050"><td colspan="1" class="white"><center><b>Informa&ccedil;&otilde;es da Conta</b></center></td></tr>
        <tr bgcolor="<?php echo $config['site']['lightborder']; ?>"><td>
        Titular: Mariella Gomes Rego Amorim<br>
        CPF: 119.853.614-42<br>		
        Banco: Banco do Brasil<br>
		Variação: 51<br>
        Agência: 3918-7<br>
        Conta Poupança: 16897-1<br><br><br><b>1 premium point = 1R$ </br>(ou de acordo com a atual promoção, <font color="red">caso</font> esteja havendo alguma)</b><br>
        <tr bgcolor="<?php echo $config['site']['lightborder']; ?>">
        <td>
        Valor<br>
        <input type="text" class="form-control form-control-sm" name="AccountBancoBrasil" id="AccountBancoBrasil" style="width: 50%" value="<?php echo $account_logged->getName(); ?>" readonly> 
        <input type="number" class="form-control form-control-sm" name="valoBancoBrasil" id="valoBancoBrasil" min="1" placeholder="Digite o valor da doação." style="width: 50%" required>
        <div id="BancoDoBrasilInv" style="color:red; font-size: 10px"></div><br>
        <button class="btn btn-link" id="BtnConfirmBrasil" >												
         <div class="BigButton" id="" style="background-image:url(./layouts/tibiarl/images/buttons/sbutton.gif)" >
        <div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" >
        <div class="BigButtonOver" style="background-image:url(./layouts/tibiarl/images/buttons/sbutton_over.gif);" ></div>
         <input id="TypeBrasil" name="TypeBrasil" type="hidden" value="Banco Do Brasil">
         <input class="ButtonText" type="image" id="" name="" alt="Submit" src="./layouts/tibiarl/images/buttons/_sbutton_submit.gif" >
                     </div>
                     </div>
                     </button>
        </td>
        </tr>
        
									
        <br>
</tr>


</td>
</tr>


</table>
</form>
<?php
    
}
elseif($_GET['method'] == "Itau"){
  ?>
  <form id="formBancoCaixa" method="post">
 <center> <img src="images/itau.png" width="160" height="50"></center><br><br>
        <table border="0" cellspacing="1" cellpadding="4" width="100%">
        <tr bgcolor="#505050"><td colspan="1" class="white"><center><b>Informa&ccedil;&otilde;es da Conta</b></center></td></tr>
        <tr bgcolor="<?php echo $config['site']['lightborder']; ?>"><td>
				Titular: Rafael Alves Rodrigues<br>						
				Banco: Itau<br>
				Agência: 6133 <br>
				Conta Corrente: 75337-3<br>
				Chave Pix: 21969605908<br><br><br><b>1 premium point = 1R$ </br>(ou de acordo com a atual promoção, <font color="red">caso</font> esteja havendo alguma)</b><br><br>
</tr>
<tr bgcolor="<?php echo $config['site']['lightborder']; ?>">
        <td>
        Valor<br>
        <input type="text" class="form-control form-control-sm" name="AccountCaixa" id="AccountCaixa" style="width: 50%" value="<?php echo $account_logged->getName(); ?>" readonly> 
        <input type="number" class="form-control form-control-sm" name="valorCaixa" id="valorCaixa" min="1" placeholder="Digite o valor da doação." style="width: 50%" required>
        <div id="CaixaInv" style="color:red; font-size: 10px"></div><br>
        <button class="btn btn-link" id="BtnConfirmCaixa" >												
         <div class="BigButton" id="" style="background-image:url(./layouts/tibiarl/images/buttons/sbutton.gif)" >
		         <div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" >
        <div class="BigButtonOver" style="background-image:url(./layouts/tibiarl/images/buttons/sbutton_over.gif);" ></div>
         <input id="TypeCaixa" name="TypeCaixa" type="hidden" value="Caixa">
         <input class="ButtonText" type="image" id="" name="" alt="Submit" src="./layouts/tibiarl/images/buttons/_sbutton_submit.gif" >
                     </div>
                     </div>
                     </button>
        </td>
        </tr>


</td>
</tr>

</table>
</form>
<?php
}
elseif($_GET['method'] == "MercadoPago"){
  ?>
    <center><img src="images/mercado.png" style="width:400px; height: 200px"></center><br>
<form target="pagseguro" method="post" action="?subtopic=mpteste">
	<input type="hidden" name="reference" value="<?php echo $account_logged->getCustomField("name");?>">
	<input type="hidden" name="ref_cod_pedido" value="<?php echo (int)date('ymdHism') . (int)$account_logged->getId();?>">

	<table border="0" cellpadding="4" cellspacing="1" width="100%" id="#estilo"><tbody>
		<tr bgcolor="#505050" class="white">
			<th colspan="2"><strong>Escolha o valor que deseja DONATAR.</strong></th>
		</tr>
		<tr bgcolor="<?php echo $config['site']['lightborder']; ?>">
			<td width="10%"></td>
			<td><strong><?php echo $account_logged->getCustomField("name"); ?></strong></td>
		</tr>
		<tr bgcolor="<?php echo $config['site']['lightborder']; ?>">
			<td width="10%">Valor</td>
			<td><input name="itemCount" type="number" min="1" size="5" maxlength="5"></td>
		</tr>
		<tr bgcolor="<?php echo $config['site']['lightborder']; ?>">
			<td colspan="2">
				
				<input type="image" src="https://p.simg.uol.com.br/out/pagseguro/i/botoes/carrinhoproprio/btnFinalizar.jpg" name="submit"/>
			</td>
		</tr>
	</tbody>
</table>
</form>
<script>
 $(document).ready(function() {
        var newcharvocation = $( "input:checked" ).val();
        
              });
</script>
<?php
}
elseif($_GET['method'] == "PagSeguro"){
?>
<center><img src="images/pagseguro.png"></center><br>
<form target="pagseguro" method="post" action="dntpagseguro.php">
	<input type="hidden" name="reference" value="<?php echo $account_logged->getCustomField("name"); ?>">
	<table border="0" cellpadding="4" cellspacing="1" width="100%" id="#estilo"><tbody>
		<tr bgcolor="#505050" class="white">
			<th colspan="2"><strong>Escolha o valor que deseja DONATAR.</strong></th>
		</tr>
		<tr bgcolor="<?php echo $config['site']['lightborder']; ?>">
			<td width="10%">Sua conta</td>
			<td><strong><?php echo $account_logged->getCustomField("name"); ?></strong></td>
		</tr>
		<tr bgcolor="<?php echo $config['site']['lightborder']; ?>">
			<td width="10%">Valor</td>
			<td><input name="itemCount" type="number" min="1" size="5" maxlength="5"></td>
		</tr>
		<tr bgcolor="<?php echo $config['site']['lightborder']; ?>">
			<td colspan="2">
				<input type="image" src="https://p.simg.uol.com.br/out/pagseguro/i/botoes/carrinhoproprio/btnFinalizar.jpg" name="submit"/>
			</td>
		</tr>
	</tbody>
</table>
</form>

<?php
}
elseif($_GET['method'] == "PicPay"){
  ?>
   <center><img src="https://static.wixstatic.com/media/12c7b1_b23928a1d27c43aa90adaca394206529~mv2_d_4822_2241_s_2.png/v1/crop/x_675,y_522,w_3448,h_1245/fill/w_429,h_156,al_c,usm_0.66_1.00_0.01/12c7b1_b23928a1d27c43aa90adaca394206529~mv2_d_4822_2241_s_2.png"></center><br>
<table border="0" cellspacing="1" cellpadding="4" width="100%">
<tr bgcolor="#505050"><td colspan="1" class="white"><center><b>Informa&ccedil;&otilde;es da Conta</b></center></td></tr><tr bgcolor="<?php echo $config['site']['lightborder'] ?>"><td>

<br><br><b>1 premium point = 1R$ </br>(ou de acordo com a atual promoção, <font color="red">caso</font> esteja havendo alguma)</b><br><br>
Pagamentos via Pic Pay são entregues automaticamente.<br>

<br>
<?php 

$fatura = new Fatura;
$fatura->getfatura2();
foreach($fatura->GetItens() as $lastref):
$lastrefs = $lastref['ref'];
endforeach;


?>
<form action="?subtopic=picpay" method="post" onsubmit="bloqueia23.disabled = true; return true;">
 <div class="row">
    <div class="col-sm-4">
	<input type="hidden" name="ref" class="form-control" value="<?php echo (int)date('ymdHism')?>">
	 <font size="2px">Account</font>
	<input type="text" name="account_name" class="form-control form-control-sm" value="<?php echo $account_logged->getName(); ?>" readonly>
    </div>
	<div class="col-sm-4">
      <font size="2px">Valor</font>
	<input type="number" name="valor" min="0" max="500" class="form-control form-control-sm" required>
    </div>

	<div class="col-sm-4" style="margin-top: 10px">
       
	<center>
	<button class="btn btn-link" id="BtnConfirmBrasil" >												
         <div class="BigButton" id="" style="background-image:url(./layouts/tibiarl/images/buttons/sbutton.gif)" >
        <div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" >
        <div class="BigButtonOver" style="background-image:url(./layouts/tibiarl/images/buttons/sbutton_over.gif);" ></div>
         <input id="TypeBrasil" name="TypeBrasil" type="hidden" value="Banco Do Brasil">
         <input class="ButtonText" type="image" id="" name="" alt="Submit" src="./layouts/tibiarl/images/buttons/_sbutton_submit.gif" >
                     </div>
                     </div>
                     </button>
	</center>
    </div>
	
	</div>
</form>



<?php
}

elseif($_GET['method'] == "Paypal"){
  ?>
  
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">

<input type="hidden" name="cmd" value="_xclick">

<input type="hidden" name="business" value="bragamarechal@gmail.com">

<input type="hidden" name="lc" value="BRL">

<input type="hidden" name="item_name" value="Expert Premium points">

<b>Account name/login:</b> <input type="text"  name="custom" value="">


<select name="amount">

  <option value="5.00">5 BRL</option>
  <option value="10.00">10 BRL</option>
  <option value="15.00">15 BRL</option>
  <option value="20.00">20 BRL</option>
  <option value="25.00">25 BRL</option>
  <option value="30.00">30 BRL</option>
  <option value="35.00">35 BRL</option>
  <option value="40.00">40 BRL</option>
  <option value="45.00">45 BRL</option>
  <option value="50.00">50 BRL</option>
  <option value="55.00">55 BRL</option>
  <option value="60.00">60 BRL</option>
  <option value="65.00">65 BRL</option>
  <option value="70.00">70 BRL</option>
  <option value="75.00">75 BRL</option>
  <option value="80.00">80 BRL</option>
  <option value="85.00">85 BRL</option>
  <option value="90.00">90 BRL</option>
  <option value="100.00">100 BRL</option>

</select>

<input type="hidden" name="button_subtype" value="products">

<input type="hidden" name="currency_code" value="BRL">

<input type="hidden" name="no_shipping" value="1">

<input type="hidden" name="currency_code" value="BRL">

<input type="hidden" name="notify_url" value="http://expert-fusion.online/paypal/ipn/ipn.php">

<input type="hidden" name="return" value="http://expert-fusion.online">

<input type="hidden" name="rm" value="0">

<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest">

<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">

<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">

</form>

<?php

}

elseif($_GET['method'] == "Nubank"){
?>
<form id="formNubank" method="post">
      <center> <img src="images/nubank.png" width="380" height="78"></center><br><br>
        <table border="0" cellspacing="1" cellpadding="4" width="100%">
        <tr bgcolor="#505050"><td colspan="1" class="white"><center><b>Informa&ccedil;&otilde;es da Conta</b></center></td></tr>
        <tr bgcolor="<?php echo $config['site']['lightborder']; ?>"><td>
        Titular: Rafael Alves Rodrigues<br>			
        Banco: Nu Pagamentos S.A.<br>
        Agência: 0000<br>
        Conta Corrente: 0000000-9<br><br><br><b>1 premium point = 1R$ </br>(ou de acordo com a atual promoção, <font color="red">caso</font> esteja havendo alguma)</b><br>
        <tr bgcolor="<?php echo $config['site']['lightborder']; ?>">
        <td>
        Valor<br>
        <input type="text" class="form-control form-control-sm" name="AccountNubank" id="AccountNubank" style="width: 50%" value="<?php echo $account_logged->getName(); ?>" readonly> 
        <input type="number" class="form-control form-control-sm" name="valoBancoNubank" id="valoBancoNubank" min="1" placeholder="Digite o valor da doação." style="width: 50%" required>
        <div id="NubankInv" style="color:red; font-size: 10px"></div><br>
        <button class="btn btn-link" id="BtnConfirmNubank" >                                                
         <div class="BigButton" id="" style="background-image:url(./layouts/tibiarl/images/buttons/sbutton.gif)" >
        <div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" >
        <div class="BigButtonOver" style="background-image:url(./layouts/tibiarl/images/buttons/sbutton_over.gif);" ></div>
         <input id="TypeNubank" name="TypeNubank" type="hidden" value="Nubank">
         <input class="ButtonText" type="image" id="" name="" alt="Submit" src="./layouts/tibiarl/images/buttons/_sbutton_submit.gif" >
                     </div>
                     </div>
                     </button>
        </td>
        </tr>
        
                                    
        <br>
</tr>


</td>
</tr>


</table>
</form>

<?php
}

?>




<?php





}else{
  header("Location: http://king-fusion.com.br");
}