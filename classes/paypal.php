<?php 


class Paypal extends Conexao{
    private $nvp = array();
    private $nvpret = array();
    private $status;
    private $res;
    private $pointspervar = 25;
    private $doublepoints;



    public function getVerifyPayment($token){
        $query = "SELECT * FROM paypal WHERE code = :token ;";

        $params = array(":token" => $token);

        $this->ExecuteSQL($query, $params);        
        while ($lista = $this->ListarDados()):
            $this->status = $lista['status'];
        endwhile;

        return $this->status;


    }

    public function getNvp($total){
        $this->nvp = array(
            'PAYMENTREQUEST_0_AMT'				=> $total,
            'PAYMENTREQUEST_0_CURRENCYCODE'		 => 'BRL',
            'PAYMENTREQUEST_0_PAYMENTACTION'	 => 'Sale',
            'RETURNURL'							=> Config::RETURN_URL_PAYPAL,
            'CANCELURL'							=> Config::CANCEL_URL_PAYPAL,
            'METHOD'							=> 'SetExpressCheckout',    
            'VERSION'							=> '84',
            'PWD'								=> Config::PWD_PAYPAL,
            'USER'								=> Config::USER_PAYPAL,
            'SIGNATURE'							=> Config::SIGNATURE_PAYPAL,
        );

        return $this->nvp;
    }

    public function getNvpRet($token){
        $this->nvpret = array(
            'TOKEN'								=> $token,
            'METHOD'							=> 'GetExpressCheckoutDetails',
            'VERSION'							=> '84',
            'PWD'								=> Config::PWD_PAYPAL,
            'USER'								=> Config::USER_PAYPAL,
            'SIGNATURE'							=> Config::SIGNATURE_PAYPAL
        );

        return $this->nvpret;

    }


    public function insertPaymentinDb($account,$valor,$code){
        $status = 'Waiting'; 
        $metodo = 'Paypal'; 
        $mensagem = 'Aguardando Pagamento'; 
       $query = "INSERT INTO `paypal` (`id`, `account`, `valor`, `code`, `status`, `date`) VALUES (NULL, :account, :valor, :code, :status1 , CURRENT_TIMESTAMP);";        
       $query .= "INSERT INTO `comprovante` (`id`, `nome`, `metodo`, `mensagem`, `valor`, `paypalcode`) VALUES (NULL, :account, :metodo, :mensagem, :valor , :code);";        
        $params = array(
        ':account'=> $account,   
        ':valor'=> $valor,   
        ':code'=> $code,
        ':status1' => $status,                               
        ':metodo' => $metodo,                               
        ':mensagem' => $mensagem,                               
        );         
        if($this->ExecuteSQL($query, $params)):               
                   return TRUE;               
               else:                   
                   return FALSE;                
           endif;
        
}

public function updateAccountInCancel($code, $states){
$query = "UPDATE `paypal` SET `status` = :states WHERE `code` = :code; ";
    $params = array( 
        ':code'=> $code, 
        ':states' => $states,                                 
    ); 

if($this->ExecuteSQL($query, $params)):        
            return TRUE;        
        else:            
            return FALSE;         
    endif;
}


    public function updateAccountInApprov($code, $states, $account, $valor){
        if ($valor >= 100):
			$query = ('UPDATE `paypal` SET `status` = "'.$states.'" WHERE code = "'.$code.'" ; ' );
            $query .= (' UPDATE `accounts` SET premium_points = premium_points + '.$valor.' * 3, backup_points = backup_points + '.$valor.' * 3 WHERE name = "'.$account.'" ; ' );
            $query .= " UPDATE comprovante SET mensagem = 'Aprovado' WHERE paypalcode = '".$code."' ;";
        elseif($valor >= 20):
            $query = ('UPDATE `paypal` SET `status` = "'.$states.'" WHERE code = "'.$code.'" ; ' );
            $query .= (' UPDATE `accounts` SET premium_points = premium_points + '.$valor.' * 2, backup_points = backup_points + '.$valor.' * 2 WHERE name = "'.$account.'" ; ' );
            $query .= " UPDATE comprovante SET mensagem = 'Aprovado' WHERE paypalcode = '".$code."' ;";
		else:
            $query = ('UPDATE `paypal` SET `status` = "'.$states.'" WHERE code = "'.$code.'" ; ' );
             $query .= (' UPDATE `accounts` SET premium_points = premium_points + '.$valor.' , backup_points = backup_points + '.$valor.' WHERE name = "'.$account.'" ; ' );
             $query .= " UPDATE comprovante SET mensagem = 'Aprovado' WHERE paypalcode = '".$code."' ;";

		endif;
    

        $params = array(                            
            ':account' => $account,                              
            ':doublepoints' => $this->doublepoints,                             
        ); 
    
    if($this->ExecuteSQL($query, $params)):            
                return TRUE;            
            else:                
                return FALSE;             
        endif;    
    }


    private function GetLista(){
        
        $i = 1;
        while ($lista = $this->ListarDados()):
            
        $this->itens[$i] = array(
         'id'             => $lista['id'] ,    
         'account'             => $lista['account'] ,    
         'valor'             => $lista['valor'] ,    
         'code'             => $lista['code'] ,    
         'status'             => $lista['status'] ,    
         'date'             => $lista['date'] ,      
        );
            $i++;
        
        endwhile;

    }



}