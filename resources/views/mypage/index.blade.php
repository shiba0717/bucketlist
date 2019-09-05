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

<h1>{{$user->name}}</h1>
<h2>{{$user->email}}</h2>

<h2>マイバケット</h2>
@foreach($buckets_yet as $bucket_yet)
    <h4>
       {{$bucket_yet->bucket_id}}:
      {{$bucket_yet->title}}
    <form style="display: inline" action="{{ route('done', ['id' => $bucket_yet->bucket_id]) }}" method="POST">
        @csrf
    <button type="submiy" class="btn btn-outline-success">達成した！️️</button>
    </form>
    </h4>

@endforeach

<br>
<br>

<h3>達成したバケット</h3>
@foreach($buckets_done as $bucket_done)
  <h4>
      {{$bucket_done->bucket_id}}:
      {{$bucket_done->title}}
      {{$bucket_done->created_at}}
  </h4>

@endforeach


@endsection