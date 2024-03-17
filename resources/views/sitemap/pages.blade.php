
<?php print '<?xml version="1.0" encoding="UTF-8"?>' ?>
<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd http://www.google.com/schemas/sitemap-image/1.1 http://www.google.com/schemas/sitemap-image/1.1/sitemap-image.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">   
    <url>
        <loc>{{ route('home' , '') }}</loc>
        <lastmod>{{ date('Y-m-d' , time()) }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc>{{ route('services', '') }}</loc>
        <lastmod>{{ date('Y-m-d' , time()) }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc>{{ route('about' , '') }}</loc>
        <lastmod>{{ date('Y-m-d' , time()) }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc>{{ route('projects' , '') }}</loc>
        <lastmod>{{ date('Y-m-d' , time()) }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc>{{ route('engineers' , '') }}</loc>
        <lastmod>{{ date('Y-m-d' , time()) }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc>{{ route('contact-us' , '') }}</loc>
        <lastmod>{{ date('Y-m-d' , time()) }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc>{{ route('login' , '') }}</loc>
        <lastmod>{{ date('Y-m-d' , time()) }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc>{{ route('register.user' , '') }}</loc>
        <lastmod>{{ date('Y-m-d' , time()) }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc>{{ route('privacy' , '') }}</loc>
        <lastmod>{{ date('Y-m-d' , time()) }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc>{{ route('terms' , '') }}</loc>
        <lastmod>{{ date('Y-m-d' , time()) }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
</urlset>