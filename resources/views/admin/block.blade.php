@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">                        
                        <table class="table table-inverse">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $users as $user )
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td><a href="#" class="btn btn-sm btn-danger">Block</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table></div>

                    <div class="card-body">

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
