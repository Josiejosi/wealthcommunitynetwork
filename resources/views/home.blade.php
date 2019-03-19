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
                        <div class="container m-2">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Sent</h5>
                                            <h6 class="card-subtitle mb-2">R {{ $outgoing_sum }}</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Received</h5>
                                            <h6 class="card-subtitle mb-2">R {{ $incoming_sum }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       <div class="container m-2">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Link</h5>
                                            @if ( auth()->user()->role == 1 || auth()->user()->role == 2 )
                                                @if ($showLink > 0)
                                                    <h6 class="card-subtitle mb-2">{{ url( '/join' ) }}/{{ auth()->user()->username }}</h6>
                                                @else
                                                    <h6 class="card-subtitle mb-2">You need to PH 1 successful order to get your link</h6>
                                                @endif

                                            @else
                                               <h6 class="card-subtitle mb-2">{{ url( '/join' ) }}/{{ auth()->user()->username }}</h6>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                        <div class="container m-2 text-center">
                            <div class="row">
                                <div class="col-md-12">

                                    <a href="{{ url( '/create/order' ) }}" class="btn btn-success">Provide HELP</a>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
