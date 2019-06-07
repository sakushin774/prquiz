<!DOCTYPE html>
<html lang="ja">
@include('layouts.header')
<body>

<div class="container col-lg-4 col-md-6 mt-3">
    <div class="row">
        <div class="col h2">
            {{session('page')}}問目 ({{session('correct') ?? 0}}問正解)
        </div>
    </div>

    <div class="row my-4">
        <div class="col h4">
            @if($isCorrect)
                <span class="text-primary">おめでとうございます、正解です!!</span>
            @else
                <span class="text-danger">残念、不正解です...</span>
            @endif
        </div>
    </div>

    <div class="row my-2 h2">
        <div class="col">
            解答
        </div>
    </div>

    <div class="row my-2">
        <div class="col">
            <div>企業ID:{{$ans['company_id']}}</div>
            <div>リリースID:{{$ans['release_id']}}</div>
        </div>
    </div>

    <div class="row my-2 h4">
        <div class="col">
            <div>{{$ans['data']['title']}}</div>
        </div>
    </div>

    <div class="row my-2">
        <div class="col">
            <div>{{$ans['data']['company_name']}}</div>
        </div>
    </div>

    <div class="text-center px-0 mx-auto">
        <img class="img-fluid" height="200" src="{{$ans['data']['main_image']}}" />
    </div>

    <div class="row my-2">
        <div class="col">
            <div>{{$ans['data']['subtitle']}}</div>
        </div>
    </div>

    <div class="row my-2">
        <div class="col">
            <div>{{$ans['data']['head']}}</div>
        </div>
    </div>

    <div class="row my-2">
        <div class="col">
            <a href="https://prtimes.jp/main/html/rd/p/{{str_pad($ans['release_id'], 9, '0', STR_PAD_LEFT)}}.{{str_pad($ans['company_id'], 9, '0', STR_PAD_LEFT)}}.html"
               target="_blank">PR TIMES で続きを見る</a>
        </div>
    </div>

    <a href="/quiz" class="btn btn-primary my-3">次の問題へ</a>
</div>
</body>
</html>
