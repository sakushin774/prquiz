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
    <div class="row my-2 h2">
        <div class="col">
            説明
        </div>
    </div>
    <div class="row my-2">
        <div class="col">
            <div>
                リリースのメイン画像を見て正しいと思われるタイトルを選択して下さい。
            </div>
            <div>
                ヒントも使うことができますが、その分点数は低くなりますのでご注意下さい。
            </div>
            <div>
                問題は全部で10問あります。
            </div>
        </div>

    </div>

    <a href="/quiz" class="btn btn-primary my-3">クイズを始める</a>
</div>
</body>
</html>
