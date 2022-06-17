@foreach($blog as $article)
    <!-- blog-big-item - start -->
    <div class="blog-big-item mb-60">
        <div class="blog-title mb-30">
            <a href="{{ route('article', $article->code) }}" class="title-text">{{ $article->__('title') }}</a>
            <div class="post-meta ul-li">
                <ul class="clearfix">
                    <li>{{ __('blog.published') }}: <a href="{{ '/personal/' . $article->user_id }}">{{ $article->user->first_name }}</a></li>

                    @if(count($article->tags) >= 1)
                        <li>
                            @php($i=1) @foreach($article->tags as $tag)
                                <a href="#!" onclick="ajaxTag({{ $tag->id }})">{{ $tag->__('name') }}@if($i!=count($article->tags)), @endif</a>
                            @php($i++) @endforeach
                        </li>
                    @endif

                    <li>
                        {{--<li>{{ Carbon\Carbon::parse($article->created_at)->format('j F Y') }}</li>--}}
                        {{ \Illuminate\Support\Facades\Date::parse($article->created_at)->format('j F Y') }}
                    </li>
                </ul>
            </div>
        </div>
        <div class="image-container mb-30">
            <img src="{{ URL::asset($article->image) }}" alt="image_not_found">
        </div>
        <div class="blog-content">
            <p class="mb-30">
                {{ $article->__('preview_text') }}
            </p>
            <a href="{{ route('article', $article->code) }}" class="read-more">{{ __('blog.details') }}</a>
        </div>
    </div>
    <!-- blog-big-item - end -->
@endforeach
