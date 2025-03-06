<?php

namespace App\Services;
use GuzzleHttp\Client;
class AiService
{
    private $client;
    private $apiUrl;
    private $apiKey;
    public function __construct()
    {
        $this->client = new Client();
        $this->apiUrl = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=";
        $this->apiKey = "AIzaSyD6p2rs_2kTpGrWYuM4sEXTcdt0_fu0HM0";
    }
    public function getAdviceAi($expenses)
    {
       $formatedExpense = "";
        foreach ($expenses as $expense) {
            if ($expense->type == 'ponctuel') {
                $formatedExpense .= " type : {{$expense->type}} title : {{$expense->title}} category : {{$expense->category->category_name}} amount : {{$expense->amount}} date: {{$expense->date_depense}}\n ";
            } elseif ($expense->type == 'recurente') {
                $formatedExpense .= "{{$expense->type}} {{$expense->title}} for {{$expense->category->category_name}} : {{$expense->amount}} on {{$expense->start_date}}\n ";
            }
        }
        $prompt = "give me a financial advice for budget management in 2-3 sentences: \n " . $formatedExpense;
        // $data = [
        //     'contents' => [
        //         'parts' =>  [
        //             'text' => $prompt,
        //         ]
        //     ]
        //         ];
        $request = $this->client->post($this->apiUrl . $this->apiKey, [
            'headers' => [
                'Content-type' => 'application/json'
            ],
            'json' => [
                'contents' => [
                    'parts' =>  [

                        'text' => $prompt,
                    ]
                ]
            ],
        ]);
        $response = json_decode($request->getBody()->getContents(), true);
        $advice = $response['candidates'][0]['content']['parts'][0]['text'];
        return $advice;
    }
}
