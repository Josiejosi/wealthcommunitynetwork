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

                        @if (  count( $outgoing ) > 0 )

                            @foreach( $outgoing as $out )

                                @if ( $out->status == 1 )

                                    <?php

                                        $user = \App\User::find( $out->user_id ) ;
                                    ?>

                                    <table class="table">
                                        <tr><td colspan="2" class="text-center">Outgoing Order - Pending</tr>
                                        <tr><td colspan="2" class="text-center">Raiming time: {{ $out->expires_at }}</td> </tr>
                                        <tr>
                                            <td>Name</td>
                                            <td>{{ $user->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Phone</td>
                                            <td>{{ $user->phone }}</td>
                                        </tr>
                                        <tr>
                                            <td>Bank</td>
                                            <td>{{ $user->account->bank_name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Account</td>
                                            <td>{{ $user->account->account_number }}</td>
                                        </tr>
                                        <tr>
                                            <td>Account Type</td>
                                            <td>{{ $user->account->account_type }}</td>
                                        </tr>
                                        <tr>
                                            <td>Amount</td>
                                            <td><h3>R {{ $out->amount }}</h3></td>
                                        </tr>
                                        <tr><td colspan="2" class="text-center">
                                            <a href="{{ url( '/cash_deposited' ) }}/{{ $out->id }}" class="btn btn-success">
                                                Cash Deposited
                                            </a>
                                        </td></tr>
                                    </table>

                                @elseif ( $out->status == 2 )
                                    <?php

                                        $user = \App\User::find( $out->user_id ) ;
                                    ?>

                                    <table class="table">
                                        <tr><td colspan="2" class="text-center">Outgoing Order - Pending</td></tr>
                                        <tr><td colspan="2" class="text-center">Raiming time: {{ $out->expires_at }}</td> </tr>
                                        <tr>
                                            <td>Name</td>
                                            <td>{{ $user->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Phone</td>
                                            <td>{{ $user->phone }}</td>
                                        </tr>
                                        <tr>
                                            <td>Amount</td>
                                            <td><h3>R {{ $out->amount }}</h3></td>
                                        </tr>
                                        <tr><td colspan="2" class="text-center"><span class="badge badge-info"> Awaiting Member Confirmation</span></td></tr>
                                    </table>
                                @endif

                            @endforeach


                        @endif


                        @if ( count( $incoming ) > 0 )

                            @foreach( $incoming as $in )

                                @if ( $in->status == 2 || $in->status == 1 )

                                    <?php

                                        $user = \App\User::find( $in->sender_id ) ;
                                    ?>

                                    <table class="table">
                                        <tr><td colspan="2" class="text-center">Incoming Order</td></tr>
                                        <tr>
                                            <td>Name</td>
                                            <td>{{ $user->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Phone</td>
                                            <td>{{ $user->phone }}</td>
                                        </tr>
                                        <tr>
                                            <td>Amount</td>
                                            <td><h3>R {{ $in->amount }}</h3></td>
                                        </tr>
                                        <tr><td colspan="2" class="text-center"><a href="{{ url('/cash_received') }}/{{ $in->id }}" class="btn btn-success"> Received Cash</a></td></tr>
                                    </table>

                                @endif

                            @endforeach

                        @endif

                        <div class="col-md-6 text-center">
                            @if ( auth()->user()->role == 1 || auth()->user()->role == 2 )
                                @if ($showLink > 0)
                                    <p class="text-center"><b>Link: </b>{{ url( '/join' ) }}/{{ auth()->user()->username }}</p>
                                @else
                                    <p class="text-center">You need to PH 1 successful order to get your link</p>
                                @endif

                            @else
                                <p class="text-center"><b>Link: </b>{{ url( '/join' ) }}/{{ auth()->user()->username }}</p>
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
