@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                {{-- <h3>Welcome to Socialize</h3> --}}
                <div class="card">
                    <div class="card-header">Results</div>

                    <div class="card-body">
                        <h3>Your search for {{ Request::input('query')}} </h3>

                        @if (!$users->count())
                            <p>No results found, sorry.</p>
                        @else
                            <div class="row">
                                <div class="col-lg-12">
                                    @foreach ($users as $user)
                                        @include('user.partials.userblock')
                                    @endforeach
 
                                </div>
                            </div>
                        @endif

                        
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection