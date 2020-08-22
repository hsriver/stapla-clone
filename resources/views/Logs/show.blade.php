@extends('layouts.app')

@section('content')

<div class="logs-container mx-auto">
    @if (Auth::user() == $log->user)
    <a href="{{ action('LogController@showEditForm', $log->id) }}" class="btn btn-outline-secondary btn-sm"
        role="button" aria-pressed="true">編集</a>
    <form action="/logs/{{ $log->id }}/delete" method="post" class="d-inline-block">
        @csrf
        <input type="submit" class="btn btn-outline-secondary btn-sm" aria-pressed="true" value="削除">
    </form>
    @endif
    <div class="card my-3">
        <div class="card-header d-flex align-items-center px-2">
            <div class="round-circle mr-2">
                <a class="d-block" href="/">
                    <img class="rounded-circle log__userIcon" src="{{ $log->user->image }}" alt="">
                </a>
            </div>
            <div class="log__userName font-weight-bolder">
                {{ $log->user->name }}
            </div>
            <div class="log_created_at text-muted small ml-auto">
                {{ $log->datetime }}
            </div>
        </div>
        <div class="card-body">
            <p class="card-text">{{ $log->comment }}</p>
            <div class="log__materialInfo">
                <div class="d-flex">
                    <div class="log__materialImg w-25 p-1">
                        <a class="d-block" href="">
                            <img src="/storage/{{ $log->material->image }}" alt="">
                        </a>
                    </div>
                    <div class="log__info w-75 pr-3">
                        <div class="log__materialName d-table h-50 w-100">
                            <div class="d-table-cell align-middle h-100 pl-3">
                                {{ $log->material->material_name }}
                            </div>
                        </div>
                        <div class="log__studyTime d-table h-50 w-100">
                            <div class="d-table-cell align-middle h-100 pl-3">
                                <i class="fas fa-history"></i>
                                {{ $log->study_hour }}時間
                                {{ $log->study_minute }}分

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <hr> --}}
            {{-- <div class="log-like mt-3">
                    <div class="log-like-1">
                        <i class="far fa-thumbs-up"></i>
                        いいね
                        <div class="log-like-more float-right">
                            <a href="#">もっと見る</a>
                        </div>
                    </div>

                    <div class="log-like__user">
                        <div class="log__userIcon round-circle d-inline-block mx-1">
                            <a class="d-block" href="/">
                                <img class="rounded-circle" src="{{ $log->user->image }}" alt="">
            </a>
        </div>
        <div class="log__userIcon round-circle d-inline-block mx-1">
            <a class="d-block" href="/">
                <img class="rounded-circle" src="{{ $log->user->image }}" alt="">
            </a>
        </div>
    </div>
</div>
<hr>
<div class="log-comment">
    <a class="u-link-style--reset mr-2" href="#">
        <i class="far fa-comment-alt"></i>
        コメントする
    </a>

    <div class="log-comment my-2">
        <div class="d-flex align-items-center">
            <div class="log__userIcon round-circle mr-2">
                <a class="d-block" href="/">
                    <img class="rounded-circle" src="{{ $log->user->image }}" alt="">
                </a>
            </div>
            <div class="log__userName font-weight-bolder">
                {{ $log->user->name }}
            </div>
            <div class="log_created_at text-muted small ml-auto">
                {{ $log->created_at }}
            </div>
        </div>
        <div class="mt-2">
            アクションメソッドがちゃんと呼び出されないのやめてくれー！！url生成わからんのだ！！
            早くLaravel案件やりたいな～～～～～～～～
        </div>
    </div>
</div> --}}
</div>
</div>
</div>


@endsection