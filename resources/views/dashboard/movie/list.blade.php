@extends('layouts.dashboard')

@section('content')

<div class="mb-2">
    <a href="{{ route('create.movie') }}" class="btn btn-primary btn-sm">Tambah data Movie</a>
</div>

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
        @if($movies->total())
        <table class="table table-striped table-hover table-bordered">
            <tr>
                <th>Thumbnail</th>
                <th>Title</th>
                <th>&nbsp;</th>
            </tr>

            @foreach ($movies as $movie)

            <tr>
                <td class="col-thumbnail">
                    <img src="{{asset('storage/movies/'.$movie->thumbnail)}}" alt="" class="img-fluid">
                </td>
                <td>
                    <h4>
                    <strong>
                        {{ $movie->title }}
                    </strong>
                </h4>
                </td>
                <td>
                    <a href="{{ route('edit.movie', ['id' => $movie->id]) }}" title="edit" class="btn btn-success btn-sm">
                        <i class="fas fa-pen"></i></a>
                </td>
            </tr>

            @endforeach

        </table>

        {{ $movies->links('pagination::bootstrap-4') }}

        @else 
        <h4 class="text-center p-3">Belum Ada Data Movie</h4>
        @endif
    </div>

</div>



@endsection