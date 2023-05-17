@foreach ($contents as $content)
    <h2>{{ $content->titre_article }}</h2>
    <p>{{ $content->article }}</p>
   {{ $content->content_image}}
@endforeach


