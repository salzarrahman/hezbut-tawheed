@foreach($comments as $comment)

<style>
    .custom-form-control {
        min-width: 232px;
        min-height: 40px;
    }
    .custom-btn-warning {
        padding: 5px;
    }
    @media only screen and (min-width: 375px) {
        .custom-btn-warning {
        width: 14%;
    }
    .custom-form-control {
        width: 85%;
    }
}
</style>

<div class="display-comment" @if($comment->parent_id != null) style="margin-left:40px;" @endif >
    <div class="single-blog-meta-block blog-details-meta">
        <div class="author-block">
            <div class="blog-author-text">{{ __('translate.by') }}</div>
            <a href="#" class="author-name">
                @if($comment->user->name ?? ''  != null)
                    {{ $comment->user->name ?? ''}}
                @else
                    {{ $comment->name ?? ''}} - guest
                @endif
            </a>
        </div>
        <div class="highpen-block"></div>
        <div class="blog-date">
            {{ $comment->created_at->format(' M d , Y') }}
        </div>
    </div>
        <p>{{ $comment->body }} </p>
        <a href="" id="reply"></a>

        <form method="post" action="{{ route('comments.store') }}">
            @csrf
            <div class="form-group">
                @guest
                    <input type="text" name="body_hidden" class="form-control custom-form-control" />
                    <input type="hidden" name="blogpost_id" value="{{ $blogpost_id }}" />
                    <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
                    <input type="submit" class="btn btn-warning custom-btn-warning" value="Reply" />
                @else
                    <input type="text" name="body" class="form-control custom-form-control" />
                    <input type="hidden" name="blogpost_id" value="{{ $blogpost_id }}" />
                    <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
                    <input type="submit" class="btn btn-warning custom-btn-warning" value="Reply" />
                @endif

            </div>
        </form>
        @include('frontend.page.comments', ['comments' => $comment->replies])
    </div>
@endforeach
