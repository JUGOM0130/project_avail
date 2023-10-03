@extends('task.template')

@section('title', '一覧（Index）')
@section('contents')

    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">詳細</th>
                    <th scope="col">やりとり確認</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dt as $coll)
                    <tr>
                        <td><button type="button" onclick="location.href='{{ route('task.edit', ['id' => $coll->id]) }}'"
                                class="btn btn-outline-primary">編集:{{ $coll->id }}</button>
                        </td>
                        <td><a href=""></a>{{ $coll->title }}</td>
                        <td>{{ $coll->detail }}</td>
                        <td><button type="button"
                                onclick="location.href='{{ route('contact.edit', ['id' => $coll->contact_id]) }}'"
                                class="btn btn-outline-primary">確認:{{ $coll->id }}</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
