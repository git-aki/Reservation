@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            @if(!empty($reservations))
            <div class="card" style="margin-bottom: 20px;">
                <div class="card-header">@if(strstr($_SERVER['REQUEST_URI'],'all_reservation') == true)全@endif予約リスト</div>

                <div class="card-body">

                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>{{ __('ID') }}</th>
                          <th>{{ __('User_id') }}</th>
                          <th>{{ __('User_name') }}</th>
                          <th>{{ __('Room') }}</th>
                          <th>{{ __('Check_in') }}</th>
                          <th>{{ __('Check_out') }}</th>
                          <th>{{ __('Adults') }}</th>
                          <th>{{ __('Children') }}</th>
                          <th>{{ __('CreateDate') }}</th>
                          <th>{{ __('UpdateDate') }}</th>
                          @if(strstr($_SERVER['REQUEST_URI'],'index') == true) <th>受付</th> @endif
                          @if(strstr($_SERVER['REQUEST_URI'],'all_reservation') == true) <th>受付日時</th> @endif
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($reservations as $reservation)
                      <tr>
                        <td>{{ $reservation->id }}</td>
                        <td>{{ $reservation->users_id }}</td>
                        <td>{{ $reservation->name }}様</td>
                        <td>{{ $reservation->room }}room</td>
                        <td>{{ $reservation->check_in }}</td>
                        <td>{{ $reservation->check_out }}</td>
                        <td>{{ $reservation->adults }}人</td>
                        <td>{{ $reservation->children }}人</td>
                        <td>{{ $reservation->created_at->format('Y/m/d') }}</td>
                        <td>{{ $reservation->updated_at->format('Y/m/d') }}</td>
                        <td>
                        @if(strstr($_SERVER['REQUEST_URI'],'index') == true)
                          <form method="POST" action="{{ route('admin.acceptance') }}">@csrf<button type="submit" class="btn btn-primary" name="id" value="{{ $reservation->id }}">来店</button></form>
                        @endif
                        @if((strstr($_SERVER['REQUEST_URI'],'all_reservation') == true) && isset($reservation->deleted_at))
                          {{ $reservation->deleted_at->format('m/d H:i') }}
                        @endif
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
            <div class="paginate">
                {{ $reservations->links() }}
            </div>
            @endif

        </div>
    </div>
</div>
@endsection
