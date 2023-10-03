@extends('task.template')

@section('title', '編集（Edit）')
@section('contents')
    {{ Form::open(['route' => ['task.update'], 'method' => 'put']) }}
    @csrf
    @method('put')

    <div>
        {{ Form::hidden('contact_id', $dt->contact_id) }}
        {{ Form::hidden('id', $dt->id) }}
    </div>
    <div class="mt-3">
        <div class="mb-3">
            {{ Form::label('title', 'Title', ['class' => 'form-label']) }}
            {{ Form::text('title', $dt->title, ['class' => 'form-control', 'id' => 'title']) }}
        </div>
        <div class="mb-3">
            {{ Form::label('detail', '詳細', ['class' => 'form-label']) }}
            {{ Form::textarea('detail', $dt->detail, ['class' => 'form-control', 'id' => 'detail', 'rows' => '3']) }}
        </div>
    </div>
    {{-- Form --}}
    {{ Form::submit('更新', ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}
@endsection
