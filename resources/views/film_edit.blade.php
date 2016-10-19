<form action="{{ isset($film) ? route('film.update', $film->id) : route('film.store') }}" method="POST">
    {{ isset($film) ? method_field('PUT') : '' }}
    {{ csrf_field() }}

    @if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
    @endif
    Title : <input type="text" name="title" value="{{ isset($film) ? $film->title : old('title') }}"><br>
    Description : <input type="text" name="description" value="{{ isset($film) ? $film->description : old('description') }}"><br>
    <button>{{ isset($film) ? 'Update' : 'Submit' }}</button>
</form>