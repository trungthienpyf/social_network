@extends('layouts.master')
@section('content')
    @include('includes.message-block')
    <section class="row new-post">
        <div class="col-md-6 offset-md-3">
            <header>
                <h3>What do you have to say?</h3>
                <form action="{{ route('post.create') }}" method="post">
                    <div class="form-group">
                        <textarea class="form-control" name="body" id="new-post" rows="5" cols="80"></textarea>
                    </div>
                    <button class="btn btn-primary">Submit</button>
                    @csrf
                </form>
            </header>
        </div>
    </section>
    <section class="row posts">
        <div class="col-md-6 offset-md-3">
            <header>
                <h3>What other people say...</h3>
                @foreach($posts as $post)
                    <article class="post" data-postid="{{ $post->id }}">
                        <p>{{ $post->body }}</p>
                        <div class="info">By {{ $post->user->name }} on {{ $post->created_at }}</div>
                        <div class="interaction">
                            <a href=""
                               class="like">{{Auth::user()->likes()->where('post_id',$post->id)->first() ? Auth::user()->likes()->where('post_id',$post->id)->first()->like  == 1 ? 'You liked this post' : 'Like' :'Like'}}</a> |
                            <a href=""
                               class="like">{{Auth::user()->likes()->where('post_id',$post->id)->first() ? Auth::user()->likes()->where('post_id',$post->id)->first()->like  == 0 ? 'You don\'t like this post' : 'Like' :'Dislike'}}</a>
                             |
                            @if(Auth::user()->id === $post->user_id)
                                <a href="" class="edit">Edit</a>
                                |
                                <form action="{{route('post.destroy',$post)}}" method="post" class="btn btn-link">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-link">Delete</button>
                                </form>
                            @endif
                        </div>
                    </article>
                @endforeach
            </header>
        </div>
    </section>
    <div class="modal" tabindex="-1" id="edit-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="post-body">Edit the post</label>
                            <textarea class="form-control" name="body" id="post-body" rows="5" cols="80"></textarea>
                        </div>
                        <button class="btn btn-primary">Submit</button>
                        @csrf
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="modal-save">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        var token = '{{session()->token()}}'
        var url = '{{ route('post.edit') }}'
        var urlLike = '{{ route('post.like') }}'
    </script>
@endsection
