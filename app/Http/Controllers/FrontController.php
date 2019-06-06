<?php
/**
 * Created by PhpStorm.
 * User: Shinya
 * Date: 2019/06/07
 * Time: 4:48
 */

namespace App\Http\Controllers;


use App\Question;

class FrontController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function question()
    {
        $q = new Question();
        session(['answerNum' => $q->getAnswerNum()]);
        return view('layouts.app.blade.php', [
            'answer' => $q->getAnswer(),
            'titleList' => $q->getTitleList()
        ]);
    }

    public function result()
    {
        return view('result');
    }
}