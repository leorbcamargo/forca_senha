<?php 
//Verificar a força da senha
//Essa função não limita a senha, apeas diz se é forte ou fraca
function forca_senha($senha) {
	$tamanho = strlen($senha);
	if($tamanho<=6){
		$nivel = "Pequena";
	} else {
		$somar = 0;
		$somar += preg_match('/[a-z]/', $senha); // tem pelo menos uma letra minúscula
		$somar += preg_match('/[A-Z]/', $senha); // tem pelo menos uma letra maiúscula
		$somar += preg_match('/[0-9]/', $senha); // tem pelo menos um número
		$somar += preg_match('/^[\w$@]{6,}$/', $senha); // tem 6 ou mais caracteres
		$somar += preg_match('/[\¹\²\³\£\¢\¬\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/', $senha); // Verificar se tem caracteres especiais
		if($tamanho>=12){
			if($tamanho>=24){
				$somar +=2;
			} else {
				$somar +=1;
			}
		}
		if($somar==1){
			$nivel = "Fraca+"; //Muito fraca
		} elseif($somar==2){
			$nivel = "Fraca";
		} elseif($somar==3){
			$nivel = "Média";
		} elseif($somar==4){
			$nivel = "Forte";
		} elseif($somar==5){
			$nivel = "Forte+";
		} elseif($somar==6){
			$nivel = "Forte++"; 
		} elseif($somar==7){
			$nivel = "Forte+++";
		}
	}
	$return = "<small>".$tamanho."<em>x</em>. (".$nivel.")</small>";
	return $return;
}

$nova_senha = "H$545fsfs";
echo forca_senha($nova_senha)
?>
