<?php
namespace App\Application\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class FutureXIntegration extends Model{

    const GRANT_TYPE = 'client_credentials';
    const CLIENT_ID = '9e41c692-767c-43f7-9458-a87f0cc86a11';
    const CLIENT_SECRET = 'B25DiAT1iwYc';
    const CURLOPT_URL = 'https://integration-futurex.nelc.gov.sa/oauth/token';



    public function getToken()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://integration-futurex.nelc.gov.sa/oauth/token',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'grant_type='.self::GRANT_TYPE.'&client_id='.self::CLIENT_ID.'&client_secret='.self::CLIENT_SECRET,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded',
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);



        $jsonStart = strpos($response, '{');
        $jsonEnd = strrpos($response, '}') + 1;
        $jsonString = substr($response, $jsonStart, $jsonEnd - $jsonStart);

        $result = json_decode($jsonString, true);
        return $result ;

    }

    public function enrollmentProgress($postdata)
    {


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://integration-futurex.nelc.gov.sa/enrollment-progress?_format=json',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>$postdata,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer '.$this->getToken()['access_token']
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $jsonStart = strpos($response, '{');
        $jsonEnd = strrpos($response, '}') + 1;
        $jsonString = substr($response, $jsonStart, $jsonEnd - $jsonStart);

        $result = json_decode($jsonString, true);
        return $result ;

    }

    public function generateCertificate($postdata)
    {


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://integration-futurex.nelc.gov.sa/certificate?_format=json',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>$postdata,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer '.$this->getToken()['access_token']
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $jsonStart = strpos($response, '{');
        $jsonEnd = strrpos($response, '}') + 1;
        $jsonString = substr($response, $jsonStart, $jsonEnd - $jsonStart);

        $result = json_decode($jsonString, true);
        return $result ;

    }




}