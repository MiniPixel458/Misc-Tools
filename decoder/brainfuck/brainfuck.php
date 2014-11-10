<?php 
if(!isset($argv[1]))
exit("[!] Vous devez renseignez un code brainfuck a analyser.");
if(is_file($argv[1]))
	$brain=file_get_contents($argv[1]);
else
	$brain=$argv[1];
$brain=str_replace(" ", "", $brain);
$instruction=array();
$band = [0];
$pointer=0;
$texte="";
while( strlen($brain)>0)
{
    if (strpos($brain,'[')==false and $brain[0]!='[')
    {	$instruction[]=$brain;
        $brain = "";
    }
    else
    {
    	$boucleend=strpos($brain,'[');
        if ($brain[0]!='[')
        {
        	$bouclestart=strpos($brain,'[');
        	$instruction[]=substr($brain, 0,$bouclestart);
        	$brain=substr($brain, $bouclestart);
        }
        else
        {
        	$bouclestart=strpos($brain,'[');
        	$boucleend=strpos($brain,']');
        	$instruction[]=substr($brain, 0,$boucleend+1);
        	$brain=substr($brain, $boucleend+1);
        }

            
    }
        
}

foreach ($instruction as  $value) {
	if($value[0]!="[")
		ProcessInstruction($value);
	else
		ProcessBoucle($value);
}

function ProcessInstruction($instruc)
{	global $band,$pointer,$texte;
	for($i=0;$i<strlen($instruc);$i++)
	{
		switch ($instruc[$i]) {
			case '<':
				Poiter_Move_Down();
				break;
			case '>':
				Poiter_Move_Up();
				break;
			case '+':
				$band[$pointer]++;
				break;
			case '-':
				$band[$pointer]--;
				break;
			case '.':
				$texte.=chr($band[$pointer]);
				break;
			default:
				# code...
				break;
		}
	}	
}
function ProcessBoucle($instruc)
{	global $band,$pointer,$texte;
	$instruc=str_replace("[", "", str_replace("]", "", $instruc));
	while($band[$pointer]!=0)
	{
		for($i=0;$i<strlen($instruc);$i++)
	{
		switch ($instruc[$i]) {
			case '<':
				Poiter_Move_Down();
				break;
			case '>':
				Poiter_Move_Up();
				break;
			case '+':
				$band[$pointer]++;
				break;
			case '-':
				$band[$pointer]--;
				break;
			case '.':
				$texte.=chr($band[$pointer]);
				break;
			default:
				# code...
				break;
		}
	}
	}
}
function Poiter_Move_Up()
{	global $band,$pointer,$texte;
	$pointer++;
	if(!isset($band[$pointer]))
		$band[$pointer]=0;
}
function Poiter_Move_Down()
{	global $band,$pointer,$texte;
	$pointer--;
}

echo "[+] Result : ".$texte;
 ?>
