<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PR QUIZ</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/css/app.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    {{--<script src="https://cdn.jsdelivr.net/npm/sharer.js@latest/sharer.min.js"></script>--}}
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>

    <script src="/js/app.js"></script>
    <!-- CSSとJavaScript -->
</head>

<body>

<div class="container col-lg-4 col-md-6 mt-3">
    <div class="row">
        <div class="col h1">
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
