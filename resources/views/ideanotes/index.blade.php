<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IdeaNotes - Index</title>
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

    <div class="container">
        <a href="{{ route('ideanotes.create') }}">作成</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">CategoryId</th>
                    <th scope="col">Title</th>
                    <th scope="col">Body</th>
                    <th scope="col"></th>
                    <th scope="col"></th>

                </tr>
            </thead>
            <tbody>
                @foreach ($ideas as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->category_id }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->body }}</td>
                        <td><a href={{ route('ideanotes.edit', ['ideanote' => $item->id]) }}>編集</a></td>
                        <td><a href={{ route('ideanotes.show', ['ideanote' => $item->id]) }}>参照</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @vite(['resources/sass/app.scss'])
</body>

</html>
