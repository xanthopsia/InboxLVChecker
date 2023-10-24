<?php
class Login {
    private $url;
    private $userAgent;

    public function __construct($url, $userAgent) {
        $this->url = $url;
        $this->userAgent = $userAgent;
    }

    public function login($token, $salt, $username, $password) {
        $passhash = PasswordHashing::genPassHash($salt, $password);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['User-Agent: ' . $this->userAgent]);
        curl_setopt($ch, CURLOPT_COOKIE, "csrf_double_submit=$token;");
        curl_setopt($ch, CURLOPT_POSTFIELDS, "_token=$token&mailplus=0&language=lv&passhash=$passhash&redirect_url=https%3A%2F%2Fwww.inbox.lv%2F%3FactionID%3Dimp_login_&redirect_vars=&salt=$salt&imapuser=$username&pass=");
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);

        if ($response === false) {
            throw new Exception('cURL error: ' . curl_error($ch));
        } else {
            echo 'Response data: ' . $response;
        }

        curl_close($ch);
    }
}