<?php
namespace sandeep\BangarhSocial\Controllers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class TelegramController extends Controller
{

    private $AccessToken;
    private $chatId;
    private $msgs;
    private $api_url;
    protected $client = null;

    
    public function __construct(){
        $this->AccessToken = '553313789:AAGAAaJeE74LjIXjt85_8fXLtloSp9P5tfE';
        $this->chatId = '615889828';
        $this->api_url = 'https://api.telegram.org/bot553313789:AAGAAaJeE74LjIXjt85_8fXLtloSp9P5tfE/';
        $this->client = new Client();
        //$this->sanSendMessage();
    }

    public function sanEndpoint($api, array $content, $post = true)
    {
        $url = 'https://api.telegram.org/bot'.$this->AccessToken.'/'.$api;
        if ($post) {
            $reply = $this->client->post($url, $content);
        } else {
            $reply = $this->client->post($url, [], false);
        }
        return json_decode($reply, true);
    }

    public function sanSendMessage(){
        $params = [
            'chat_id' => $this->chatId,
            'text' => 'test from web bangarh'
        ];
        $header = array( 
            'Content-Type: application/json; charser=UTF-8', 
            'Authorization: Bearer '.$this->AccessToken);
        $re_url = $this->api_url.'sendMessage?'.http_build_query($params);
        $response = $client->request('GET', $re_url);
        return json_decode($response->getBody()->getContents());
    }
}
