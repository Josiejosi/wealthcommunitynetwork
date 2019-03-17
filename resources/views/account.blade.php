@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Account Update</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 text-center">
                                <h2 class="tm-block-title mb-4">Change your Banking Details</h2>
                            </div>
                        </div>

                        <form method="POST" action="{{ route('account') }}" class="tm-login-form">
                            @csrf

                            <div class="form-group row">
                                <label for="bank" class="col-md-4 col-form-label text-md-right">{{ __('Bank') }}</label>

                                <div class="col-md-6">
                                    <input type="text" 
                                        class="form-control {{ $errors->has('bank') ? ' is-invalid' : '' }}" 
                                        value="{{ auth()->user()->account->bank_name }}" 
                                        name="bank" required autofocus>
                                    @if ($errors->has('bank'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('bank') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="account_holder" class="col-md-4 col-form-label text-md-right">{{ __('Account Holder') }}</label>

                                <div class="col-md-6">
                                    <input type="text" 
                                        class="form-control {{ $errors->has('account_holder') ? ' is-invalid' : '' }}" 
                                        value="{{ auth()->user()->account->account_holder }}" 
                                        name="account_holder">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="account_number" class="col-md-4 col-form-label text-md-right">{{ __('Account Number') }}</label>

                                <div class="col-md-6">
                                    <input type="text" 
                                        class="form-control {{ $errors->has('account_number') ? ' is-invalid' : '' }}" 
                                        value="{{ auth()->user()->account->account_number }}" 
                                        name="account_number" required>
                                    @if ($errors->has('account_number'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('account_number') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="account_type" class="col-md-4 col-form-label text-md-right">{{ __('Account Type') }}</label>

                                <div class="col-md-6">
                                    <input type="text" 
                                        class="form-control {{ $errors->has('account_type') ? ' is-invalid' : '' }}" 
                                        value="{{ auth()->user()->account->account_type }}" 
                                        name="account_type" required>
                                    @if ($errors->has('account_type'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('account_type') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-danger btn-block">
                                        {{ __('Update') }}
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
