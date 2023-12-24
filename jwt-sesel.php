        $url = "https://ciam.telkomsel.com/iam/v1/oauth2/realms/tsel/authorize?client_id=8358628d8a070b0f472fcbd4def4ba7d&redirect_uri=http%3A%2F%2Fmytelkomsel.com%2Foauth2_callback&response_type=code&nonce=true&scope=profile%20openid%20phone%20identifier&csrf=" . $tokenId;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_COOKIEJAR => $cookieFilePath,
            CURLOPT_COOKIEFILE => $cookieFilePath,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded',
                'Host: ciam.telkomsel.com',
                'User-Agent: okhttp/4.9.2',
                'Cookie: iPlanetDirectoryPro=' . $tokenId,
            ),
        ));

        $response = curl_exec($curl);
        $headerInfo = curl_getinfo($curl);
        curl_close($curl);
        //ambil data url location
        $url = $headerInfo['url'];
