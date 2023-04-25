@props(['recovered', 'confirmed', 'death', 'country'])
<tr>
    <?php
    $countryArr = json_decode($country);
    $locale = App::getLocale();
    $translatedCountry = $countryArr->$locale;
    ?>
    <td class="px-5 sm:px-10 py-4">{{ $translatedCountry }}</td>
    <td class="px-5 sm:px-10 py-4">{{ $confirmed }}</td>
    <td class="px-5 sm:px-10 py-4">{{ $death }}</td>
    <td class="px-5 sm:px-10 py-4">{{ $recovered }}</td>
</tr>
