<?php
$filesize1 = filesize($_GET["Name"].'ar.txt')*121/100;
$filesize2 = filesize($_GET["Name"].'.xml');
$percent=floor(($filesize2/$filesize1)*100);

//json_decode(file_get_contents('https://translate.yandex.net/api/v1.5/tr.json/translate?key='.$api.'&lang='.$from.'-'.$to.'&text='.urlencode($text)))->code
$api_get=$_GET['api'];
$api_getg=$_GET['apig'];
$url=urldecode ($_GET['url']);
$sourcelang=$_GET['sourcelang'];
$tolang=$_GET['tolang'];
$html=$_GET['html'];

if(yandex_cevir('test',1)!='200')
{
      echo yandex_cevir('test',1);
      echo '<h2><strong>API Error!! Please use another api key.</strong></h2>';
      echo '<script>setTimeout(function(){window.location.replace("index.php?url='.$_GET["url"].'&name='.$_GET["Name"].'");}, 3000);</script>';
      exit();
}


?>

<!DOCTYPE html>
<html class="no-js">

<head>
	<meta charset='UTF-8'>

	<title>%<?php echo $percent; ?> XML translate is beign process...</title>

<style>
/* Paste this css to your style sheet file or under head tag */
/* This only works with JavaScript,
if it's not present, don't show loader */
.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url(Preloader_2.gif) center no-repeat #fff;
}
</style>
<script type="text/javascript">
function load()
{
setTimeout("window.open(self.location, '_self');", 300000);
}
</script>
<body onload="load()">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<script>
	//paste this code under head tag or in a seperate js file.
	// Wait for window load
	$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
	});
</script>

</head>

<body>
    	<div class="se-pre-con"><center>%<?php echo $percent; ?> Translate is being process, please wait...</center></div>

<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('memory_limit','48M');
ini_set('max_execution_time','99999');
ignore_user_abort(true);
set_time_limit(0);

$sozluk=array();
$handle = fopen($_GET["Name"]."sozluk.txt", "r");


if ($handle) {
  $string_data = file_get_contents($_GET["Name"]."sozluk.txt");
  $sozluk = unserialize($string_data);
    fclose($handle);
}



$done=true;




$i=0;

if(file_exists($_GET["Name"].'.txt'))
{
$follow=unserialize(file_get_contents($_GET["Name"].'.txt'));
$doc=unserialize(file_get_contents($_GET["Name"].'ar.txt'));
$root=$doc['@root'];
$xml = simplexml_load_string(file_get_contents($_GET["Name"].'.xml'));
}

else
{
$follow=0;
$handle = fopen($_GET["Name"].'.txt', 'w') or die('Cannot open file:  ');
$handle = fopen($_GET["Name"].'ar.txt', 'w') or die('Cannot open file:  ');
$handle = fopen($_GET["Name"].'.xml', 'w') or die('Cannot open file:  ');
$handle = fopen($_GET["Name"].'sozluk.txt', 'w') or die('Cannot open file:  ');
$doc=xmlstr_to_array( file_get_contents($url));
file_put_contents($_GET["Name"].'ar.txt', serialize($doc));
$root=$doc['@root'];
$xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8" '
  . 'standalone="yes"?><'.$root.'/>');
file_put_contents(iconv('UTF-8', 'WINDOWS-1252', $_GET["Name"].'.xml'), $xml->asXML());
}



if($follow>0 && file_exists($_GET["Name"].'.xml'))
{

    $xml = new SimpleXMLElement(file_get_contents($_GET["Name"].'.xml'));
    //print_r($xml);

}
// creating object of SimpleXMLElement
// function call to convert array to xml
array_to_xml($doc,$xml);
//file_put_contents(iconv('UTF-8', 'WINDOWS-1252', $_GET["Name"].'123.xml'), $xml->asXML());

if($done)
{
//file_put_contents($_GET["Name"].".xml", $xml_data->asXML(),FILE_APPEND);
//$xml = new SimpleXMLElement(file_get_contents($_GET["Name"].'.xml'));

$out=preg_replace('/item+\d+>/m', key($xml).'>', $xml->asXML());

$out=str_replace('<'.key($xml).'><'.key($xml).'>','<'.key($xml).'>',$out);

$out=str_replace('</'.key($xml).'></'.key($xml).'>','</'.key($xml).'>',$out);

$out=preg_replace('/<@root>+.*.+<\/@root>/m','',$out);
$out=preg_replace('/<@attributes>+.*.+<\/@attributes>/m','',$out);

//$out=preg_replace('/<@root>'.$doc["@root"].'</@root>/m','',$out);
//header('Content-Type: text/xml');

//print html_entity_decode($out);
unlink($_GET["Name"].'sozluk.txt');
unlink($_GET["Name"].'.txt');
unlink($_GET["Name"].'ar.txt');
//unlink($_GET["Name"].'.xml');
file_put_contents($_GET["Name"].'.xml', $out);
 echo '<script>window.location.replace("tables.php?end='.$_GET["Name"].'");</script>';
die();

}
else{

   echo '<script>location.reload();</script>';
}




