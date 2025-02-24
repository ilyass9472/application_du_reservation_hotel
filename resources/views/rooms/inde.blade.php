@extends('rooms.layout')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-between align-items-center">
                <h2>Tableau des réservations</h2>
                <a class="btn btn-success" href="{{ route('room.create') }}">Create New Room</a>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success mt-3">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="row mt-4">
            @foreach ($rooms as $room)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        @php
                            $photos = json_decode($room->photos, true);
                        @endphp
                        @if($photos && count($photos) > 0)
                            <img src="{{ asset('storage/'.$photos[0]) }}" class="card-img-top" alt="Room Image" style="height: 200px; object-fit: cover;">
                        @else
                            <img src="https://via.placeholder.com/200" class="card-img-top" alt="No Image">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $room->name }}</h5>
                            <p class="card-text">{{ $room->description }}</p>
                            <p class="card-text"><strong>Prix:</strong> {{ $room->price }} MAD</p>
                            <p class="card-text"><strong>Durée:</strong> {{ $room->duration }} jours</p>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('room.show', $room->id) }}" class="btn btn-info btn-sm">Show</a>
                                <a href="{{ route('room.edit', $room->id) }}" class="btn btn-primary btn-sm">Edit</a>

                                <form action="{{ route('room.destroy', $room->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette chambre?')">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {!! $rooms->links() !!}
    </div>
@endsection
