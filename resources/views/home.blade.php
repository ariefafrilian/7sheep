@extends('layouts.frontend')

@section('title', config('app.name'))

@section('home', 'active')

@section('content')
<div class="content">
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header bg-light">Posts</div>
                <div class="card-body p-0">
                    <form action="{{ url('posts') }}" enctype="multipart/form-data" method="POST" class="dropzone border-0" id="dropzone">
                        <div class="dz-message">
                            <h1 class="text-muted display-3"><i class="fas fa-images"></i></h1>
                            <h3 class="text-muted lead">Shared your story here</h3>
                        </div>
                    </form>
                    <div class="card-footer border-top">
                        <button class="btn btn-primary btn-sm">Submit</button>
                        <button class="btn btn-danger btn-sm">Cancle</button>
                    </div>
                </div>
            </div>
            @forelse ($posts as $post)
            <div class="card">
                <div class="card-body">
                    <!-- Post -->
                    <div class="post">
                        <div class="user-block">
                          <img class="img-circle img-bordered-sm" src="{{ asset('img/'.$post->user->photo) }}" alt="500">
                          <span class="username">
                            <a href="#">{{ $post->user->username }}</a>
                            @if (Sentinel::check())
                            @if (Sentinel::getUser()->id == $post->user_id)
                            <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                            @endif
                            @endif
                          </span>
                          <span class="description">Shared <i class="far fa-clock"></i> {{ $post->created_at }}</span>
                        </div>
                        <!-- /.user-block -->

                        @if ($post->statement)
                        <p>{{ $post->statement }}</p>
                        @endif

                        <div id="post{{ $post->id }}" class="carousel slide mb-3" data-ride="carousel">
                            <ol class="carousel-indicators">
                              @foreach ($post->files as $file)
                              @if ($loop->index == 0)
                              <li data-target="#post{{ $post->id }}" data-slide-to="{{ $loop->index }}" class="active"></li>
                              @else
                              <li data-target="#post{{ $post->id }}" data-slide-to="{{ $loop->index }}"></li>
                              @endif
                              @endforeach
                            </ol>
                            <div class="carousel-inner">
                              @foreach ($post->files as $file)
                              @if ($loop->index == 0)
                              <div class="carousel-item active">
                                <img src="{{ asset('img/'.$file->file) }}" class="d-block w-100" alt="500">
                              </div>
                              @else
                              <div class="carousel-item">
                                <img src="{{ asset('img/'.$file->file) }}" class="d-block w-100" alt="500">
                              </div>
                              @endif
                              @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#post{{ $post->id }}" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#post{{ $post->id }}" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                            </a>
                        </div>

                        <p>
                          <a href="#" class="link-black text-sm mr-2"><i class="far fa-thumbs-up"></i> {{ $post->live }}</a>
                          <a href="#" class="link-black text-sm"><i class="far fa-thumbs-down"></i> {{ $post->evil }}</a>
                          <span class="float-right">
                            <a href="#" class="link-black text-sm">
                              <i class="far fa-comments mr-1"></i> Comments ({{ $post->comments->count() }})
                            </a>
                          </span>
                        </p>

                        <input class="form-control form-control-sm" type="text" placeholder="Type a comment...">
                    </div>
                    <!-- /.post -->
                </div>
            </div>
            @empty

            @endforelse
            <div class="text-center text-primary mb-3">
                <div class="spinner-border spinner-border-sm" role="status" aria-hidden="true">
                </div> Loading...
            </div>
        </div>
        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection
