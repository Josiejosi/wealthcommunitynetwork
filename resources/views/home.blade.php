@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="col-md-6 text-center">
                            @if ($showLink > 0)
                                <p class="text-center"><b>Link</b>{{ url( '/join' ) }}/{{ auth()->user()->username }}</p>
                            @else
                                <p class="text-center">You need to PH 1 successful order to get your link</p>
                            @endif
                        </div>
                        <div class="col-md-6 offset-md-3">
                            <div class="card">

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
                                                <input type="number" min="500" max="20000"
                                                        class="form-control {{ $errors->has('amount') ? ' is-invalid' : '' }}" 
                                                        name="amount" 
                                                        value="{{ old('amount') }}" required autofocus>
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
            </div>
        </div>
    </div>
@endsection
