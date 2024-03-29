@extends('layouts.app')

@section('page-title', 'Homepage')

@section('main-content')
    <div class="row">
        <h1 class="text-center mb-4">MyPortfolio</h1>
        <div class="mb-4">
            <a href="{{ route('admin.projects.create') }}" class="btn btn-outline-info">
                + Aggiungi
            </a>
        </div>
        <div class="card">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Project Name</th>
                        <th scope="col">Img</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Tech</th>
                        <th scope="col">link</th>
                        <th scope="col">Description</th>
                        <th scope="col">Creation Date</th>
                        <th scope="col">Time</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <th scope="row">{{ $project->id }}</th>
                            <td>{{ $project->title }}</td>
                            <td>
                                @if ($project->full_cover_img)
                                    <img src="{{ $project->full_cover_img }}" alt="{{ $project->title }}">
                                @endif
                            </td>
                            <td>
                                @if ($project->type != null)
                                    <a href="{{ route('admin.types.show', ['type' => $project->type->id]) }}">
                                        {{ $project->type->title }}
                                    </a>
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                <div>
                                    @forelse ($project->technologies as $technology)
                                        <a href="{{ route('admin.technologies.show', ['technology' => $technology->id]) }}" class="badge rounded-pill text-bg-info m-1">
                                            {{ $technology->title }}
                                        </a>
                                    @empty
                                        -
                                    @endforelse
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('admin.projects.show', ['project' => $project->id]) }}">{{ $project->url }}</a>
                            </td>
                            <td>{{ $project->description }}</td>
                            <td>{{ $project->created_at->format('d/m/Y') }}</td>
                            <td>{{ $project->created_at->format('H:i') }}</td>
                            <td>
                                <a href="{{ route('admin.projects.edit', ['project' => $project->id]) }}" class="btn btn-info mb-3">
                                    Modifica
                                </a>
                                <form onsubmit="return confirm('Sei sicuro di voler eliminare questo progetto?');"
                                    class="d-inline-block"
                                    action="{{ route('admin.projects.destroy', ['project' => $project->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-dark">
                                        Elimina
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endsection

<style lang="scss" scoped>
img {
    width: 100px
}
</style>
