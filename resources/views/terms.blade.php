@extends('layouts.app')

@section('title', 'Villkor (Terms of Service) - Edens Gröna')

@section('content')
    <div class="container content-space-2 content-space-lg-3">
        <h1 class="mb-4">Villkor (Terms of Service)</h1>

        <p><strong>Senast uppdaterad:</strong> {{ now()->format('Y-m-d') }}</p>

        <h3 class="mt-4">1. Om oss</h3>
        <p>
            Denna webbplats drivs av Edens Gröna ("vi", "oss"). Genom att använda webbplatsen godkänner du dessa
            villkor.
        </p>

        <h3 class="mt-4">2. Tjänster</h3>
        <p>
            Vi erbjuder trädgårdstjänster och relaterade tjänster. Information på webbplatsen är generell och kan
            ändras.
        </p>

        <h3 class="mt-4">3. Kontaktförfrågningar</h3>
        <p>
            När du skickar in ett formulär på webbplatsen lämnar du uppgifter för att vi ska kunna kontakta dig och
            hantera din förfrågan.
        </p>

        <h3 class="mt-4">4. Ansvar</h3>
        <p>
            Vi ansvarar inte för indirekta skador eller förluster som uppstår genom användning av webbplatsen.
        </p>

        <h3 class="mt-4">5. Immateriella rättigheter</h3>
        <p>
            Innehåll på webbplatsen tillhör Edens Gröna eller våra licensgivare och får inte kopieras utan tillstånd.
        </p>

        <h3 class="mt-4">6. Ändringar</h3>
        <p>
            Vi kan uppdatera villkoren. Den senaste versionen finns alltid på denna sida.
        </p>

        <h3 class="mt-4">7. Kontakt</h3>
        <p>
            Frågor om villkoren? Kontakta oss via <a href="{{ route('contact') }}">kontaktsidan</a>.
        </p>
    </div>
@endsection
