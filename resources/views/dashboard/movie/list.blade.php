@extends('layouts.dashboard')

@section('content')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-8 align-self-center">
                <h3>Movie List</h3>
            </div>

            <!-- form search -->
            <div class="col-4">
                <form method="GET" action="{{ url('dashboard/movies') }}">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm" name="q" value="{{ $request['q'] ?? '' }}">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-secondary btn-sm">Search</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <!-- Form List -->
    <div class="card-body p-0">
        <table class="table table-striped table-hover table-bordered">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Thumbnail</th>
                <th>&nbsp;</th>
            </tr>

            @foreach ($movies as $movie)

            <tr>
                <th scope="row">{{ ($movies->currentPage()-1) * $movies->perPage() + $loop->iteration }}</th>
                <td>{{ $movie->title }}</td>
                <td>{{ $movie->thumbnail }}</td>
                <td>
                    <a href="{{ route('edit', ['id' => $movie->id]) }}" title="edit" class="btn btn-success btn-sm">
                        <i class="fas fa-pen"></i></a>
                </td>
            </tr>

            @endforeach

        </table>
        {{ $movies->links('pagination::bootstrap-4') }}
    </div>

</div>



@endsection