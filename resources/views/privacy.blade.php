@extends('layouts.app')

@section('title', 'Integritetspolicy (Privacy Policy) - Edens Gröna')

@section('content')
    <div class="container content-space-2 content-space-lg-3">
        <h1 class="mb-4">Integritetspolicy (Privacy Policy)</h1>

        <p><strong>Senast uppdaterad:</strong> {{ now()->format('Y-m-d') }}</p>

        <h3 class="mt-4">1. Vilka uppgifter vi samlar in</h3>
        <p>
            När du skickar in en kontaktförfrågan kan vi samla in uppgifter som namn, e-post, telefon, adress, stad,
            postnummer, kundtyp, vad du behöver hjälp med, samt eventuella bilagor.
        </p>

        <h3 class="mt-4">2. Varför vi behandlar uppgifterna</h3>
        <p>
            Vi behandlar personuppgifter för att kunna:
        </p>
        <ul>
            <li>Ta emot och hantera din förfrågan</li>
            <li>Kommunicera med dig om ditt ärende</li>
            <li>Förbättra vår service och vår webbplats</li>
        </ul>

        <h3 class="mt-4">3. E-postutskick</h3>
        <p>
            Vi skickar i första hand transaktions-/service-relaterade e-postmeddelanden (t.ex. bekräftelse på mottagen
            förfrågan).
            Vi skickar inte marknadsföringsutskick utan samtycke.
        </p>

        <h3 class="mt-4">4. Delning av uppgifter</h3>
        <p>
            Vi delar inte dina uppgifter med tredje part, förutom när det krävs för drift av tjänsten (t.ex.
            e-postleverantör)
            eller enligt lag.
        </p>

        <h3 class="mt-4">5. Lagringstid</h3>
        <p>
            Vi sparar uppgifterna så länge det behövs för att hantera din förfrågan och följa lagkrav.
        </p>

        <h3 class="mt-4">6. Dina rättigheter</h3>
        <p>
            Du kan begära tillgång till, rättelse eller radering av dina personuppgifter, samt invända mot viss
            behandling.
            Kontakta oss via <a href="{{ route('contact') }}">kontaktsidan</a>.
        </p>

        <h3 class="mt-4">7. Kontakt</h3>
        <p>
            Vid frågor om integritet, kontakta oss via <a href="{{ route('contact') }}">kontaktsidan</a>.
        </p>
    </div>
@endsection
