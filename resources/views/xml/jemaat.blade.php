<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" 
xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" 
xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

    @foreach($jemaats as $key => $jemaat)
        <url>
            <loc>{{ url("/jemaat/{$jemaat->id}") }} </loc>
            <lastmod> {{ $jemaat->created_at }} </lastmod> 
            <nik> {{ $jemaat->nik }} </nik>
            <family_id> {{ $jemaat->family_id }} </family_id>
            <status_keanggotaan> {{ $jemaat->status_keanggotaan }} </status_keanggotaan>
            <nama> {{ $jemaat->nama }} </nama>
            <tempat_lahir> {{ $jemaat->tempat_lahir }} </tempat_lahir>
            <tanggal_lahir> {{ $jemaat->tanggal_lahir }} </tanggal_lahir>
        </url>
    @endforeach

</urlset>