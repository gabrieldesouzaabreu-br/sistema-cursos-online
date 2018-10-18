<?php
  function criptografa($string){
    $hash=password_hash($string, PASSWORD_DEFAULT);
    return $hash;
  }

  function descriptografa($string,$hash){
    if(password_verify ($string,$hash)){
			$validastring=1; //se validasenha == 1 a senha foi validada
		}
			else{
				$validastring=NULL; //se validasenha == NULL a senha não foi validada
			}
		return $validastring;
  }

 ?>
