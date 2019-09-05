@extends('layouts.index')

@section('head')
    <script>
        (function() {
            'use strict';

            // フラッシュメッセージのfadeout
            $(function(){
                $('.flash_message').fadeOut(3000);
            });

        })();

    </script>
@endsection

@section('content')
    <!-- フラッシュメッセージ -->
    @if (session('my_status'))
        <div class="flash_message bg-success text-center py-3 my-0">
            {{ session('my_status') }}
        </div>
    @endif

    <div class="container mt-4">
        @foreach ($posts as $post)
            <div class="card mb-4">
                <div class="card-header">
                    {{ $post->title }}
{{--                    @if($isAnswerd)--}}
{{--                        <form style="display: inline" action="{{ route('add', ['post' => $post]) }}" method="POST">--}}
{{--                            @csrf--}}
{{--                            <button type="submit" class="btn btn-success">＋</button>--}}
{{--                        </form>--}}
{{--                        @else--}}
                        <form style="display: inline" action="{{ route('add', ['post' => $post]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-success">＋</button>
                        </form>
{{--                    @endif--}}
                </div>
                <div class="card-body">
                    <p class="card-text">
                        {!! nl2br(e(str_limit($post->body, 200))) !!}
                    </p>
                    <a class="card-link" href="{{ route('posts.show', ['post' => $post]) }}">
                        続きを読む
                    </a>
                </div>
                <div class="card-footer">
                    <span class="mr-2">
                        投稿日時 {{ $post->created_at->format('Y.m.d') }}
                    </span>

                    @if ($post->comments->count())
                        <span class="badge badge-primary">
                            コメント {{ $post->comments->count() }}件
                        </span>
                    @endif
                    <p>バケットした人数：{{ $post->yet }}
                       達成した人数：{{ $post->done }}</p>

                </div>
            </div>
        @endforeach
            <div class="d-flex justify-content-center mb-5">
                {{ $posts->links() }}
            </div>
    </div>
@endsection