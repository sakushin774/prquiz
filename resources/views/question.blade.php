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

    <div class="row my-2">
        <div class="col">
            <div>企業ID:{{$ans['company_id']}}</div>
            <div>リリースID:{{$ans['release_id']}}</div>
        </div>
    </div>

    <div class="text-center px-0 mx-auto">
        <img class="img-fluid" height="200" src="{{$ans['data']['main_image']}}" />
    </div>

    <div class="h4 mt-3">ヒント</div>
    <div class="my-3">
        <a data-toggle="collapse" href="#hintCompanyName" role="button" aria-expanded="false" aria-controls="collapseExample">
            企業名
        </a>
        <div class="collapse" id="hintCompanyName">
            <div class="card card-body">
                企業名 : {{$ans['data']['company_name']}}
            </div>
        </div>
    </div>

    <div class="my-3">
        <a data-toggle="collapse" href="#hintBusiCate" role="button" aria-expanded="false" aria-controls="collapseExample">
            ビジネスカテゴリ
        </a>
        <div class="collapse" id="hintBusiCate">
            <div class="card card-body">
                メインカテゴリ : {{$ans['data']['main_category_name']}}
                サブカテゴリ : {{$ans['data']['sub_category_name']}}
            </div>
        </div>
    </div>

    <div class="my-3">
        <a data-toggle="collapse" href="#hintReleasedAt" role="button" aria-expanded="false" aria-controls="collapseExample">
            配信日時
        </a>
        <div class="collapse" id="hintReleasedAt">
            <div class="card card-body">
                配信日時 : {{$ans['data']['created_at']}}
            </div>
        </div>
    </div>

    <div class="my-3">
        <a data-toggle="collapse" href="#hintKeyword" role="button" aria-expanded="false" aria-controls="collapseExample">
            キーワード
        </a>
        <div class="collapse" id="hintKeyword">
            <div class="card card-body">
                キーワード : {{implode(',', $ans['data']['keywords'])}}
            </div>
        </div>
    </div>
    <div class="form-group my-4">
        <form method="post" action="/answer">
            {{ csrf_field() }}
            <label for="answerForm">正しいタイトルを選択して下さい</label>
            <select name="num" class="form-control" id="answerForm">
                @foreach ($titles as $t)
                    <option value="{{$loop->index}}">{{$t}}</option>
                @endforeach
            </select>
            <input type="submit" value="回答を送信する" class="btn btn-primary my-3">
        </form>
    </div>
</div>
</body>
</html>
