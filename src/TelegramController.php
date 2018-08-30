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

    /* Api To Send And Receive Requests */
    public function sanEndpoint($api, array $content, $post = true)
    {
        $url = $this->api_url.$api.'?'.http_build_query($content);
        $response = $this->client->request('GET', $url);
        return json_decode($response->getBody()->getContents(), true);
    }

    /* Method For Testing */
    public function getMe()
    {
        return $this->sanEndpoint('getMe', [], false);
    }
    /* Send Message */
    public function sanSendMessage(){
        $params = [
            'chat_id' => $this->chatId,
            'text' => 'test from web deep'
        ];
        $res = $this->sanEndpoint('sendMessage', $params, false);
        return $res;
    }
    /* Get Messages */
    public function sanGetMessages(){
        $params = [
            'chat_id' => $this->chatId
        ];
        $res = $this->sanEndpoint('getMessages', $params, false);
        return $res;
    }
}
