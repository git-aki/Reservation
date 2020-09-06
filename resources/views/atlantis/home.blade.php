@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col">
      <div class="card">
        <div class="card-header">予約確認画面</div>
            @if (isset($not))
                {{ $not }}
            @else
            <div class="card-body">
                @foreach($reservations as $reservation)
                  <div class="list-group mb-3" style="max-width:700px; margin:auto;">
                    <div>{{ $counta }}件目の予約</div>
                      <dl class="mb-0 list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        <dt>部屋</dt>
                        <dd class="mb-0">{{ $reservation->room }}room</dd>
                      </dl>
                      <dl class="mb-0 list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        <dt>チェックイン日</dt>
                        <dd class="mb-0">{{ $reservation->check_in }}</dd>
                      </dl>
                      <dl class="mb-0 list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        <dt>チェックアウト日</dt>
                        <dd class="mb-0">{{ $reservation->check_out }}</dd>
                      </dl>
                      <dl class="mb-0 list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        <dt>大人</dt>
                        <dd class="mb-0">{{ $reservation->adults }}</dd>
                      </dl>
                      </dl>
                      <dl class="mb-0 list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        <dt>子供</dt>
                        <dd class="mb-0">{{ $reservation->children }}</dd>
                      </dl>
                      @if(((strtotime($reservation->check_in) - strtotime(date('Y-m-d'))) / (60 * 60 * 24)) >= 7)
                      <dl class="mb-0 list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        <dt>{{ $counta }}件目の予約の取り消しはこちらから</dt>
                            <form method="POST" action="{{ route('delete') }}">
                                @csrf
                          <dd class="mb-0"><button class="btn btn-primary btn-lg p-2" type="submit" name="id" value="{{ $reservation->id }}">キャンセル</button></dd>
                            </form>
                      </dl>
                      @else
                      <dl class="mb-0 list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        <dt>check_inが
                            @if((strtotime($reservation->check_in) - strtotime(date('Y-m-d'))) / (60 * 60 * 24) == 0)
                                本日
                            @else
                                {{ (strtotime($reservation->check_in) - strtotime(date('Y-m-d'))) / (60 * 60 * 24) }}日前
                            @endif    
                                の為予約の取り消しは出来ません。</dt>
                      </dl>
                      @endif
                  </div>
                  <br>
                  <div class="d-none">{{ $counta++ }}</div>
                  @endforeach
                </div>
                @endif
      </div>
    </div>
  </div>
</div>

@endsection