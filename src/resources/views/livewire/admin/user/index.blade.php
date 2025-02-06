<div>
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
     aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="destroyUser">
                    <div class="modal-body">
                        Are you shure to delete this User?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @include('flash-message')
            <div class="card">
                <div class="card-header">
                    <h4>Users
                        <a href="{{url('admin/users/create')}}" class="btn btn-primary float-right">Add User</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <caption></caption>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        @if (count($users) > 0)
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="{{url('admin/users/'.$user->id.'/edit')}}"
                                                class="btn btn-success btn-sm btn-icon-text mr-3">
                                                Edit
                                                <i class="typcn typcn-edit btn-icon-append"></i>
                                            </a>
                                            <a href="#" wire:click="deleteUser({{$user->id}})"
                                                class="btn btn-danger btn-sm btn-icon-text"
                                                data-toggle="modal" data-target="#deleteModal">
                                                Delete
                                                <i class="typcn typcn-delete-outline btn-icon-append"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        @else
                            <tbody v-else>
                                <tr><td colspan="6" class="text-center">Register not found</td></tr>
                            </tbody>
                        @endif
                    </table>
                    <div>
                        {{$users->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('script')
<script>
    $('div.alert').not('.alert-important').delay(4000).fadeOut(350)
    window.addEventListener('close-modal', event => {
        $('#deleteModal').modal('hide')
        $('div.alert').not('.alert-important').delay(4000).fadeOut(350)
    })
</script>
@endpush
