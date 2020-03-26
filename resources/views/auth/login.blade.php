@extends('back-end.layout.app')
@section('title')
    Login  Page
@endsection





@section('content')
    @component('back-end.layout.header',['nav_title'=>"LoginPage",'folderName'=> "users",'trashed'=>''])

    @endcomponent

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">{{ __('Login') }}</h4>
                    <p class="card-category">Login With Email & Password</p>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        @php $input = "email"; @endphp
                        <div class="col-md-12 my-3">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">{{ __('E-Mail Address') }}</label>
                                <input type="email" name="{{ $input }}" class="form-control @error($input) is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error($input)
                                <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        @php $input = "password"; @endphp
                        <div class="col-md-12 my-3">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Password</label>
                                <input type="password" name="{{ $input }}" class="form-control @error($input) is-invalid @enderror" required autocomplete="current-password">
                                @error($input)
                                <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group  mb-0 my-3">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>


















@endsection
