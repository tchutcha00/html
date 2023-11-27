<?php
	
	class Paginacao
{	
public $total; 			// armazena o total de registros
public $pg_atual;		// armazena  pagina atual
public $mostrar;		// armazena a quantidade de resultados a mostrar 
public $fim;			// armazena os valores "fim,inicio" da da função limit do mysql
public $menos;			// armazena a pagina "anterior"
public $mais;			// armazena a pagina "proximo"

	function __construct($qtd , $pag){	
		if($pag < 0 || !isset($pag)){
			$pag = 1;
		}

		$this->mostrar = 50;
		$this->total = $qtd;
		$this->pg_atual = $pag;		
		$this->paginas = ceil($this->total/$this->mostrar);	

		if($this->pag_atual > $this->paginas){
			$this->pag_atual = $this->paginas;
		}		

		$this->menos = $this->pg_atual-1;
		$this->mais = $this->pg_atual+1;
	}	

	// calcula a pagina "anterior"
	function menos(){
		if($this->menos >= 1){
			return "<a href=\"?p=" . $this->menos . "\">" . $this->menos . "</a> | ";
		}
	}

	// retorna a pagina atual	
	function atual(){
		return $this->pg_atual . " | ";
	}

	// calcula a pagina "proximo"
	function mais(){
		if($this->mais <= $this->paginas){
			return "<a href=\"?p=" . $this->mais . "\">" . $this->mais . "</a>";
		}
}

	// exibi a paginação
	function paginar(){
		print $this->menos() . $this->atual() . $this->mais();
	}

	// retorna os valores da função limite do mysql
	function limite(){
		$this->fim = ($this->pg_atual*$this->mostrar)-$this->mostrar . "," . $this->mostrar;
		return $this->fim;
	}
}
?>