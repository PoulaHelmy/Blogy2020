
@extends('back-end.layout.app')
@section('title')
    Resiter Page
@endsection





@section('content')
    @component('back-end.layout.header',['nav_title'=>"Resiter Page",'folderName'=> "users",'trashed'=>''])

    @endcomponent

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">{{ __('Register') }}</h4>
                    <p class="card-category">Register With UserName & Email & Password</p>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        @php $input = "name"; @endphp
                        <div class="col-md-12 my-3">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">{{ __('Name') }}</label>
                                <input type="text" name="{{ $input }}" class="form-control @error($input) is-invalid @enderror"  value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error($input)
                                <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        @php $input = "email"; @endphp
                        <div class="col-md-12 my-3">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">{{ __('E-Mail Address') }}</label>
                                <input type="email" name="{{ $input }}" class="form-control @error($input) is-invalid @enderror"  value="{{ old('email') }}" required autocomplete="email" autofocus>
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
                                <label class="bmd-label-floating">{{ __('Password') }}</label>
                                <input type="password" name="{{ $input }}" class="form-control @error($input) is-invalid @enderror" required autocomplete="new-password">
                                @error($input)
                                <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        @php $input = "password_confirmation"; @endphp
                        <div class="col-md-12 my-3">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">{{ __('Confirm Password') }}</label>
                                <input type="password" name="{{ $input }}" class="form-control @error($input) is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error($input)
                                <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>




                        <div class="form-group my-12">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>






                    </form>
                </div>
            </div>
        </div>

    </div>


















@endsection
