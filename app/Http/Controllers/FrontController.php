<?php
/**
 * Created by PhpStorm.
 * User: Shinya
 * Date: 2019/06/07
 * Time: 4:48
 */

namespace App\Http\Controllers;


use App\Question;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        session()->flush();
        return view('index');
    }

    public function question()
    {
        $q = new Question();
        session([
            'answerNum' => $q->getAnswerNum(),
            'answer' => $q->getAnswer(),
            'page' => session('page') + 1
        ]);

        return view('question', [
            'answerNum' => $q->getAnswerNum(),
            'ans' => $q->getAnswer(),
            'titles' => $q->getTitleList()
        ]);
    }

    public function answer(Request $request)
    {
        $predict = $request->input('num');
        $actual = session('answerNum');
        $isCorrect = ($predict == $actual);

        session([
            'correct' => session('correct') + intval($isCorrect)
        ]);

        return view('answer', [
            'ans' => session('answer'),
            'isCorrect' => $isCorrect,
            'predict' => $predict
        ]);
    }

    public function result()
    {
        return view('result');
    }
}
