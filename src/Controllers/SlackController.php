<?php
namespace sandeep\BangarhSocial\Controllers;

use App\Http\Controllers\Controller;
use sandeep\BangarhSocial\Commands\SlackResponseFactory;
use sandeep\BangarhSocial\Commands\CurlInteractor;
use sandeep\BangarhSocial\Commands\SlackCommands;

class SlackController extends Controller
{

    private $AccessToken;
    private $appId;
    private $api_url;
    protected $client = null;
    protected $san_int;

    
    public function __construct(){
        $this->AccessToken = 'Dwsh0CNs6KyjD7vmTVXf3hJq';
        $this->appId = 'ACJFNT2TG';
        $this->api_url = 'https://slack.com/api';
        $interactor = new CurlInteractor;
        $interactor->setResponseFactory(new SlackResponseFactory);
        $this->san_int = $interactor;
        // $this->client = new SlackCommands($this->AccessToken, $interactor);
        //$this->sanSendMessage();
    }
    /* Send Message */
    public function sanSendMessage(){
        // $response = $this->client->execute('chat.postMessage', [
        //     'channel' => '#notify',
        //     'text'    => 'Hello, world!'
        // ]);
        $params = [
            'text' => 'test from web sandeep'
        ];
        $request_headers = array();
        $request_headers[] = 'Content-type: application/json';
        $url = 'https://hooks.slack.com/services/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';
        $res = $this->san_int->post($url, [], $params, $request_headers,true);
        echo '<pre>';print_r($res);
        exit;
    }
    /* Get Messages */
    public function sanGetMessages(){
        $params = [
            'chat_id' => $this->chatId
        ];
        $res = $this->sanEndpoint('getMessages', $params, false);
        echo '<pre>';print_r($res);exit;
        return $res;
    }
}
