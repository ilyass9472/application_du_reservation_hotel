@extends('rooms.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Room</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('room.index') }}">Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('room.update', $room->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $room->name }}" class="form-control" placeholder="Name">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Photos:</strong>
                    <div id="photo-inputs">
                        @php
                            $photos = json_decode($room->photos, true) ?? [];
                        @endphp
                        @foreach($photos as $photo)
                            <div class="input-group mb-2">
                                <input type="text" name="photo[]" class="form-control" value="{{ $photo }}" placeholder="Photo URL">
                                <button type="button" class="btn btn-danger" onclick="this.parentElement.remove()">Remove</button>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" class="btn btn-secondary mt-2" onclick="addPhotoInput()">Add Another Photo</button>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Price:</strong>
                    <input type="number" name="price" value="{{ $room->price }}" class="form-control" placeholder="Price">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Duration:</strong>
                    <input type="number" name="duration" value="{{ $room->duration }}" class="form-control" placeholder="Duration">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea class="form-control" name="description" placeholder="Description" style="height:150px">{{ $room->description }}</textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>

    <script>
    function addPhotoInput() {
        const div = document.createElement('div');
        div.className = 'input-group mb-2';
        div.innerHTML = `
            <input type="text" name="photo[]" class="form-control" placeholder="Photo URL">
            <button type="button" class="btn btn-danger" onclick="this.parentElement.remove()">Remove</button>
        `;
        document.getElementById('photo-inputs').appendChild(div);
    }
    </script>
@endsection