@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="GET" action="{{ route('admin.user_search') }}">
              <div class="form-row">
                <div class="col">
                  <input id="q" type="text" class="form-control" name="q" value="{{ $q }}" autocomplete="q" autofocus placeholder="{{ __('Name or Email') }}">
                </div>
                <div class="col-auto">
                  <button type="submit" class="btn btn-primary">
                      {{ __('Search') }}
                  </button>
                </div>
              </div>
            </form>
        </div>

        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            @if(!empty($users))
            {{ __('SearchResult') }} : {{ __('SearchCount', ['num' => $users->total()]) }}
            <div class="card" style="margin-bottom: 20px;">
                <div class="card-header">{{ __('UserList') }}</div>

                <div class="card-body">

                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>{{ __('ID') }}</th>
                          <th>{{ __('Name') }}</th>
                          <th>{{ __('E-Mail Address') }}</th>
                          <th>{{ __('CreateDate') }}</th>
                          <th>{{ __('UpdateDate') }}</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($users as $user)
                      <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format('Y/m/d') }}</td>
                        <td>{{ $user->updated_at->format('Y/m/d') }}</td>
                      </tr>
                      @endforeach
                      </tbody>
                    </table>
                </div>
            </div>

            <div class="paginate">
                {{ $users->appends(Request::only('q'))->links() }}
            </div>

            @endif

        </div>
    </div>
</div>
@endsection
