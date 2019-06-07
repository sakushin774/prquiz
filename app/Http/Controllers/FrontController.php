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
        session(['correct' => 0, 'hint' => 0, 'page' => 0]);
        return view('index');
    }

    public function question()
    {
        if(is_null(session('page'))){
            return redirect('/');
        } elseif(session('page') >= 10) {
            return redirect('/result');
        }

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
        if(is_null(session('ans'))){
            return redirect('/');
        }
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
        if(is_null(session('page'))){
            return redirect('/');
        }
        $point = session('correct') * 10 - session('hint') * 2;
        $shareMessage = '合計スコアは' . $point . '点でした。 - プレスリリースクイズならPR QUIZ';
        return view('result', ['point' => $point, 'shareMessage' => $shareMessage]);
    }

    public function hint($type)
    {
        $types = ['company_name', 'main_category_name', 'created_at', 'keywords'];
        if(in_array($type, $types) && session('answer')){
            session(['hint' => session('hint') + 1]);
            $ans = session('answer');
            return $ans['data'][$type];
        }else{
            return 'bad request';
        }
    }
}
