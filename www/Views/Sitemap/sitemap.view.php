
<?php '<?xml version="1.0" encoding="UTF-8"?>' ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>https://movinghouse.alwaysdata.net/</loc>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>https://movinghouse.alwaysdata.net/annonce-all</loc>
        <changefreq>weekly</changefreq>
        <priority>0.9</priority>
    </url>
    <url>
        <loc>https://movinghouse.alwaysdata.net/all-agents</loc>
        <changefreq>monthly</changefreq>
        <priority>0.9</priority>
    </url>
    <url>
        <loc>https://movinghouse.alwaysdata.net/contact</loc>
        <changefreq>monthly</changefreq>
        <priority>0.6</priority>
    </url>
    <url>
        <loc>https://movinghouse.alwaysdata.net/about-us</loc>
        <changefreq>monthly</changefreq>
        <priority>0.6</priority>
    </url>
    <url>
        <loc>https://movinghouse.alwaysdata.net/login</loc>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    <url>
        <loc>https://movinghouse.alwaysdata.net/register</loc>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    <url>
        <loc>https://movinghouse.alwaysdata.net/reset-pwd-mail</loc>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>

<?php while ($row = $this->data['annonces']->fetch()): ?>
	<url>
	  <loc>https://movinghouse.alwaysdata.net/annonce/<?=$row->getId()?></loc>
      <changefreq>weekly</changefreq>
        <priority>0.9</priority>
	</url>
	<?php endwhile; ?>
    <?php while ($row = $this->data['agents']->fetch()): ?>
	<url>
	  <loc>https://movinghouse.alwaysdata.net/all-agents/<?=$row->getId()?></loc>
      <changefreq>monthly</changefreq>
        <priority>0.9</priority>
	</url>
	<?php endwhile; ?>
</urlset>