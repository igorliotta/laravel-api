@extends('layouts.app')

@section('content')

<section>
    <div class="container">
        <h1>Projects index</h1>
    </div>
</section>
<section>
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Classe</th>
                    <th></th>
                    <th>
                        <a class="btn btn-primary btn-sm" href="{{ route('admin.projects.create') }}">Nuovo</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $project)
                    <tr>
                        <td>{{ $project->id }}</td>
                        <td>
                            <a href="{{ route('admin.projects.show', $project) }}">{{ $project->title }}</a>
                        </td>
                        <td>{{ $project->slug }}</td>
                        <td>
                            {{ isset($project->type) ? $project->type->name : '-' }}
                        </td>
                        <td>
                            <a href="{{ route('admin.projects.edit', $project) }}">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">

                              @csrf
                              @method('DELETE')

                              <input type="submit" class="btn btn-danger btn-sm" value="delete">
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>Nessun Progetto</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
@endsection