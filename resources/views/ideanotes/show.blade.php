<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IdeaNotes - Create</title>
</head>

<body>
    <style>
        body {
            margin: 0px;
        }

        iframe {
            width: 100%;
            min-height: 100vh;
            height: 100%;
        }
    </style>
    <iframe src="http://133.18.242.137/laravel/dmy" frameborder=0></iframe>
    <div class="container">

        <!-- カテゴリ -->
        <div class="row mb-3">
            {{ Form::label('category_id', 'カテゴリ', ['class' => 'col-sm-2 col-form-label', 'for' => 'category_id']) }}
            <div class="col-sm-10">
                {{ Form::select('category_id', ['1' => 'めも', '10' => 'IT'], $data->category_id, ['class' => 'form-select','disable'=>'true']) }}
            </div>
        </div>

        <!-- TITLE -->
        <div class="row mb-3">
            {{ Form::label('title', 'タイトル', ['class' => 'col-sm-2 col-form-label', 'for' => 'title']) }}
            <div class="col-sm-10">
                {{ Form::text('title', $data->title, ['class' => 'form-control','id'=>'title','readonly'=>'true']) }}
            </div>
        </div>

        <!-- BODY -->
        <div class="row mb-3">
            {{ Form::label('body', '内容', ['class' => 'col-sm-2 col-form-label', 'for' => 'body']) }}
            <div class="col-sm-10">
                {{ Form::textarea('body', $data->body, ['class' => 'form-control','id'=>'body','readonly'=>'true']) }}
            </div>
        </div>

        
        
    </div>
    @php
        /*bootstrapの読み込みを行っている*/
    @endphp
    @vite(['resources/sass/app.scss'])
</body>

</html>