function array_to_xml( $data, &$xml_data,$n=1 ) {
    global $i;
    global $sozluk;
    global $follow;
    global $done;

foreach( $data as $key => $value ) {
    if( is_numeric($key) ){
        $num=$key;
        $key = 'item'.$key; //dealing with <0/>..<n/> issues
    }
    if( is_array($value) ) {

        if($i>=$follow)
        {
            $subnode = $xml_data->addChild($key);
            array_to_xml($value, $subnode);
        }
        else
            array_to_xml($value, $xml_data,0);

        if((int)$i>(int)$follow+300)
        {
            $done=false;
            file_put_contents($_GET["Name"].'.txt', serialize($i));
            file_put_contents(iconv('UTF-8', 'WINDOWS-1252', $_GET["Name"].'.xml'), $xml_data->asXML());
            $string_data = serialize($sozluk);
            file_put_contents($_GET["Name"]."sozluk.txt", $string_data);
            break;
            die();
        }
    }
    else if($i>=$follow && $n) {
        if($value == strip_tags($value) && !filter_var($value, FILTER_VALIDATE_URL) && count_chars_unicode($value)>4){
            if(!$sozluk[$value][0])
            {

               $cevir= yandex_cevir($value);
               $sozluk[$value][0]=$cevir;
               $value=$cevir;

            }
            else{
                $value=$sozluk[$value][0];
            }

        }
        else if($value != strip_tags($value)){
          $str=$value;
          $value= html_entity_decode( strip_tags( $str ) );
          preg_match_all('/(?<!\pL|\pN)\pL+(?!\pL|\pN)/u', $value, $turkce);
          if(!$sozluk[$value][0])
          {
           $cevir= yandex_cevir($value);
           $sozluk[$value][0]=$cevir;
           $value=str_replace(array("\r\n", "\n\r", "\n"), "<br>", $cevir);

          }
          else
          {
            $value=$sozluk[$value][0];
          }
          if($_GET['html'])
          {
            preg_match_all('/(?<!\pL|\pN)\pL+(?!\pL|\pN)/u', $value, $ozbekce);
            $value= str_replace(array("\r\n", "\n\r", "\r", "\n"), "<br>", str_replace($turkce[0], $ozbekce[0], $str));
          }

        }

            $xml_data->addChild($key,htmlspecialchars($value));
    }
    $i++;



 }


//file_put_contents($_GET["Name"].".xml", $xml_data->asXML(),FILE_APPEND);
 //$done=true;

}


function yandex_cevir($text,$a=0){
    global $api_get;
    global $api_getg;
    global $sourcelang;
    global $tolang;
     $from = $sourcelang; //Çevirmek istediğiniz dil
      $to = $tolang; //Çevrilecek dil
    if(!$api_getg)
    {
        if(!$api_get)
            $api = 'trnsl.1.1.20190512T105350Z.0700c025130bcd71.37b5a90b70f88e6fe90d0bb1a9ce5ca945c1924a'; //Yandex'ten aldığınız translate api
        else
      $api = $api_get;
      $url = file_get_contents('https://translate.yandex.net/api/v1.5/tr.json/translate?key='.$api.'&lang='.$from.'-'.$to.'&text='.urlencode($text));
      $json = json_decode($url);
      if($a)
      return $json->code;
      else
      return $json->text[0];
    }
    else
    {
        $api = $api_getg;
        $url = file_get_contents('https://www.googleapis.com/language/translate/v2/?key='.$api.'&source='.$from.'&target='.$to.'&q='.urlencode($text));
      $json = json_decode($url);
      if($a)
      {
      if($json)
      return 200;
      }
      else
      {
      return htmlspecialchars_decode($json->data->translations[0]->translatedText, ENT_QUOTES);
      }
    }
}

//___________________________________


function xmlstr_to_array($xmlstr) {
  $doc = new DOMDocument();
  $doc->loadXML($xmlstr);
  $root = $doc->documentElement;
  $output = domnode_to_array($root);
  $output['@root'] = $root->tagName;
  return $output;
}
function domnode_to_array($node) {
  $output = array();
  switch ($node->nodeType) {
    case XML_CDATA_SECTION_NODE:
    case XML_TEXT_NODE:
      $output = trim($node->textContent);
    break;
    case XML_ELEMENT_NODE:
      for ($i=0, $m=$node->childNodes->length; $i<$m; $i++) {
        $child = $node->childNodes->item($i);
        $v = domnode_to_array($child);
        if(isset($child->tagName)) {
          $t = $child->tagName;
          if(!isset($output[$t])) {
            $output[$t] = array();
          }
          $output[$t][] = $v;
        }
        elseif($v || $v === '0') {
          $output = (string) $v;
        }
      }
      if($node->attributes->length && !is_array($output)) { //Has attributes but isn't an array
        $output = array('@content'=>$output); //Change output into an array.
      }
      if(is_array($output)) {
        if($node->attributes->length) {
          $a = array();
          foreach($node->attributes as $attrName => $attrNode) {
            $a[$attrName] = (string) $attrNode->value;
          }
          $output['@attributes'] = $a;
        }
        foreach ($output as $t => $v) {
          if(is_array($v) && count($v)==1 && $t!='@attributes') {
            $output[$t] = $v[0];
          }
        }
      }
    break;
  }
  return $output;
}


function count_chars_unicode($str, $x = false) {
  $i=0;
    $tmp = preg_split('//u', $str, -1, PREG_SPLIT_NO_EMPTY);
    foreach ($tmp as $c) {
        if(!is_numeric($c))
      $i++;
    }
    return $i;
}
?>

</html>
</body>
