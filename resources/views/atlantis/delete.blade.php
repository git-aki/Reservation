@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ご予約のキャンセルが完了しました。</div>

                <div class="card-body">
                  こちらからHome画面にお戻りください。
                  <div class="probootstrap-cta-button-wrap"><a href="{{ route('home') }}" class="btn btn-primary">予約確認画面へ</a></div>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection