@extends('layouts.app')

@section('content')
<section class="probootstrap-section">
    <div class="container">
      <div class="row">
        <div class="col">
          <h2 class="mt0">お問い合わせありがとうございました。</h2>
          <div>
                  こちらからMAIN画面にお戻りください。
                  <div class="probootstrap-cta-button-wrap"><a href="{{ route('index') }}" class="btn btn-primary">MAIN画面へ</a></div>  
          </div>
        </div>
      </div>
    </div>
</section>

@endsection