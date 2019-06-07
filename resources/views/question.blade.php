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
        <a class="hint" data-toggle="collapse" href="#company_name" role="button" aria-expanded="false" aria-controls="collapseExample">
            企業名
        </a>
        <div class="collapse" id="company_name">
            <div class="card card-body">
                企業名 : <span class="hint"></span>
            </div>
        </div>
    </div>

    <div class="my-3">
        <a data-toggle="collapse" href="#main_category_name" role="button" aria-expanded="false" aria-controls="collapseExample">
            ビジネスカテゴリ
        </a>
        <div class="collapse" id="main_category_name">
            <div class="card card-body">
                メインカテゴリ : <span class="hint"></span>
                {{--サブカテゴリ : {{$ans['data']['sub_category_name']}}--}}
            </div>
        </div>
    </div>

    <div class="my-3">
        <a data-toggle="collapse" href="#created_at" role="button" aria-expanded="false" aria-controls="collapseExample">
            配信日時
        </a>
        <div class="collapse" id="created_at">
            <div class="card card-body">
                配信日時 : <span class="hint"></span>
            </div>
        </div>
    </div>

    <div class="my-3">
        <a data-toggle="collapse" href="#keywords" role="button" aria-expanded="false" aria-controls="collapseExample">
            キーワード
        </a>
        <div class="collapse" id="keywords">
            <div class="card card-body">
                キーワード : <span class="hint"></span>
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
<script>
    let usedHints = [];
    $(document).ready(function() {
      $('.collapse').on('show.bs.collapse', function(){
        let type = this.id;
        let $collapse = $(this);
        if(usedHints.indexOf(type) === -1){
          usedHints.push(type);
          $.ajax({
            url: '/hint/' + type,
            success: function(data) {
              console.log('hoge');
              $collapse.find('.hint').text(data)
            }
          });
        }
      });
    });
</script>
</body>
</html>
