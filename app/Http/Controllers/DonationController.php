<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class DonationController extends Controller
{
    public function index()
    {
        return view('pages.donation');
        // return view('pages.donation-unavailable');
    }

    private function getAccessToken()
    {
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Authorization' => 'Basic ' . base64_encode(config('paypal.client_id') . ':' . config('paypal.secret')),
        ];

        $response = Http::withHeaders($headers)
            ->withBody('grant_type=client_credentials', 'application/x-www-form-urlencoded')
            ->post(config('paypal.base_url') . '/v1/oauth2/token');

        return json_decode($response->body())->access_token;
    }

    public function create(Request $request)
    {

        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        // $id = uuid_create();
        $id = (string) Str::uuid();

        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $this->getAccessToken(),
            'PayPal-Request-Id' => $id,
        ];

        $body = [
            'intent' => 'CAPTURE',
            'purchase_units' => [
                [
                    'reference_id' => $id,
                    'amount' => [
                        'currency_code' => config('paypal.currency'),
                        'value' => number_format($request->amount, 2)
                    ]
                ]
            ],
            'application_context' => [
                'return_url' => route('donations.success'),
                'cancel_url' => route('donations.cancel')
            ]
        ];

        $response = Http::withHeaders($headers)
            ->post(config('paypal.base_url') . '/v2/checkout/orders', $body);

        if (Auth::check()) {
            Session::put('user_id', Auth::id());
        }
        Session::put('donation_id', $id);

        return json_decode($response->body());
    }

    public function complete()
    {
        $url = config('paypal.base_url') . '/v2/checkout/orders/' . request('donation_id') . '/capture';

        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $this->getAccessToken(),
        ];

        $response = Http::withHeaders($headers)
            ->post($url, null);

        return json_decode($response->body());
    }

    public function success(Request $request)
    {
        return view('pages.donation-success');
    }

    public function admin()
    {
        // $donations = Donation::orderBy('id', 'desc')->paginate(10);
        $donations = Message::orderBy('id', 'desc')->paginate(10);

        return view('admin.donations.index', compact('donations'));
    }
}
