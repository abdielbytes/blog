<x-layout>



<article>
        <h1>{{ $post->title}} </h1>
    <p>
        <a href="#">{{ $post->category-slug }}</a>
    </p>
        <div> {!! $post->body !!}</div>
        <a href="/"> ...go back</a>

    </article>
</x-layout>>
