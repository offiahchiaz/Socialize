@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                {{-- <h3>Welcome to Socialize</h3> --}}
                <div class="card">
                    <div class="card-header">Friends</div>

                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-lg-6">
                                <!-- Your friends -->

                                <h3>Your friends</h3>
                            </div>
                            <div class="col-lg-6">
                                <!-- Friend request -->

                                <h3>Friend requests</h3>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    
@endsection