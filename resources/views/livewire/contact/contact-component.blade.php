<div>
    <div class="title">Laravel - Livewire CRUD Modal</div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Sorry!</strong> invalid input.<br><br>
            <ul style="list-style-type:none;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<!-- Button trigger modal -->
    <div style="padding-bottom: 4%;">
        <div class="col-md-6" style="padding: 0;">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contact">
                Add Contact
            </button>
            <button wire:click="export">
                <i class="fas fa-file-download"></i>
            </button>
        </div>
        <div class="col-md-6" style="padding: 0;">
            <input type="text"  class="form-control" placeholder="Search" wire:model="search" />
        </div>
    </div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        @csrf
                        @if($updateMode)
                            @include('livewire.contact.update')
                        @else
                            @include('livewire.contact.create')
                        @endif
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    @if($updateMode)
                        <button wire:click ="update()" class="btn btn-primary">Update</button>
                    @else
                        <button wire:click ="store()" class="btn btn-primary">Save</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div >
        <div class="text-center" wire:loading.delay>
            <x-load-component/>
        </div>
        <div wire:loading.remove>
            <table  class="table table-bordered table-condensed">
                <tr>
                    <td>ID</td>
                    <td>NAME</td>
                    <td>PHONE</td>
                    <td>ACTION</td>
                </tr>

                @foreach($data as $row)
                    <tr>
                        <td>{{$row['id']}}</td>
                        <td>{{$row['name']}}</td>
                        <td>{{$row['phone']}}</td>
                        <td width="100">
                            <button wire:click="edit({{$row['id']}})" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#contact">Edit</button>
                            <button wire:click="destroy({{$row['id']}})" class="btn btn-xs btn-danger">Del</button>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{ $paginate->links() }}
        </div>
    </div>

    <style>
        .title{
            background: #009688;
            padding: 5px 15px;
            font-size: 20px;
            margin-bottom: 10px;
            color: white;
            border-radius: 3px;
        }
    </style>
</div>
