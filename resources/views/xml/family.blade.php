<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" 
xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" 
xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

    @foreach($fams as $key => $family)
        <url>
            <loc>{{ url("/family/{$family->id}") }} </loc>
            <lastmod> {{ $family->created_at }} </lastmod> 
            <kepala_keluarga> {{ $family->kepala_keluarga }} </kepala_keluarga>
            <nkk> {{ $family->nkk }} </nkk>
        </url>
    @endforeach

</urlset>