<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ContactCreate</title>
</head>

<body>
    <div class="container">
        <?php //https://zenn.dev/snail_tanishi/articles/laravel_form
        ?>

        <h3 class="mt-3">Create</h3>
        {{ Form::open(['route' => ['contact.store'], 'method' => 'post']) }}
        @csrf
        @method('post')
        <div class="mb-3 mt-3">
            <label for="project_name" class="form-label">案件名</label>
            <input type="text" name="project_name" id="project_name" class="form-control">
        </div>
        <div class="mb-3">
            <label for="priority" class="form-label">優先度</label>
            {{ Form::select('priority', ['10' => 'S', '20' => 'A', '30' => 'B', '40' => 'C'], ['selected' => '30'], ['class' => 'form-control']) }}
        </div>

        <div class="mb-3">
            <label for="detail" class="form-label">詳細</label>
            <textarea name="detail" id="detail" rows="3" class="form-control"></textarea>
        </div>
        <div class="mb-3" id="app">
            @php
                $num = 1;
            @endphp
            <txa-compo :item_num="{{ $num }}"></txa-compo>
        </div>

        <div class="mb-3">
            <div class="row">
                <div class="col">
                    <label for="start" class="form-label">開始日</label>
                    <input type="date" name="start" id="start" class="form-control">
                </div>
                <div class="col">
                    <label for="end" class="form-label">終了日</label>
                    <input type="date" name="end" id="end" class="form-control">
                </div>
            </div>
        </div>
        {{-- Form --}}
        {{ Form::submit('送信', ['class' => 'btn btn-primary']) }}
        {{ Form::close() }}

        @vite(['resources/js/contact/create.js', 'resources/sass/app.scss'])
    </div>
</body>

</html>
