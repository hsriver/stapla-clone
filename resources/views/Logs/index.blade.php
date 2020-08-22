@extends('layouts.app')

@section('content')
<h2 class="pb-3">タイムライン</h2>
<div class="logs-container mx-auto">
    @foreach ($logs as $log)
    <div class="card my-3">
        <div class="card-header d-flex align-items-center px-2">
            <div class="round-circle mr-1">
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

            <div class="log__materialInfo px-2">
                <a class="d-flex reset-link" href="{{ action('LogController@show', $log->id) }}">
                    <div class="log__materialImg w-25 p-1">
                        <img src="/storage/{{ $log->material->image }}" alt="">
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
                </a>
            </div>

        </div>
        {{-- <div class="card-footer text-muted">
                <a class="u-link-style--reset mr-2" href="#">
                    <i class="far fa-comment-alt"></i>
                    コメントする
                </a>
                <a class="u-link-style--reset" href="#">
                    <i class="far fa-thumbs-up"></i>
                    3
                </a>
            </div> --}}
    </div>
    @endforeach


</div>

@endsection