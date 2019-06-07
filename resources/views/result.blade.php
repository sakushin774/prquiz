<!DOCTYPE html>
<html lang="ja">
@include('layouts.header')
<body>

<div class="container col-lg-4 col-md-6 mt-3">
    <div class="row my-3 h2">
        <div class="col">
            結果発表
        </div>
    </div>

    <div class="row my-3 h3">
        <div class="col-7">
            正解数
        </div>
        <div class="col-5">
            {{session('correct')}} 問
        </div>
    </div>

    <div class="row my-3 h3">
        <div class="col-7">
            ヒント使用回数
        </div>
        <div class="col-5">
            {{session('hint')}} 回
        </div>
    </div>

    <div class="row my-3 h3 border-top pt-3">
        <div class="col-7">
            合計スコア
        </div>
        <div class="col-5">
            {{$point}} 点
        </div>
    </div>

    <button class="btn btn-twitter col-12 mt-3" data-sharer="twitter"
            data-title="{{$shareMessage}}"
            data-hashtags=""
            data-url="{{url()->to('/')}}">
        <i class="fab fa-twitter mx-1"></i>
        Twitterでシェア
    </button>
    <button class="btn btn-facebook col-12 mt-3" data-sharer="facebook"
            data-title="{{$shareMessage}}"
            data-url="{{url()->to('/')}}">
        <i class="fab fa-facebook-f mx-1"></i>
        Facebookでシェア
    </button>
    <button class="btn btn-line col-12 mt-3" data-sharer="line"
            data-title="{{$shareMessage}}"
            data-url="{{url()->to('/')}}">
        <i class="fab fa-line mx-1 align-text-bottom h4 my-0"></i>
        LINEでシェア
    </button>

    <a href="/" class="btn btn-outline-secondary col-12 my-4"><i class="mx-2 fas fa-arrow-left"></i>トップに戻る</a>
</div>
</body>
</html>
