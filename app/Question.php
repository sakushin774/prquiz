<?php
/**
 * Created by PhpStorm.
 * User: Shinya
 * Date: 2019/06/07
 * Time: 4:51
 */

namespace App;


class Question
{
    private $answer;
    private $answerNum;
    private $titleList;

    public function __construct()
    {
        $page = rand(1, 10000);
        $listUrl = 'https://9b199e13.prtimes.tech/list/' . $page;
        $response = json_decode(file_get_contents($listUrl), true);
        $this->titleList = collect($response['data'])->pluck('title');
        $this->answerNum = rand(0, 19);
        $this->answer = self::fetchReleaseDetail(
            $response['data'][$this->answerNum]['company_id'],
            $response['data'][$this->answerNum]['release_id']
        );
    }

    /**
     * @return mixed
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * @return mixed
     */
    public function getAnswerNum()
    {
        return $this->answerNum;
    }

    /**
     * @return mixed
     */
    public function getTitleList()
    {
        return $this->titleList;
    }

    private static function fetchReleaseDetail($company_id, $release_id)
    {
        $detailUrl = 'https://9b199e13.prtimes.tech/detail/' . $company_id . '/' . $release_id;
        $response = json_decode(file_get_contents($detailUrl), true);
        return $response;
    }

    public static function getNonduplicateRandList($num, $min, $max)
    {
        $random = range( $min, $max);
        shuffle( $random );
        return array_slice($random, 0, $num);
    }
}
