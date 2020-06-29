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

                                    @if (!$friends->count())
                                        <p>You have no friends.</p>
                                    @else
                                        @foreach ($friends as $user)
                                            @include('user.partials.userblock')
                                        @endforeach
                                    @endif
                            </div>
                            <div class="col-lg-6">
                                <!-- Friend request -->
                                <h3>Friend requests</h3>
                                    @if (!$requests->count())
                                        <p>You have no friend requests.</p>
                                    @else
                                        @foreach ($requests as $user)
                                            @include('user.partials.userblock')
                                        @endforeach
                                    @endif
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    
@endsection