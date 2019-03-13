@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">


                        <div class="row">
                            <div class="col-12 text-center">
                                <h2 class="tm-block-title mb-4">Whats your investment plan</h2>
                            </div>
                        </div>

                        <form method="POST" action="{{ route('post_admin_allocation') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="admin" class="col-md-4 col-form-label text-md-right">{{ __('Admin') }}</label>

                                <div class="col-md-6">
                                    <select 
                                        class="form-control {{ $errors->has('admin') ? ' is-invalid' : '' }}" 
                                        name="admin" required autofocus>
                                        @foreach( $admins as $admin )
                                            <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                                        @endforeach
                                    </select> 
                                    @if ($errors->has('admin'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('admin') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="order" class="col-md-4 col-form-label text-md-right">{{ __('Order') }}</label>

                                <div class="col-md-6">
                                    <select
                                            class="form-control {{ $errors->has('order') ? ' is-invalid' : '' }}" 
                                            name="order" 
                                            value="{{ old('order') }}" required>

                                        @foreach( $orders as $order )

                                            <?php

                                                $user = \App\User::find( $order->sender_id ) ;
                                            ?>

                                            <option value="{{ $order->id }}">{{ $user->name }} - R {{ $order->amount  }}</option>
                                        @endforeach

                                    </select>

                                    @if ($errors->has('order'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('order') }}</strong>
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
