<?php

class Config {// coloca as senhs a


	

    const BD_HOST = "localhost",
          BD_USER = "phpmyadmin",
          BD_SENHA= "ZT3nk0lM",
          BD_BANCO= "fusionbk",
          BD_PREFIX="";
          // a senha do banco de dados
		  
	const SITE_NAME = "http://king-fusion.com.br/";

    const MP_CLIENT_ID = "7084890941222442";
    const MP_CLIENT_SECRET = "8pruRz14EaZBEjQv4b7DGLmPbQZSF5Pc";

    const MP_MULTIPLIER = 2;

    const TRIPPLE_POINTS = true;

    // const   RETURN_URL_PAYPAL = "http://baiakpvp.com/?subtopic=ret",
            // CANCEL_URL_PAYPAL = "http://baiakpvp.com/?subtopic=ret",
            // USER_PAYPAL = "rodrigo_cpvi_api1.hotmail.com",
            // PWD_PAYPAL = "55FCFMBNTPA7YBSC",
            // SIGNATURE_PAYPAL = "A0EJ95HARsTz5m4p4NQFDM05GGmKA.iC8mRM1WF12GiO3wpXYyAzkKAs";


    const   RETURN_URL_PAYPAL = "http://king-fusion.com.br/?subtopic=ret",
            CANCEL_URL_PAYPAL = "http://king-fusion.com.br/?subtopic=ret",
            USER_PAYPAL = "",
            PWD_PAYPAL = "",
            SIGNATURE_PAYPAL = "";
			
			// const RETURN_URL_PAYPAL = "http://baiakpvp.com/?subtopic=ret",
            // CANCEL_URL_PAYPAL = "http://baiakpvp.com/?subtopic=ret",
            // USER_PAYPAL = "sb-yvuoy579542_api1.business.example.com",
            // PWD_PAYPAL = "P9GX9XGU42378L3N",
            // SIGNATURE_PAYPAL = "A3WWWLByLtUN1Vtv4KC0EBXktw3qAbCnOxd2cbw6BGWk9CVczeHfLybt";

      const PAYPAL_SAND = false; ## Modo de teste true = ativado , false = desativado
	  
	  ##Sell Character
	  
	  const sellcharLevel = 150; // Aqui coloque o level minimo para comércio de char
    
    
}
