@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h5>Welcome to {{ config('app.name', 'Laravel') }}</h5>
            <p>
                <b>🎇Keeper system here you pay 15% to your upliner then you will pay 35% in 2 to 72 hours then keep your 50% you will pay before you gh. 20% recommit fororo khohlwa you won't get a link before you ph</b>.
            </p>
            <h5><b>💎 minimum R 500 maximum R 20000💎</b></h5>
            <ul>
                <li>This is a mix good of Short Term , Middle Term and Long Term Investment</li>
                <li>Pay 15% to your upline</li>
                <li>You won't be able use your link without a pledge</li>
                <li>Your PH will unlock your link</li>
                <li>No hit and runs, no rushing of orders</li>
                <li>Respect is key</li>
                <li>Upliners please guide and assist your downliners every step</li>
                <li>Support available from 8:00am till 21:00pm everyday,  holidays included</li>
            </ul>
            <h5><b><i class="fa fa-exclamation" aria-hidden="true"></i> NOTE:</b> Important</h5>
            <ul>
                <li>Withdraw your funds when they mature</li>
                <li>Choose a plan that will suit your pocket, the aim is to make money not to destroy</li>
                <li>12 hours to pay your order</li>
                <li>12 hours to pay your upliner otherwise you will be blocked </li>
                <li>🔮25% recommit is a must.</li>
                <li>Let's address issues with admin until we get the right solution</li>
                <li>Remember negativity kills and we are here to build</li>
                <li>Let us respect each other and work as a team</li>
            </ul>
            <h5><b>💃🏻 Let's change the way we treat stokvels and protect our investment</b></h5>

        </div>

        <div class="col-12 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                <h2 class="tm-block-title">Order List</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" colspan="2" class="text-center text-capitalize">Our Percentages</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="tm-status-circle moving">
                                </div>7 days
                            </td>
                            <td><b>50%</b></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="tm-status-circle moving">
                                </div>15 days
                            </td>
                            <td><b>75%</b></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="tm-status-circle moving">
                                </div>20 days
                            </td>
                            <td><b>100%</b></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection
