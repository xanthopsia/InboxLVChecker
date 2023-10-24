<?php
class Scraping {
    private $url;

    public function __construct($url) {
        $this->url = $url;
    }

    public function scrapeSaltAndToken() {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            throw new Exception('cURL error: ' . curl_error($ch));
        }

        $dom = new DOMDocument();
        @$dom->loadHTML($response);
        $xpath = new DOMXPath($dom);
        $saltInput = $xpath->query('//input[@name="salt"]')->item(0);
        $tokenInput = $xpath->query('//input[@name="_token"]')->item(0);

        if ($saltInput && $tokenInput) {
            $salt = $saltInput->getAttribute('value');
            $token = $tokenInput->getAttribute('value');
            return [$salt, $token];
        } else {
            throw new Exception('Salt or token input field not found on the page.');
        }
    }
}