@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Forum Threads</div>

                <div class="card-body">
                    @foreach ($threads as $thread)

                        <article>
                            <h4>
                                <a href="/threads/{{ $thread->id }}">{{ $thread->title }}</a>
                            </h4>
                            
                            <p class="body">{{ $thread->body }}</p>
                        </article>

                        <hr>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection