<div>
    <div class="row">
        <div wire:ignore.self class="modal fade" id="deleteProfileModal" tabindex="-1" role="dialog"
        aria-labelledby="userModalLabel" aria-hidden="true">
           <div class="modal-dialog" role="document">
               <div class="modal-content">
                   <div class="modal-header">
                       <h5 class="modal-title" id="exampleModalLabel">Delete Account</h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                       </button>
                   </div>
                   <form wire:submit.prevent="destroyProfile">
                       <div class="modal-body">
                           Are you shure to delete this Account?
                       </div>
                       <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary">Delete</button>
                       </div>
                   </form>
               </div>
           </div>
       </div>
    
        <div class="col-md-12">
            @include('flash-message')
            <div class="card">
                <div class="card-header">
                    <h4>Profile
                        <a href="#" wire:click="deleteProfile({{Auth::user()->id}})"
                            class="btn btn-danger float-right"
                             data-toggle="modal" data-target="#deleteProfileModal">
                            Delete Account
                        </a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/profile/'.Auth::user()->id)}}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card mb-4 p-2">
                                    <div class="card-body text-center">
                                        <img src="{{asset($profile == null
                                        ? Config::get('constants.NO_AVATAR')
                                        : $profile->image)}}"
                                        class="rounded-circle img-fluid" alt="" style="width: 150px;">
                                        <h5 class="my-3">{{ Auth::user()->name }}</h5>
                                        <p class="text-muted mb-1">
                                            Member since {{ Auth::user()->created_at->format('d M Y') }}
                                        </p>
                                        <p class="text-muted mb-4">{{$profile ==null ? '' : $profile->address}}</p>
                                        <div class="d-flex justify-content-center mb-2">
                                            <span class="btn btn-primary btn-file">
                                                UPLOAD <input type="file" name="image">
                                            </span>
                                            @error('image')<small class="text-danger">{{$message}}</small>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 h-40">
                                <div class="card mb-4 p-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Full Name</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <input class="text-muted mb-o border-0" type="text"
                                                value="{{Auth::user()->name}}" name="name" id="name" require>
                                            </div>
                                        </div>
                                        @error('name')<small class="text-danger">{{$message}}</small>@enderror
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Email</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="text-muted mb-0">{{Auth::user()->email}}</p>
                                            </div>
                                        </div>
                                        @error('email')<small class="text-danger">{{$message}}</small>@enderror
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Password</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <input class="text-muted mb-o border-0" type="password"
                                                value="" name="password"
                                                id="Password" require>
                                            </div>
                                        </div>
                                        @error('password')<small class="text-danger">{{$message}}</small>@enderror
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Phone</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <input class="text-muted mb-o border-0" type="text"
                                                value="{{$profile ==null ? '' : $profile->phone}}"
                                                name="phone" id="phone" require>
                                            </div>
                                        </div>
                                        @error('phone')<small class="text-danger">{{$message}}</small>@enderror
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Mobile</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <input class="text-muted mb-o border-0" type="text"
                                                 value="{{$profile ==null ? '' : $profile->mobile}}"
                                                name="mobile" id="email" require>
                                            </div>
                                        </div>
                                        @error('mobile')<small class="text-danger">{{$message}}</small>@enderror
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Address</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <input class="text-muted mb-o border-0 w-75" type="text"
                                                 value="{{$profile ==null ? '' : $profile->address}}"
                                                  name="address" id="address" require>
                                            </div>
                                        </div>
                                        @error('address')<small class="text-danger">{{$message}}</small>@enderror
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
