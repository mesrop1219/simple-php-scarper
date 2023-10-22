<?php

namespace  App\Query;

use GuzzleHttp\Client;

class  Query
{
    private  $client;
    private array $xpaths = [
        "texts_xpath" => '//*[@id="post-480"]/div[1]/section/p/a'
    ];

    public  function __construct()
    {
        $this->client = new Client();

    }

    private function request_data(string $url)
    {
        $req = $this->client->get($url);
        $dom = new \DOMDocument();
        $dom->loadHTML(strval($req->getBody()));

        return new \DOMXPath($dom);
    }
    public function get_texts()
    {
        $data = $this->request_data(URL);
        $articles = $data->evaluate($this->xpaths["texts_xpath"]);
        $articles_data = [];

        for ($i = 4; $i <= 40; $i++)
        {
            $article = $articles[$i];

            $articles_data[] = [
                "link" => $article->getAttribute("href"),
                "title" => $article->getAttribute("title"),
            ];
        }

        return $articles_data;
    }
}