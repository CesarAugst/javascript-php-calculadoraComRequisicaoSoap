<?php
// SOAP practice file
ini_set('soap.wsdl_cache_enabled', 0);
ini_set('soap.wsdl_cache_ttl', 900);
ini_set('default_socket_timeout', 15);

$client = new SoapClient('http://www.dneonline.com/calculator.asmx?WSDL', array('trace' => 1));
//var_dump($client->__getFunctions()); //help

//var_dump($_POST); //post
$numA = $_GET['numA'];
$numB = $_GET['numB'];
$operacao = $_GET['operacao'];

try {
    $params = array('intA' => $numA, 'intB' => $numB);
} catch (SoapFault $fault){
    $fault->getMessage();
}

switch ($operacao) {
    case '+':
        $objResult = $client->Add($params);
        $result = $objResult->AddResult;
        break;
    case '-':
        $objResult = $client->Subtract($params);
        $result = $objResult->SubtractResult;
        break;
    case '/':
        $objResult = $client->Divide($params);
        $result = $objResult->DivideResult;
        break;
    case '*':
        $objResult = $client->Multiply($params);
        $result = $objResult->MultiplyResult;
        break;
}


echo "[{$result}]";
//echo "REQUEST:\n" . $client->__getLastRequest() . "\n";
