<h1>
    Film | <a href="{{ route('film.create') }}">Create</a>
</h1>

@if(Session::has('notif_success'))
    {{ Session::get('notif_success') }}
@endif
<br><br>
@foreach($films as $film)
    <a href="{{ route('film.edit', $film->id) }}">{{ $film->title }}</a> - {{ $film->description }}
    <form action="{{ route('film.destroy', $film->id) }}" method="POST">{{ csrf_field() }}{{ method_field('DELETE') }}
        <button type="submit">Delete</button>
    </form>
@endforeach