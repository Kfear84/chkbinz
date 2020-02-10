<?php
header('Content-Type: application/json');
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://bincheck.io/");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,"bin=".$_GET['bin']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$server_output = curl_exec($ch);
curl_close ($ch);
preg_match_all('/<td width="60%" style="text-align: left;">(.*?)<\/td>/m', $server_output, $matches);
preg_match_all('/<td style="text-align: left;">(.*?)<\/td>/m', $server_output, $brand);

if($brand[1][0]){
    $result['brand'] = trim( str_replace('</b>', '', str_replace('<b>', '', $brand[1][0])) );
}else{
    $result['brand'] =  '-';
}
if($matches[1][0]){
    $result['bin'] = str_replace('</b>', '', str_replace('<b>', '', $matches[1][0]));
}else{
    $result['bin'] =  '-';
}
if($matches[1][1]){
    $result['type'] = trim($matches[1][1]);
}else{
    $result['type'] =  '-';
}
if($matches[1][2]){
    $result['level'] = trim( $matches[1][2]);
}else{
    $result['level'] =  '-';
}
if($matches[1][3]){
    $result['issuer'] = trim( $matches[1][3]);
}else{
    $result['bank'] =  '-';
}
if($matches[1][4]){
    $result['web'] = trim( $matches[1][4]);
}else{
    $result['web'] =  '-';
}
if($matches[1][5]){
    $result['phone'] = trim( $matches[1][5]);
}else{
    $result['phone'] =  '-';
}
if($matches[1][6]){
    $result['country'] = trim( $matches[1][6]);
}else{
    $result['country'] =  '-';
}
if($matches[1][8]){
    $result['code'] = trim( $matches[1][8]);
}else{
    $result['county_code'] =  '-';
}
if($matches[1][9]){
    $result['county_name'] = trim( $matches[1][9]);
}else{
    $result['county_name'] =  '-';
}
if($matches[1][10]){
    $result['currency'] = trim( $matches[1][10] );
}else{
    $result['currency'] =  '-';
}
$result['Status'] =  '200 OK';
echo json_encode($result);

?>
