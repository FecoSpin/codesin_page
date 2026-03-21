<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Email;
use Auth;
use Config;
use MailchimpMarketing\ApiClient;
use MailchimpMarketing\ApiException;
class MailchimpTest extends Controller
{
    //
    public $mailchimp;

    protected $listId;

    public function __construct()
    {
        $this->mailchimp = new ApiClient();
        $this->mailchimp->setConfig([
            'apiKey' => env('MAILCHIMP_API_KEY'),
            'server' => env('MAILCHIMP_SERVER_PREFIX'), // ej: us10
        ]);

        $this->listId = env('MAILCHIMP_LIST_ID');
    }
    public function subscribe(Request $request)
    {
        try {
            $this->mailchimp->lists->addListMember($this->listId, [
                "email_address" => $request->email,
                "status" => "subscribed"
            ]);

            Email::firstOrCreate(['email' => $request->email]);

            return ['status' => 'success', 'msg' => 'Email suscrito con éxito'];

        } catch (ApiException $e) {
            $body = json_decode($e->getResponseBody());

            if (isset($body->title) && $body->title === 'Member Exists') {
                return ['status' => 'error', 'msg' => 'Email ya está suscrito'];
            }

            return [
                'status' => 'error',
                'msg' => $body->detail ?? $e->getMessage(),
                'code' => $e->getCode(),
            ];
        }
    }
}
