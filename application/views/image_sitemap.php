<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Google's image sitemap extension: images are listed under the URL of the
// page that actually displays them (not a standalone image URL list).
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">

  <!-- Homepage key imagery -->
  <url>
    <loc><?php echo $site_url; ?>/</loc>
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/hero-bg.jpg</image:loc>
      <image:title>Kiara Battery Clinic - Car, Bike Battery, UPS, Inverter &amp; Solar Service in Coimbatore</image:title>
    </image:image>
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/og-share-banner.jpg</image:loc>
      <image:title>Kiara Battery Clinic - Doorstep Battery, UPS &amp; Solar Service Coimbatore</image:title>
    </image:image>
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/logo.png</image:loc>
      <image:title>Kiara Battery Clinic Logo</image:title>
    </image:image>
  </url>

  <!-- About Us imagery -->
  <url>
    <loc><?php echo $site_url; ?>/about-us</loc>
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/about-image-1.jpg</image:loc>
      <image:title>Kiara Battery Clinic technicians at work - Coimbatore battery service</image:title>
    </image:image>
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/about-image-2.jpg</image:loc>
      <image:title>Battery shop in Coimbatore - car and bike battery service</image:title>
    </image:image>
  </url>

  <?php if (!empty($galleryList)): ?>
  <!-- Gallery: real service/installation photos -->
  <url>
    <loc><?php echo $site_url; ?>/gallery</loc>
    <?php foreach ($galleryList as $row): ?>
    <?php
        $imgUrl = (strpos($row->gallery_img, 'http') === 0)
            ? $row->gallery_img
            : $site_url . '/' . ltrim($row->gallery_img, './');
        $title = !empty($row->gallery_name) ? trim(strip_tags($row->gallery_name)) : '';
        $caption = !empty($row->description) ? trim(strip_tags($row->description)) : '';
        if ($title === '') { continue; }
    ?>
    <image:image>
      <image:loc><?php echo htmlspecialchars($imgUrl, ENT_QUOTES, 'UTF-8'); ?></image:loc>
      <image:title><?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></image:title>
      <?php if ($caption !== ''): ?><image:caption><?php echo htmlspecialchars($caption, ENT_QUOTES, 'UTF-8'); ?></image:caption><?php endif; ?>
    </image:image>
    <?php endforeach; ?>
  </url>
  <?php endif; ?>

</urlset>
