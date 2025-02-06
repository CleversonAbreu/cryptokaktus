<div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Cryptos
                    </h4>
                </div>
                <div class="card-body">
                    <div class="form-outline mb-4">
                        <input type="search" wire:model="search" placeholder="Search ..."  class="form-control" >
                    </div>
                    <table class="table table-bordered table-striped">
                        <caption></caption>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Creation Year</th>
                                <th>Location</th>
                                <th>Category</th>
                            </tr>
                        </thead>
                        @if (count($cryptos) > 0)
                            <tbody>
                                @foreach ($cryptos as $crypto)
                                <tr>
                                    <td>{{$crypto->id}}</td>
                                    <td>{{$crypto->name}}</td>
                                    <td>{{$crypto->price}}</td>
                                    <td>{{$crypto->creation_year}}</td>
                                    <td>{{$crypto->location}}</td>
                                    <td>{{$crypto->category}}</td>
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
                        {{$cryptos->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div

