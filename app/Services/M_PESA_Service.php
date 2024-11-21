namespace App\Services;

use GuzzleHttp\Client;

class M-Pesa_Service
{
protected $client;
protected $baseUrl;

public function __construct()
{
$this->client = new Client();
$this->baseUrl = env('MPESA_API_URL');
}

public function getAccessToken()
{
$response = $this->client->request('GET', "{$this->baseUrl}/v1/oauth2/token", [
'auth' => [env('MPESA_CONSUMER_KEY'), env('MPESA_CONSUMER_SECRET')],
'query' => ['grant_type' => 'client_credentials']
]);

return json_decode($response->getBody())->access_token;
}

public function lipaNaMpesa($phoneNumber, $amount, $callbackUrl)
{
$accessToken = $this->getAccessToken();

$response = $this->client->request('POST', "{$this->baseUrl}/v1/payment/request", [
'headers' => [
'Authorization' => 'Bearer ' . $accessToken,
'Content-Type' => 'application/json',
],
'json' => [
'BusinessShortCode' => env('MPESA_LIPA_NA_MPESA_SHORTCODE'),
'Password' => base64_encode(env('MPESA_LIPA_NA_MPESA_SHORTCODE') . env('MPESA_PASSKEY') . date('YmdHis')),
'Timestamp' => date('YmdHis'),
'TransactionType' => 'CustomerPayBillOnline',
'Amount' => $amount,
'PartyA' => $phoneNumber,
'PartyB' => env('MPESA_LIPA_NA_MPESA_SHORTCODE'),
'PhoneNumber' => $phoneNumber,
'CallBackURL' => $callbackUrl,
'AccountReference' => 'YourAccountRef',
'TransactionDesc' => 'Payment for goods',
],
]);

return json_decode($response->getBody());
}
}