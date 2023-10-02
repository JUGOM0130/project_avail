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
        <h3 class="mt-3">Edit</h3>
        {{ Form::open(['route' => ['contact.update'], 'method' => 'put']) }}
        @csrf
        @method('put')
        <div>
            <input type="hidden" name="id" id="id" value="{{ $dt->id }}">
        </div>

        <div class="mb-3 mt-3">
            <label for="project_name" class="form-label">案件名</label>
            <input type="text" name="project_name" id="project_name" class="form-control"
                value="{{ $dt->project_name }}">
        </div>

        <div class="mb-3">
            <label for="priority" class="form-label">優先度</label>
            {{ Form::select('priority', ['10' => 'S', '20' => 'A', '30' => 'B', '40' => 'C'], ['selected' => $dt->priority], ['class' => 'form-control']) }}
        </div>
        <div class="mb-3">
            <label for="detail" class="form-label">詳細</label>
            <textarea name="detail" id="detail" rows="3" class="form-control">{{ $dt->detail }}</textarea>
        </div>

        <div id="app" class="mb-3">
            @php
                //配列の生成
                $ex_array = [];
                foreach ($dt->exchanges as $item) {
                    $ex_array[] = $item->exchange;
                }
            @endphp
            <txa-compo :val_json="{{ json_encode($dt->exchanges) }}"></txa-compo>
        </div>


        <div class="mb-3">
            <div class="row">
                <div class="col">
                    <label for="start" class="form-label">開始日</label>
                    <input type="date" name="start" id="start" class="form-control" value="{{$dt->start}}">
                </div>
                <div class="col">
                    <label for="end" class="form-label">終了日</label>
                    <input type="date" name="end" id="end" class="form-control" value="{{$dt->end}}">
                </div>
            </div>
        </div>
        {{-- Form --}}
        {{ Form::submit('送信', ['class' => 'btn btn-primary']) }}
        {{ Form::close() }}

        @vite(['resources/js/contact/edit.js', 'resources/sass/app.scss'])
    </div>
</body>

</html>
