<x-app-layout>
    <x-slot name="title">
        {{ config('app.name') }} Manage Blog Post
    </x-slot>
    
    <div class="col-xxl-10">
        <header class="px-4 py-4 mt-5 text-center">
            <h1 class="text-3xl font-bold">
                Manage Blog Post
            </h1>
        </header>
    
        <style>
            dd {
                margin-left: 1rem;
                font-size: 0.875rem;
                color: #333;
            }
            dt {
                color: #333;
                font-weight: medium;
            }
            details > dl {
                margin-left: 1rem;
            }
            details > dl > dd {
                margin-bottom: 0;
            }
            dl > dd > dl {
                margin-bottom: 0;
            }
            dl > dd > dl > dd {
                margin-bottom: 0.25rem;
            }
            #post-information {
                margin-left: 0.5rem;
                margin-top: 0.5rem;
                margin-bottom: 1.5rem;
            }
            #post-information dd {
                margin-bottom: 0;
            }
        </style>

        <div class="col-12 mx-auto p-3 mb-5">
            <section class="card row d-flex flex-row col-12 mx-auto">
                <header class="card-header d-flex align-items-center justify-content-between pb-0">
                    <h4 class="card-title">
                        {{ $post->title }}
                    </h4>
                    <x-file-link :path="\Hyde\Framework\Hyde::path('_posts/' . $post->slug . '.md')">Open File</x-file-link>
                </header>
                <article class="card-body col-7">
                    <div class="mb-3">
                        <h5 class="d-inline pe-2">Post Body</h5> Currently read-only
                    </div>
                    <div class="">
                        <textarea class="form-control" name="" id="" cols="30" rows="30" readonly>{{ $post->body }}</textarea>
                    </div>
                </article>
                <aside class="card-body col-4 mx-auto">
                    <div class="mb-3">
                        <dt>
                            Post Information
                        </dt>
                        <dd id="post-information">
                            <dl>
                                @isset($post->author)
                                    <dt>Author</dt>
                                    <dd>{{ $post->author->name ?? $post->author->username }}</dd>
                                @endisset
                                @isset($post->date)
                                    <dt>Date:</dt>
                                    <dd>{{ $post->date->sentence }}</dd>
                                @endisset
                                @isset($post->category)
                                    <dt>Category:</dt>
                                    <dd>{{ $post->category }}</dd>
                                @endisset
                                <dt>Slug:</dt>
                                <dd>{{ $post->slug }}</dd>

                                <dt class="mt-2">View Post:</dt>
                                <dd>
			                        <a href="{{ route('api.posts.markdown', $post->slug) }}" target="_blank">Markdown</a>
                                </dd>
                                <dd>
			                        <a href="{{ route('api.posts.json', $post->slug) }}?pretty=true" target="_blank">JSON Object</a>
                                </dd>
                                <dd>
			                        <a href="{{ route('api.posts.html', $post->slug) }}" target="_blank">Basic HTML</a>
                                </dd>
                                <dt class="mt-2">Download Post:</dt>
                                <dd>
                                    <a href="{{ route('api.posts.markdown', $post->slug) }}" download="">Markdown</a>
                                </dd>
                                <dd>
                                    <a href="{{ route('api.posts.json', $post->slug) }}?pretty=true" download="">JSON Object</a>
                                </dd>
                                <dd>
                                    <a href="{{ route('api.posts.html', $post->slug) }}?download=true" download="">Basic HTML</a>
                                </dd>
                            </dl>
                        </dd>

                        <hr>

                        <details>
                            <summary>
                                <h6 class="d-inline pe-2">Post Metadata</h6>
                            </summary>
                            <dl class="mt-3">
                                @if($post->author)
                                    <dt>
                                        Author:
                                    </dt>
                                    <dd>
                                        <dl>
                                            @foreach ($post->author as $key => $value)
                                                @unless(empty($value))
                                                    <dt>{{ $key }}</dt>
                                                    <dd>{{ $value }}</dd>
                                                @endunless
                                            @endforeach
                                        </dl>
                                    </dd>
                                @endif
    
                                @if($post->metadata)
                                    <dt>
                                        Metadata:
                                    </dt>
                                    <dd>
                                        <dl>
                                            @foreach ($post->metadata as $key => $value)
                                                @unless(empty($value))
                                                <details>
                                                    <summary>Show {{ $key }}</summary>
                                                    <dl>
                                                        @foreach ($value as $name => $content)
                                                            <dt>{{ $name }}</dt>
                                                            <dd>{{ $content }}</dd>
                                                        @endforeach
                                                    </dl>
                                                </details>
                                                @endunless
                                            @endforeach
                                        </dl>
                                    </dd>
                                @endif
    
                                @if($post->image)
                                    <dt>
                                        Image:
                                    </dt>
                                    <dd>
                                        <dd>
                                            <details>
                                                <summary><b>Show computed</b></summary>
                                                <dl>
                                                    <dt>
                                                        Author Credit:
                                                    </dt>
                                                    <dd>
                                                        {!! $post->image->getImageAuthorAttributionString() !!}
                                                    </dd>
                                                
                                                    @isset($post->image->copyright)
                                                        <dt>
                                                            Copyright:
                                                        </dt>
                                                        <dd>
                                                            {!! $post->image->getCopyrightString() !!}
                                                        </dd>
                                                    @endisset
                                                    @isset($post->image->license)
                                                        <dt>
                                                            License:
                                                        </dt>
                                                        <dd>
                                                            {!! $post->image->getLicenseString() !!}
                                                        </dd>
                                                    @endisset
                                                    <dt>
                                                        Attribution:
                                                    </dt>
                                                    <dd>
                                                        {!! $post->image->getFluentAttribution() !!}
                                                    </dd>
                                                </dl>
                                            </details>
                                        </dd>
                                        <dd>
                                            <details>
                                                <summary><b>Show raw properties</b></summary>
                                                <dl>
                                                    @foreach ($post->image as $key => $value)
                                                        @unless(empty($value))
                                                            <dt>{{ $key }}</dt>
                                                            <dd>{{ $value }}</dd>
                                                        @endunless
                                                    @endforeach
                                                </dl>
                                            </details>
                                        </dd>
                                        <dd>
                                            <details>
                                                <summary><b>Show metadata</b></summary>
                                                <dl>
                                                    @foreach ($post->image->getMetadataArray() as $key => $value)
                                                        @unless(empty($value))
                                                            <dt>{{ $key }}</dt>
                                                            <dd>{{ $value }}</dd>
                                                        @endunless
                                                    @endforeach
                                                </dl>
                                            </details>
                                        </dd>
                                    </dd>
                                @endif
                            </dl>
                        </details>

                        <details>
                            <summary>
                                <h6 class="d-inline pe-2">Front Matter</h6>
                            </summary>
                            <dl class="mt-3">
                                <dl>
                                    <dt></dt>
                                    <dd>
                                        @foreach ($post->matter as $key => $value)
                                            @unless(empty($value) || $key === 'slug')
                                                @if(is_array($value) || is_object($value))
                                                    <details>
                                                        <summary>Show {{ $key }} array</summary>
                                                        <dl>
                                                            @foreach ($value as $name => $content)
                                                            <dt>{{ $name }}</dt>
                                                            <dd>{{ $content }}</dd>
                                                            @endforeach
                                                        </dl>
                                                    </details>
                                                @else
                                                <dl>
                                                    <dt>{{ $key }}</dt>
                                                    <dd>{{ $value }}</dd>
                                                </dl>
                                                @endif
                                            @endunless
                                        @endforeach
                                    </dd>
                                </dl>
                            </dl>
                        </details>
                    </div>
                </aside>
            </section>
        </div>
    </div>
</x-app-layout>