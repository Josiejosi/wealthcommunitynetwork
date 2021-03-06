@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Outgoing Transactions</div>

                    <div class="card-body">

                        <table class="table table-inverse">
                            <thead>
                                <tr>
                                    <th>Amount</th>
                                    <th>Days</th>
                                    <th>Status</th>
                                    <th>Percentage</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $outgoing as $order )
                                <tr>
                                    <td>R {{ $order->amount }}</td>
                                    <td>{{ $order->days }} days</td>
                                    <td>
                                        @if( $order->status == 0 )
                                        <span class="badge badge-info">Unallocated</span>
                                        @elseif ( $order->status == 1 )
                                        <span class="badge badge-info">Allocated</span>
                                        @elseif ( $order->status == 2 )
                                        <span class="badge badge-info">Members Paid</span>
                                        @elseif ( $order->status == 3 )
                                        <span class="badge badge-info">Received</span>
                                        @endif
                                    </td>
                                    <td>{{ $order->percentage }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
