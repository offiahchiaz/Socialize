@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                {{-- <h3>Welcome to Socialize</h3> --}}
                <div class="card">
                    <div class="card-header">Profile</div>

                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-lg-5">
                                <!-- User information and statuses -->
                                @include('user.partials.userblock')
                                <hr>
                            </div>
                            <div class="col-lg-4 col-lg-offset-3">
                                <!-- Friendsm friend requests -->
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    
@endsection