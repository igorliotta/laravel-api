@extends('layouts.app')

@section('content')

<section>
    <div class="container">
        <h1>Modifica progetto</h1>
        <section>
            <div class="container">
                <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
              
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" required class="form-control" id="title" name="title" placeholder="Titolo del progetto" value="{{ old('title', $project->title) }}">
                    </div>

                    <div class="mb-3">
                        <label for="cover_image" class="form-label">Carica File</label>
                        <input class="form-control" type="file" name="cover_image" id="cover_image" value="{{ old('cover_image') }}">
                    </div>

                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" readonly required class="form-control" id="slug" name="slug" placeholder="Slug del progetto" value="{{ old('slug', $project->slug) }}">
                    </div>

                    <div class="mb-3">
                        <label for="type_id" class="form-label">Classi</label>
                        <select name="type_id" class="form-control" id="type_id">
                            <option value="">Seleziona una classe</option>
                            @foreach ($types as $type)
                            <option @selected( old('type_id', optional($project->type)->id ) == $type->id ) value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <p>Seleziona le tecnologie:</p>
                        <div class="d-flex flex-wrap">
                            @foreach ($technologies as $technology)
                            <div class="form-check">
                                <div class="form-check">
                                    <input name="technologies[]" class="form-check-input" type="checkbox" value="{{ $technology->id }}" id="technology-{{$technology->id}}" @checked( in_array($technology->id, old('technologies', $project->technologies->pluck('id')->all() ) ) )>
                                    <label class="form-check-label" for="technology-{{$technology->id}}">
                                      {{ $technology->name }}
                                    </label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
            
                    <div class="mb-3">
                        <label for="content" class="form-label">Project content</label>
                        <textarea class="form-control" id="content" name="content" rows="3">{{ old('content', $project->content) }}</textarea>
                    </div>
            
                    <div class="mb-3">
                        <input type="submit" class="btn btn-primary" value="Mofifica">
                    </div>
                </form>
        
                <!-- /resources/views/post/create.blade.php -->
         
        
         
                @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                         @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                         @endforeach
                      </ul>
                 </div>
                @endif
         
        <!-- Create Post Form -->
            </div>
        </section>
    </div>
</section>
    
@endsection