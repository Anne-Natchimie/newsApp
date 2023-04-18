<h1>Liste des News</h1>

@forelse ($actus as $itemActu)

<h3>{{Str::limit($itemActu->titre, 30)}}</h3>
<a href="{{route('news.standard.detail', $itemActu)}}">Voir...</a>
    
@empty

    <h2>Pas de News</h2>

@endforelse