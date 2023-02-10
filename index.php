<?php
/* Created by Stowe 
 Please keep the author's comment if you copy or modify this file. Thank you ! 
 Nếu bạn đinh copy hoặc sửa đổi file này, vui lòng giữ lại comment của tác giả. Cảm ơn ! 
 */
//==========================[setup bot]==========================//
$botToken = " "; // Enter your bot token
$website = "https://api.telegram.org/bot".$botToken;
error_reporting(0);
$update = file_get_contents('php://input');
$update = json_decode($update, TRUE);
$print = print_r($update);
$chatId = $update["message"]["chat"]["id"];
$gId = $update["message"]["from"]["id"];
$userId = $update["message"]["from"]["id"];
$firstname = $update["message"]["from"]["first_name"];
$usernamee = $update["message"]["from"]["username"];
$message = $update["message"]["text"];
$message_id = $update["message"]["message_id"];
function GetStr($string, $start, $end){
    $str = explode($start, $string);
    $str = explode($end, $str[1]);  
    return $str[0];
    };
function multiexplode($delimiters, $string)
    {
      $one = str_replace($delimiters, $delimiters[0], $string);
      $two = explode($delimiters[0], $one,$string);
      return $two;
    }
function random_strings($length_of_string) 
    {
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
        return substr(str_shuffle($str_result),  
                           0, $length_of_string); 
    
    }
function sendMessage ($chatId, $message, $message_id){
        $url = $GLOBALS[website]."/sendMessage?chat_id=".$chatId."&text=".$message."&reply_to_message_id=".$message_id."&parse_mode=HTML";
        file_get_contents($url);
    }
//==========================[Main]==========================//
    //////////=========[Start Command]=========//////////

    if (strpos($message, "/start") === 0){
    sendMessage($chatId, "<b>Hello @$usernamee!!%0AType /gpt <text> to start chat", $message_id);

   }
   //////////=========[gpt Command]=========//////////
   elseif (strpos($message, "/gpt") === 0){
    $text = substr($message, 5);
    $data = '{
      "model": "text-davinci-003",
      "prompt": "'.$text.'",
      "max_tokens": 100, 
      "temperature": 0
    }';
    //In max_tokens you can set custom tokens coin. If you set it higher, your bill will be higher and you get more text.
  
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://api.openai.com/v1/completions');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json',
      'Authorization: Bearer YOUR_API_KEY'
  ));
  //In Authorization: Bearer you can GET your API key from https://platform.openai.com/account/api-keys
  $response = curl_exec($ch);
  $response = json_decode($response, true);
  $result = $response['choices'][0]['text'];
  $text = trim($result);
  
  sendMessage($chatId, "$text", $message_id);
  }
  
      
