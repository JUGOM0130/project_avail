<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ContactIndex</title>

</head>

<body>
    <div class="container">
        <div class="my-3">
            <button type="button" class="btn btn-outline-secondary" onclick="location.href='{{ route('task.index') }}'">
                タスク一覧（TaskIndex）
            </button>
        </div>
        <div class="mb-3">

            <button class="btn btn-outline-secondary" onclick="location.href='{{ route('contact.index') }}'">
                一覧（Index）
            </button>
            <button class="btn btn-outline-secondary" onclick="location.href='{{ route('contact.create') }}'">
                作成（Create）
            </button>

        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">-</th>
                    <th scope="col">案件名</th>
                    <th scope="col">優先度</th>
                    <th scope="col">詳細</th>
                    <th scope="col">開始日</th>
                    <th scope="col">終了日</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($all as $item)
                    <tr>
                        <th scope="row">
                            <button class="btn btn-outline-primary"
                                onclick="location.href='{{ route('contact.edit', ['id' => $item->id]) }}'">
                                編集：{{ $item->id }}
                            </button>
                        </th>
                        <td>{{ $item->project_name }}</td>
                        <td>{{ $item->priority }}</td>
                        <td>{{ $item->detail }}</td>
                        <td>{{ $item->start }}</td>
                        <td>{{ $item->end }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @vite(['resources/sass/app.scss'])
</body>

</html>
