<?php 

 /* www.scriptmundo.com
  * @PicPay Pagamentos
  * Simples integração com PicPay
  * Documentação: https://bit.ly/2VfBmjD
  */

  class PicPay extends Conexao{
	 
	 /*
	  *@var type String: $urlCallBack
	  */
	  private $urlCallBack = Config::SITE_NAME."notification.php";
	 
	  /*
	   *@var type String: $urlReturn
	   */
	  private $urlReturn = Config::SITE_NAME;
	 
	 /*
	  *@Get token: https://bit.ly/2XyAWCy
	  *@var type String: $x_picpay_token
	  */
	  // aqui são as minhas eu coloquyei pra eu mesmo poder fazer o chargeback mas fechei sem querer kk
	  private $x_picpay_token = "b2b9feb9-b9b6-4c6b-9d71-4d0c2fbe1234";
	  
	  /*
	   *@var type String: $x_seller_token
	   */
	  private $x_seller_token = "8e1ff4a2-9c17-4f94-9df4-fee3422d6917";

	 
	 //Função que faz a requisição
	 public function requestPayment($produto,$cliente){
		 
		  $data = array(
		         'referenceId' => $produto->ref,
		         'callbackUrl' => $this->urlCallBack,
		         'returnUrl'   => $this->urlReturn,
		         'value'       => $produto->valor,
		         'buyer'       => [
						  'firstName' => $cliente->nome,
						  'lastName'  => $cliente->sobreNome,
						  'document'  => $cliente->cpf,
						  'email'     => $cliente->email,
						  'phone'     => $cliente->telefone
						],
					);
		 
		 $ch = curl_init('https://appws.picpay.com/ecommerce/public/payments');
		 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		 curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
		 curl_setopt($ch, CURLOPT_HTTPHEADER, array('x-picpay-token: '.$this->x_picpay_token));
		 
		 $res = curl_exec($ch);
		 curl_close($ch);
	     $return = json_decode($res);
		 
		 return $return;
		  		  
	 }
	 
	 
	 
	 // Notificação PicPay
	 public function notificationPayment(){
		 
		$content = trim(file_get_contents("php://input"));
	    $payBody = json_decode($content);
		 
		 if(isset($payBody->authorizationId)):
		   
		   $referenceId = $payBody->referenceId; 
		 
		   $ch = curl_init('https://appws.picpay.com/ecommerce/public/payments/'.$referenceId.'/status');
		   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		   curl_setopt($ch, CURLOPT_HTTPHEADER, array('x-picpay-token: '.$this->x_picpay_token)); 
		
		   $res = curl_exec($ch);
		   curl_close($ch);
		   $notification = json_decode($res); 
		  		   
		   $notification->referenceId     = $payBody->referenceId; 
		   $notification->authorizationId = $payBody->authorizationId;
		   
		   return $notification;
		   
		 else:
		  
			return false;
		  
		 endif;
		  
		 
	 }
	 

	 
	 
  }


  
  
  
?>
