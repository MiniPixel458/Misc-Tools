<?php 
/*===================================
=            Morse Table            =
===================================*/
$char["._"]="A";
$char["_..."]="B";
$char["_._."]="C";
$char["_.."]="D";
$char["."]="E";
$char[".._."]="F";
$char["__."]="G";
$char["...."]="H";
$char[".."]="I";
$char[".___"]="J";
$char["_._"]="K";
$char["._.."]="L";
$char["__"]="M";
$char["_."]="N";
$char["___"]="O";
$char[".__."]="P";
$char["__._"]="Q";
$char["._."]="R";
$char["..."]="S";
$char["_"]="T";
$char[".._"]="U";
$char["..._"]="V";
$char[".__"]="W";
$char["_.._"]="X";
$char["_.__"]="Y";
$char["__.."]="Z";
$char[".____"]="1";
$char["..___"]="2";
$char["...___"]="3";
$char["...._"]="4";
$char["....."]="5";
$char["_...."]="6";
$char["__..."]="7";
$char["___.."]="8";
$char["____."]="9";
$char["_____"]="0";
$char["A"]="._";
$char["B"]="_...";
$char["C"]="_._.";
$char["D"]="_..";
$char["E"]=".";
$char["F"]=".._.";
$char["G"]="__.";
$char["H"]="....";
$char["I"]="..";
$char["J"]=".___";
$char["K"]="_._";
$char["L"]="._..";
$char["M"]="__";
$char["N"]="_.";
$char["O"]="___";
$char["P"]=".__.";
$char["Q"]="__._";
$char["R"]="._.";
$char["S"]="...";
$char["T"]="_";
$char["U"]=".._";
$char["V"]="..._";
$char["W"]=".__";
$char["X"]="_.._";
$char["Y"]="_.__";
$char["Z"]="__..";
$char["1"]=".____";
$char["2"]="..___";
$char["3"]="...___";
$char["4"]="...._";
$char["5"]=".....";
$char["6"]="_....";
$char["7"]="__...";
$char["8"]="___..";
$char["9"]="____.";
$char["0"]="_____";



/*-----  End of Morse Table  ------*/
if(!isset($argv[2]))
exit("[!] Vous devez renseignez l'action est le code.\n[!] php morseconverter.php {encode/decode} {text/file}");
if(is_file($argv[2]))
	$text=file_get_contents($argv[2]);
else
	$text=$argv[2];
$text=explode(" ", str_replace("-", "_", $text));
$result="";
if($argv[1]=="encode")
{	foreach ($text as $word) {
	for($i=0;$i<strlen($word);$i++)
	{
		$result.=$char[strtoupper($word[$i])].' ';
	}
		$result.=" ";
	}
	echo "[+] Result : ".$result;
}
elseif($argv[1]=="decode")
{
	foreach ($text as $lettre) {
	if($lettre!="")
		$result.=$char[$lettre];
	else
		$result.=" ";
	}
	echo "[+] Result : ".$result;
}
else
{
	exit("[!] Vous devez renseignez l'action est le code.\n[!] php morseconverter.php {encode/decode} {text/file}");
}
 ?>
