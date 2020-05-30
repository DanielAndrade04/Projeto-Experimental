<?php

$nome = $dados["tile"];
$telefone = $dados["description"];
$erro = 0;

if (empty($nome) OR strstr ($nome, ' ') == FALSE)
	{echo "Digite seu Nome"; $erro=1;}

if (empty($telefone) OR strstr ($telefone, ' ') == FALSE)
	{echo "Digite seu telefone"; $erro=1;}

if (strlen($telefone)<8)
	{echo "Favor digitar seu numero corretamente"; $erro=1;}

?>