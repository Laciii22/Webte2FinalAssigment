<h1>fungvalooo</h1>
<h1>{{ $question->title }}</h1>
<p>{{ $question->description }}</p>

<h2>Responses:</h2>
<ul>
    @foreach ($responses as $response)
    <li>{{ $response->selected_value }}</li>
    @endforeach
</ul>