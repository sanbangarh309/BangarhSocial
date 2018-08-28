<?php
namespace sandeep\BangarhSocial\Controllers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;

class LineController extends Controller
{

    private $channelAccessToken;
    private $channelSecret;
    private $webhookResponse;
    private $webhookEventObject;
    private $apiReply;
    private $apiPush;
    protected $client = null;

    
    public function __construct(){
        $this->channelAccessToken = Self::getChannelAccessToken();
        $this->channelSecret = Self::getChannelSecret();
        $this->apiReply = Self::getApiReply();
        $this->apiPush = Self::getApiPush();
        $this->webhookResponse = file_get_contents('php://input');
        $this->webhookEventObject = json_decode($this->webhookResponse);
        // if ($this->webhookResponse) {
        //     $this->sanAuthorization();
        // }else{
        //     echo json_encode(['msg'=>'App Not Connected']);die();
        // }
    }

    public function sanAuthorization(){ 
        $text = $this->getMessageText();
        $bot->reply($text);
        print_r($text);exit;
        // $token = env('FACEBOOK_TOKEN');
        // $line_id = env('LINE_ID');
        // $SECRET = env('LINE_SECRET');
        
        // $fbtoken = isset($_REQUEST['hub_verify_token']) ? $_REQUEST['hub_verify_token'] : '';
        // $challange = isset($_REQUEST['hub_challenge']) ? $_REQUEST['hub_challenge'] : '';
        // $this->setHubVerifyToken($vtoken);
        // $this->setaccessToken($token);
        // if (isset($_REQUEST['hub_challenge'])) {
        //     $chlge = $this->verifyTokken($fbtoken, $challange);
        //     if ($chlge) {
        //         echo $chlge; exit;
        //     }
        // }
        // $input = json_decode(file_get_contents('php://input'), true);
        // if ($input) {
        //     $message = $this->readMessage($input);
        //     $botmessage = $this->sendMessage($message);   
        // }
    }

    public function getChannelAccessToken(){
        $channelAccessToken = "p4Jrk+ERmgiWDL2BeP69F2w4hcw7BjUk2QByt0gufWQmYtzGsEOyLM39NGGpGTqu9Fe1V8o6EoAjI8s0CYSaVC2I/AGB0eBBtAeokX34nLLUli9sAYLQKQvH6jp/3EM2MQJT8/SbDTcHCm+H5fcvZgdB04t89/1O/w1cDnyilFU=";
        return $channelAccessToken;
    }
    public function getChannelSecret(){
        $channelSecret = "e815defa08f136f134a850f244574efd";
        return $channelSecret;
    }
    public function getApiReply(){
        $api = "https://api.line.me/v2/bot/message/reply";
        return $api;
    }
    public function getApiPush(){
        $api = "https://api.line.me/v2/bot/message/push";
        return $api;
    }

    private function httpPost($api,$body){
        $client = new Client();
        $header = array( 
            'Content-Type: application/json; charser=UTF-8', 
            'Authorization: Bearer '.$this->channelAccessToken);
        $result = $client->post($api, ['query' => $body, 'headers' => $header]);


        // $ch = curl_init($api); 
        // curl_setopt($ch, CURLOPT_POST, true); 
        // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST'); 
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        // curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body)); 
        // curl_setopt($ch, CURLOPT_HTTPHEADER, array( 
        //     'Content-Type: application/json; charser=UTF-8', 
        //     'Authorization: Bearer '.$this->channelAccessToken)); 
        // $result = curl_exec($ch); 
        // curl_close($ch); 
        return $result;
    }
    
    public function reply($text){
        $api = $this->apiReply;
        $webhook = $this->webhookEventObject;
        $replyToken = $webhook->{"events"}[0]->{"replyToken"}; 
        $body["replyToken"] = $replyToken;
        $body["messages"][0] = array(
            "type" => "text",
            "text"=>$text
            );
        
        $result = $this->httpPost($api,$body);
        return $result;
    }
    
    public function push($body){
        $api = $this->apiPush;
        $result = $this->httpPost($api, $body);
        return $result;
    }

    public function pushText($to, $text){
        $body = array(
            'to' => $to,
            'messages' => [
            array(
                'type' => 'text',
                'text' => $text
                )
            ]
            );
        $this->push($body);
    }

    public function pushImage($to, $imageUrl, $previewImageUrl = false){
        $body = array(
            'to' => $to,
            'messages' => [
            array(
                'type' => 'image',
                'originalContentUrl' => $imageUrl,
                'previewImageUrl' => $previewImageUrl ? $previewImageUrl : $imageUrl
                )
            ]
            );
        $this->push($body);
    }

    public function pushVideo($to, $videoUrl, $previewImageUrl){
        $body = array(
          'to' => $to,
          'messages' => [
          array(
            'type' => 'video',
            'originalContentUrl' => $videoUrl,
            'previewImageUrl' => $previewImageUrl
            )
          ]
          );
        $this->push($body);
    }

    public function pushAudio($to, $audioUrl, $duration){
        $body = array(
            'to' => $to,
            'messages' => [
            array(
                'type' => 'audio',
                'originalContentUrl' => $audioUrl,
                'duration' => $duration
                )
            ]
            );
        $this->push($body);
    }

    public function pushLocation($to, $title, $address, $latitude, $longitude){
        $body = array(
            'to' => $to,
            'messages' => [
            array(
                'type' => 'location',
                'title' => $title,
                'address' => $address,
                'latitude' => $latitude,
                'longitude' => $longitude
                )
            ]
            );
        $this->push($body);
    }
    
    public function getMessageText(){
        $webhook = $this->webhookEventObject;
        $messageText = $webhook->{"events"}[0]->{"message"}->{"text"}; 
        return $messageText;
    }
    
    public function postbackEvent(){
        $webhook = $this->webhookEventObject;
        $postback = $webhook->{"events"}[0]->{"postback"}->{"data"}; 
        return $postback;
    }
    
    public function getUserId(){
        $webhook = $this->webhookEventObject;
        $userId = $webhook->{"events"}[0]->{"source"}->{"userId"}; 
        return $userId;
    }
}
