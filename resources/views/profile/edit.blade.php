@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                {{-- <h3>Welcome to Socialize</h3> --}}
                <div class="card">
                    <div class="card-header">Edit Profile</div>

                    <div class="card-body">
                       
                      <div class="row">
                          <div class="col-lg-6">
                              <form class="form-vertical" role="form" method="post" action="/profile/edit">
                                  @csrf

                                  <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="firstname" class="control-label">
                                                Firstname
                                            </label>
                                            <input type="text" name="firstname" 
                                            class="form-control" id="firstname" value="{{ old('firstname') }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="lastname" class="control-label">
                                                Lastname
                                            </label>
                                            <input type="text" name="lastname" 
                                            class="form-control" id="lastname" value="{{ old('lastname') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="location" class="control-label">
                                                Location
                                            </label>
                                            <input type="text" name="location" 
                                            class="form-control" id="location" value="{{ old('location') }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-default">Update</button>
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

    
@endsection