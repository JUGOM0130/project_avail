@extends('task.template')

@section('title', '作成（Create）')
@section('contents')
    {{ Form::open(['route' => ['task.store'], 'method' => 'post']) }}
    @csrf
    @method('post')

    <div>
        {{ Form::hidden('contact_id', $contact_id) }}
    </div>
    <div class="mt-3">
        <div class="mb-3">
            {{ Form::label('title', 'Title', ['class' => 'form-label']) }}
            {{ Form::text('title', null, ['class' => 'form-control', 'id' => 'title']) }}
        </div>
        <div class="mb-3">
            {{ Form::label('detail', '詳細', ['class' => 'form-label']) }}
            {{ Form::textarea('detail', null, ['class' => 'form-control', 'id' => 'detail', 'rows' => '3']) }}
        </div>
    </div>
    {{-- Form --}}
    {{ Form::submit('登録', ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}
@endsection
