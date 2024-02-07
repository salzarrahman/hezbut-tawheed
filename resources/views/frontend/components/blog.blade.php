@php
    $blog_post= App\Models\Blogpost::where('status',1)->orderBy('id','ASC')->limit(3)->get();
@endphp


<div class="blog-section">
    <div class="container w-container">
        <div class="join-our-movement-title-block">
            <div class="section-title-block section-block-center">
                <h2 class="section-title">
                  {{ __('translate.blog_post') }}
                </h2>
                <p class="section-summary">
                  {{ __('translate.blog_post_dis') }}
                </p>
            </div>
        </div>
        <div class="blog-top-gap">
            <div class="blog-collection-wrapper w-dyn-list">
                <div role="list" class="blog-collection-list w-dyn-items">
                    @foreach ($blog_post as $key =>$item )
                        <div role="listitem" class="blog-collection-item w-dyn-item">
                            <div class="single-blog-wrapper">
                                <div class="single-blog-thumb-block">
                                    <a href="{{ url('blog/details/'.$item->id.'/'.$item->news_title_slug) }}">
                                        <img alt=" Thumbnail "loading="lazy" src="{{ $item->image ?? '' }}"
                                            class="single-blog-thumbnail-image" />
                                        </a>
                                    </div>
                                <div class="single-blog-content">
                                    <div class="single-blog-meta-block">
                                        <div class="author-block">
                                            <div class="blog-author-text">By:</div>
                                            <a href="/blog-author/martin-smith" class="author-name">
                                                @php
                                                     $data = App\Models\User::findOrFail($item->user_id ?? '');
                                                @endphp
                                                {{ $data->name ?? '' }}
                                            </a>
                                        </div>
                                        <div class="highpen-block"></div>
                                        <div class="blog-date">
                                            {{ $item->created_at->format('l M d Y') }}

                                        </div>
                                    </div>
                                    <a href="{{ url('blog/details/'.$item->id.'/'.$item->news_title_slug) }}" class="single-blog-title-link-block w-inline-block">
                                        <h4 class="single-blog-title">
                                            {{ __($item->news_title ?? 'Title' )  }}
                                        </h4>
                                    </a>
                                    <a href="{{ url('blog/details/'.$item->id.'/'.$item->news_title_slug) }}" class="single-blog-read-more-button">
                                        {{ __('translate.read_more') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div> <!-- end header-top-section -->
