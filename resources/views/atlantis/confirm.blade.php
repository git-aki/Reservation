@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col">
      <div class="card">
        <div class="card-header">お問い合わせ内容の確認</div>

        <div class="card-body">
          <div>内容の確認をして間違いない場合は送信ボタンを押してください。</div>

          <div class="list-group mb-3" style="max-width:700px; margin:auto;">
            <form method="post" action="{{ route('process') }}">
              <div class="form-group">
              @csrf
              <dl class="mb-0 list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                <dt>Name</dt>
                <dd class="mb-0"><input class="form-control" type="text" name="name" value="{{ $request->name }}" readonly></dd>
              </dl>

              <dl class="mb-0 list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                <dt>Email</dt>
                <dd class="mb-0"><input class="form-control" type="text" name="email" value="{{ $request->email }}" readonly></dd>
              </dl>

              <dl class="mb-0 list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                <dt>Message</dt>
                <dd class="mb-0"><textarea class="form-control" rows=10 cols=50 name="body" readonly>{{ $request->body }}</textarea></dd>
              </dl>
              <button class="btn btn-primary btn-lg p-2 mt-2" type="submit" name="back" formaction="{{ route('contact') }}" formmethod="post" >訂正する</button>
              <button class="btn btn-primary btn-lg p-2 mt-2" type="submit">送信</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection