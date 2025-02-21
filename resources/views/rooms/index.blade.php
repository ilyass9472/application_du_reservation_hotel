@extends('rooms.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Tableau des réservations</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('room.create') }}">Create New Room</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Photos</th>
                <th>Description</th>
                <th>Price</th>
                <th>Durée</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rooms as $room)
           <tr>
               <td>{{ ++$i }}</td>
               <td>{{ $room->name }}</td>
               <td>
                   @php
                       $photos = json_decode($room->photos, true);
                   @endphp
                   @if($photos)
                       @foreach($photos as $photo)
                           <div>{{ $photo }}</div>
                       @endforeach
                   @endif
               </td>
               <td>{{ $room->description }}</td>
               <td>{{ $room->price }}</td>
               <td>{{ $room->duration }}</td>
               <form action="{{ route('room.destroy', $room->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('room.show', $room->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('room.edit', $room->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette chambre?')">Delete</button>
            </form>
           </tr>
@endforeach
        </tbody>
    </table>

    {!! $rooms->links() !!}
@endsection