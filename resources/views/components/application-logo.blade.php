@props(['src' => asset('favicons/android-icon-48x48.png'), 'alt' => 'Logo'])


    <img src="{{ $src }}" alt="{{ $alt }}" {{ $attributes }}>

    <p style="margin: 0;"> {{ config('temaweb.creditos', 'Laravel') }}</p>

