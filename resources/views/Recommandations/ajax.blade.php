

@foreach ($recommandations as $recommandation)
    <div class="ticket">

        <span class="label ticket-label">
            {{  date("G", strtotime($recommandation->created_at)) }}h
        </span>
        <a href="#" title="" class="ticket-title">{{ $recommandation->title }}</a>
        <p>{{ $recommandation->contenu }}</p>
        <span class="ticket-info">
            recommand&eacute; par <a href="#" title="">{{ $recommandation->cinema->title  }}</a> sur <a href="#" title="">{{ $recommandation->movies->title  }}</a>
        </span>
    </div> <!-- / .ticket -->
@endforeach