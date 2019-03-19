@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Provide HELP</div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col-12 text-center">
                                <h2 class="tm-block-title mb-4">Whats your investment plan</h2>
                            </div>
                        </div>

                        <form method="POST" action="{{ route('ph') }}" class="tm-login-form">
                            @csrf

                            <div class="form-group row">
                                <label for="amount" class="col-md-4 col-form-label text-md-right">{{ __('Amount') }}</label>

                                <div class="col-md-6">
                                    <select 
                                        class="form-control {{ $errors->has('amount') ? ' is-invalid' : '' }}" 
                                        name="amount" 
                                        value="{{ old('amount') }}" required autofocus>

                                        <option value="500">R 500</option>
                                        <option value="750">R 750</option>
                                        <option value="1000">R 1000</option>
                                        <option value="1500">R 1500</option>
                                        <option value="2000">R 2000</option>
                                        <option value="2500">R 2500</option>
                                        <option value="3000">R 3000</option>
                                        <option value="3500">R 3500</option>
                                        <option value="4000">R 4000</option>
                                        <option value="4500">R 4500</option>
                                        <option value="5000">R 5000</option>
                                        <option value="5500">R 5500</option>
                                        <option value="6000">R 6000</option>
                                        <option value="6500">R 6500</option>
                                        <option value="7000">R 7000</option>
                                        <option value="7500">R 7500</option>
                                        <option value="8000">R 8000</option>
                                        <option value="8500">R 8500</option>
                                        <option value="9000">R 9000</option>
                                        <option value="10000">R 10000</option>
                                        <option value="15000">R 15000</option>
                                        <option value="20000">R 20000</option>

                                    </select>

                                    <span class="text-hide">Minimum R 500 Maximum R 20000</span> 
                                    @if ($errors->has('amount'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('amount') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="number_of_days" class="col-md-4 col-form-label text-md-right">{{ __('Number of days') }}</label>

                                <div class="col-md-6">
                                    <select
                                            class="form-control {{ $errors->has('number_of_days') ? ' is-invalid' : '' }}" 
                                            name="number_of_days" 
                                            value="{{ old('number_of_days') }}" required>

                                        <option value="3">3 days - 30%</option>
                                        <option value="7">7 days - 50%</option>
                                        <option value="15">15 days - 75%</option>
                                        <option value="20">20 days - 100%</option>

                                    </select>

                                    @if ($errors->has('number_of_days'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('number_of_days') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        {{ __('Create') }}
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
