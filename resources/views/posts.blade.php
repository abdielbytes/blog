<x-layout>



    @foreach($posts as $post)
        :
        <article>
            <h1>
                <a href="/post/{{$post->slug}}">
                {{ $post->title }} </h1>
            </a>
            <div>  {{ $post->excerpt }}  </div>
            <p>
                <a href="#">{{ $post->category->slug }}</a>
            </p>
        </article>
    @endforeach;

</x-layout>>
