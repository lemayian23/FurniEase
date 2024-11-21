<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NewPaymentController extends Controller
{
    public function index()
    {
        return view('newpayment', );
    }

    public function processPayment(Request $request)
    {
        $phoneNumber = $request->input('phone');
        $amount = $request->input('amount');

        // Step 1: Get the access token
        $consumerKey = 'CbkDwqFPGVmvyOpv5alGkmzbe0PyScCN0H96lemz5Dp4zHMj';
        $consumerSecret = 'uCoGbKv4Z5xWQqQAE6tCQnHwNmfA91uiXb8DAQ4rYfAZ2toPz5MNnhTdFHO1zb59';

        $response = Http::withBasicAuth($consumerKey, $consumerSecret)->get('https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials');

        $accessToken = $response->json()['access_token'];

        // Step 2: Initiate payment request
        $shortCode = '174379';
        $lipaNaMpesaOnlinePasskey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
        $timestamp = date('YmdHis');
        $password = base64_encode($shortCode . $lipaNaMpesaOnlinePasskey . $timestamp);

        $stkPushUrl = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';

        $response = Http::withToken($accessToken)->post($stkPushUrl, [
            'BusinessShortCode' => $shortCode,
            'Password' => $password,
            'Timestamp' => $timestamp,
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => $amount,
            'PartyA' => $phoneNumber,
            'PartyB' => $shortCode,
            'PhoneNumber' => $phoneNumber,
            'CallBackURL' => 'https://47gn24ff-8001.uks1.devtunnels.ms/newpayment/callback',
            'AccountReference' => 'Test123',
            'TransactionDesc' => 'Test Payment',
        ]);

        $result = $response->json();

        if ($result['ResponseCode'] == '0') {
            return back()->with('success', $result['CustomerMessage']);
        } else {
            return back()->with('error', $result['errorMessage']);
        }
    }

    public function callback(Request $request)
    {
        // Handle the M-Pesa callback here
    }
}