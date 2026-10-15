<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Google Image Sitemap - Extended Version
// Covers ALL pages: Home, About, Services, Gallery, Products, Testimonials, Contact
// Uses <image:image> tags under the page URL that displays each image.
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">

  <!-- ========== HOMEPAGE ========== -->
  <url>
    <loc><?php echo $site_url; ?>/</loc>
    <!-- Hero background images -->
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/hero-bg.jpg</image:loc>
      <image:title>Kiara Battery Clinic - Coimbatore's Best Battery, UPS, Inverter &amp; Solar Service</image:title>
      <image:caption>Doorstep battery replacement and solar installation service in Coimbatore, Ooty, Pollachi, Tiruppur by Kiara Battery Clinic</image:caption>
    </image:image>
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/hero-bg-2.jpg</image:loc>
      <image:title>Solar Panel Installation Service Coimbatore - Kiara Battery Clinic</image:title>
      <image:caption>Complete rooftop solar panel installation with government scheme support across Tamil Nadu</image:caption>
    </image:image>
    <!-- Logo -->
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/logo.png</image:loc>
      <image:title>Kiara Battery Clinic Logo - Coimbatore Battery, UPS &amp; Solar Service</image:title>
    </image:image>
    <!-- OG Share Banner -->
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/og-share-banner.jpg</image:loc>
      <image:title>Kiara Battery Clinic - Doorstep Battery, UPS &amp; Solar Service Coimbatore</image:title>
      <image:caption>Best battery service and installation - car battery, bike battery, home UPS, inverter and solar install in Coimbatore</image:caption>
    </image:image>
    <!-- Goals section - 4 service images -->
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/our-goals-img-1.jpg</image:loc>
      <image:title>Car Battery Replacement Doorstep Service Coimbatore - Kiara Battery Clinic</image:title>
      <image:caption>Best battery service and installation - doorstep car battery replacement in Coimbatore, Tamil Nadu</image:caption>
    </image:image>
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/our-goals-img-2.jpg</image:loc>
      <image:title>Home UPS and Inverter Battery Installation Coimbatore</image:title>
      <image:caption>Best UPS inverter installation service - home UPS setup and tubular battery replacement in Coimbatore</image:caption>
    </image:image>
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/our-goals-img-3.jpg</image:loc>
      <image:title>Solar Panel Installation Coimbatore Ooty Kotagiri - Kiara Battery Clinic</image:title>
      <image:caption>Rooftop solar panel installation and solar inverter setup service in Coimbatore and Nilgiris region</image:caption>
    </image:image>
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/our-goals-img-4.jpg</image:loc>
      <image:title>Industrial UPS Battery Bank Installation Coimbatore - Kiara Battery Clinic</image:title>
      <image:caption>Industrial UPS and inverter battery bank installation and maintenance service in Coimbatore, Tamil Nadu</image:caption>
    </image:image>
    <!-- Facts image -->
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/facts-image.png</image:loc>
      <image:title>Kiara Battery Clinic Doorstep Battery Service - Coimbatore</image:title>
      <image:caption>Doorstep battery replacement and UPS repair service across Coimbatore, Ooty, Pollachi and Tiruppur</image:caption>
    </image:image>
    <!-- FAQs image -->
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/faqs-image.jpg</image:loc>
      <image:title>Battery UPS Solar Service FAQs - Kiara Battery Clinic Coimbatore</image:title>
      <image:caption>Frequently asked questions about battery replacement, UPS installation and solar service in Coimbatore</image:caption>
    </image:image>
    <!-- Services section thumbnails on homepage -->
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/service-image-1.jpg</image:loc>
      <image:title>Car Battery Replacement Service Coimbatore - Kiara Battery Clinic</image:title>
      <image:caption>Best car battery replacement service at doorstep in Coimbatore - all brands Amaron, Exide, SF Sonic</image:caption>
    </image:image>
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/service-image-2.jpg</image:loc>
      <image:title>Bike Battery Replacement Doorstep Service Coimbatore</image:title>
      <image:caption>Two-wheeler and bike battery replacement with doorstep fitting in Coimbatore, Ooty, Tiruppur</image:caption>
    </image:image>
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/service-image-3.jpg</image:loc>
      <image:title>Home UPS and Inverter Installation Coimbatore</image:title>
      <image:caption>Home UPS and inverter battery installation service in Coimbatore by trained technicians</image:caption>
    </image:image>
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/service-image-4.jpg</image:loc>
      <image:title>Solar Panel Installation Coimbatore Tamil Nadu</image:title>
      <image:caption>Solar power system installation for homes and businesses in Coimbatore with government subsidy support</image:caption>
    </image:image>
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/service-image-5.jpg</image:loc>
      <image:title>Industrial UPS Service and Installation Coimbatore</image:title>
      <image:caption>Industrial UPS and power backup systems for factories and data centres in Coimbatore</image:caption>
    </image:image>
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/service-image-6.jpg</image:loc>
      <image:title>Battery Repair and Testing Service Coimbatore - Kiara Battery Clinic</image:title>
      <image:caption>Battery repair, testing and maintenance service in Coimbatore - all battery types</image:caption>
    </image:image>
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/service-image-7.jpg</image:loc>
      <image:title>UPS Repair and Maintenance Coimbatore</image:title>
      <image:caption>UPS AMC and repair service for home and industrial UPS systems in Coimbatore, Tamil Nadu</image:caption>
    </image:image>
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/service-image-8.jpg</image:loc>
      <image:title>Tubular Battery Installation Coimbatore - Kiara Battery Clinic</image:title>
      <image:caption>Long-life tubular battery installation for home inverters in Coimbatore, Tiruppur, Pollachi</image:caption>
    </image:image>
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/service-image-9.jpg</image:loc>
      <image:title>Battery Service and Doorstep Fitting in Coimbatore</image:title>
      <image:caption>Professional battery fitting and installation at your doorstep across Coimbatore district</image:caption>
    </image:image>
    <!-- CTA box image -->
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/cta-box-img.png</image:loc>
      <image:title>Kiara Battery Clinic Doorstep Service Vehicle - Coimbatore</image:title>
      <image:caption>Call Kiara Battery Clinic for 24/7 doorstep battery and UPS service anywhere in Coimbatore</image:caption>
    </image:image>
    <!-- Dynamic service images from DB -->
    <?php if (!empty($serviceList)): ?>
    <?php foreach ($serviceList as $s): ?>
    <?php
        $srvPath = ltrim((string)$s->service_img, './');
        if ($srvPath === '') { continue; }
        $srvImgUrl = (strpos($s->service_img, 'http') === 0)
            ? $s->service_img
            : $site_url . '/' . ((strpos($srvPath, 'uploads/') === 0 || strpos($srvPath, 'themes/') === 0)
                ? $srvPath
                : 'uploads/service_img/' . $srvPath);
    ?>
    <image:image>
      <image:loc><?php echo htmlspecialchars($srvImgUrl, ENT_QUOTES, 'UTF-8'); ?></image:loc>
      <image:title><?php echo htmlspecialchars(trim(strip_tags($s->service_name)), ENT_QUOTES, 'UTF-8'); ?> - Best Battery Service and Installation in Coimbatore | Kiara Battery Clinic</image:title>
      <?php if (!empty($s->short_description)): ?><image:caption><?php echo htmlspecialchars(trim(strip_tags($s->short_description)), ENT_QUOTES, 'UTF-8'); ?> - Coimbatore Battery Service</image:caption><?php endif; ?>
    </image:image>
    <?php endforeach; ?>
    <?php endif; ?>
  </url>

  <!-- ========== ABOUT US ========== -->
  <url>
    <loc><?php echo $site_url; ?>/about-us</loc>
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/about-image-1.jpg</image:loc>
      <image:title>Kiara Battery Clinic Technicians at Work - Coimbatore Battery Service</image:title>
      <image:caption>Expert battery technicians providing doorstep car battery and bike battery service in Coimbatore</image:caption>
    </image:image>
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/about-image-2.jpg</image:loc>
      <image:title>Kiara Battery Clinic Shop - Coimbatore Battery and UPS Store</image:title>
      <image:caption>Battery shop in Coimbatore - car battery, bike battery, home UPS, inverter and solar service centre</image:caption>
    </image:image>
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/company-values-image-1.jpg</image:loc>
      <image:title>Kiara Battery Clinic Coimbatore - Trusted Power Solutions Provider</image:title>
      <image:caption>Trusted battery and power solutions in Coimbatore - genuine products, doorstep service, best prices</image:caption>
    </image:image>
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/company-values-image-2.jpg</image:loc>
      <image:title>UPS and Solar Service - Kiara Battery Clinic Coimbatore</image:title>
      <image:caption>Home UPS, inverter and solar panel installation service in Coimbatore by Kiara Battery Clinic</image:caption>
    </image:image>
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/faqs-image.jpg</image:loc>
      <image:title>Battery and UPS Service FAQs Coimbatore - Kiara Battery Clinic</image:title>
      <image:caption>Common questions about battery replacement, UPS installation and solar service in Coimbatore</image:caption>
    </image:image>
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/cta-box-img.png</image:loc>
      <image:title>Kiara Battery Clinic - Call for 24/7 Doorstep Service Coimbatore</image:title>
      <image:caption>Book a battery or UPS service - our technicians come to your doorstep anywhere in Coimbatore</image:caption>
    </image:image>
  </url>

  <!-- ========== SERVICES LIST PAGE ========== -->
  <url>
    <loc><?php echo $site_url; ?>/services</loc>
    <?php if (!empty($serviceList)): ?>
    <?php foreach ($serviceList as $s): ?>
    <?php
        $srvPath2 = ltrim((string)$s->service_img, './');
        if ($srvPath2 === '') { continue; }
        $srvImgUrl2 = (strpos($s->service_img, 'http') === 0)
            ? $s->service_img
            : $site_url . '/' . ((strpos($srvPath2, 'uploads/') === 0 || strpos($srvPath2, 'themes/') === 0)
                ? $srvPath2
                : 'uploads/service_img/' . $srvPath2);
        $sToken2 = !empty($s->token) ? $s->token : $s->id;
    ?>
    <image:image>
      <image:loc><?php echo htmlspecialchars($srvImgUrl2, ENT_QUOTES, 'UTF-8'); ?></image:loc>
      <image:title><?php echo htmlspecialchars(trim(strip_tags($s->service_name)), ENT_QUOTES, 'UTF-8'); ?> - Best Battery, UPS, Inverter &amp; Solar Installation Service in Coimbatore</image:title>
      <?php if (!empty($s->short_description)): ?><image:caption><?php echo htmlspecialchars(trim(strip_tags($s->short_description)), ENT_QUOTES, 'UTF-8'); ?> - Kiara Battery Clinic Coimbatore</image:caption><?php endif; ?>
    </image:image>
    <?php endforeach; ?>
    <?php endif; ?>
    <!-- Static service entry images -->
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/service-entry-image-1.jpg</image:loc>
      <image:title>Battery and Solar Service in Coimbatore - Kiara Battery Clinic</image:title>
      <image:caption>Complete battery replacement, UPS and solar installation services in Coimbatore</image:caption>
    </image:image>
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/service-entry-image-2.jpg</image:loc>
      <image:title>Doorstep Battery Service Coimbatore - All Battery Types</image:title>
      <image:caption>Car battery, bike battery, home UPS, industrial UPS and solar service at your doorstep in Coimbatore</image:caption>
    </image:image>
  </url>

  <!-- ========== INDIVIDUAL SERVICE DETAIL PAGES ========== -->
  <?php if (!empty($serviceList)): ?>
  <?php foreach ($serviceList as $s): ?>
  <?php
      $srvPath3 = ltrim((string)$s->service_img, './');
      if ($srvPath3 === '') { continue; }
      $srvImgUrl3 = (strpos($s->service_img, 'http') === 0)
          ? $s->service_img
          : $site_url . '/' . ((strpos($srvPath3, 'uploads/') === 0 || strpos($srvPath3, 'themes/') === 0)
              ? $srvPath3
              : 'uploads/service_img/' . $srvPath3);
      $sToken3 = !empty($s->token) ? $s->token : $s->id;
  ?>
  <url>
    <loc><?php echo $site_url; ?>/service/<?php echo htmlspecialchars($sToken3, ENT_QUOTES, 'UTF-8'); ?></loc>
    <image:image>
      <image:loc><?php echo htmlspecialchars($srvImgUrl3, ENT_QUOTES, 'UTF-8'); ?></image:loc>
      <image:title><?php echo htmlspecialchars(trim(strip_tags($s->service_name)), ENT_QUOTES, 'UTF-8'); ?> - Best Battery Service &amp; Installation in Coimbatore | Kiara Battery Clinic</image:title>
      <?php if (!empty($s->short_description)): ?><image:caption><?php echo htmlspecialchars(trim(strip_tags($s->short_description)), ENT_QUOTES, 'UTF-8'); ?></image:caption><?php endif; ?>
    </image:image>
    <!-- Process / working section icons -->
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/icon-working-box-1.svg</image:loc>
      <image:title>Genuine Battery Brands - <?php echo htmlspecialchars(trim(strip_tags($s->service_name)), ENT_QUOTES, 'UTF-8'); ?> Coimbatore</image:title>
    </image:image>
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/icon-working-box-2.svg</image:loc>
      <image:title>24/7 Doorstep <?php echo htmlspecialchars(trim(strip_tags($s->service_name)), ENT_QUOTES, 'UTF-8'); ?> Service Coimbatore</image:title>
    </image:image>
  </url>
  <?php endforeach; ?>
  <?php endif; ?>

  <!-- ========== GALLERY PAGE ========== -->
  <?php if (!empty($galleryList)): ?>
  <url>
    <loc><?php echo $site_url; ?>/gallery</loc>
    <?php foreach ($galleryList as $row): ?>
    <?php
        $gPath = ltrim((string)$row->gallery_img, './');
        $gUrl = (strpos($row->gallery_img, 'http') === 0)
            ? $row->gallery_img
            : $site_url . '/' . $gPath;
        $gTitle = !empty($row->gallery_name) ? trim(strip_tags($row->gallery_name)) : '';
        $gCaption = !empty($row->description) ? trim(strip_tags($row->description)) : '';
        if ($gTitle === '' && $gPath === '') { continue; }
        if ($gTitle === '') { $gTitle = 'Kiara Battery Clinic - Battery and Solar Installation Coimbatore'; }
    ?>
    <image:image>
      <image:loc><?php echo htmlspecialchars($gUrl, ENT_QUOTES, 'UTF-8'); ?></image:loc>
      <image:title><?php echo htmlspecialchars($gTitle, ENT_QUOTES, 'UTF-8'); ?> - Coimbatore Battery, UPS &amp; Solar Installation | Kiara Battery Clinic</image:title>
      <image:caption><?php echo htmlspecialchars($gCaption !== '' ? $gCaption : 'Professional battery replacement, UPS inverter setup and solar panel installation in Coimbatore by Kiara Battery Clinic', ENT_QUOTES, 'UTF-8'); ?></image:caption>
    </image:image>
    <?php endforeach; ?>
    <!-- Static gallery images from themes folder -->
    <?php
    $staticGalleryImages = [
        ['file' => 'gallery-1.jpg', 'title' => 'Car Battery Replacement Doorstep Service Coimbatore', 'caption' => 'Best car battery replacement service in Coimbatore - Amaron, Exide, SF Sonic at best price with doorstep fitting by Kiara Battery Clinic'],
        ['file' => 'gallery-2.jpg', 'title' => 'Bike Battery Replacement Coimbatore', 'caption' => 'Bike and two-wheeler battery replacement at doorstep in Coimbatore, Ooty, Pollachi, Tiruppur by Kiara Battery Clinic'],
        ['file' => 'gallery-3.jpg', 'title' => 'Home UPS and Inverter Battery Installation Coimbatore', 'caption' => 'Home UPS and inverter battery setup service in Coimbatore - best battery service and installation by Kiara Battery Clinic'],
        ['file' => 'gallery-4.jpg', 'title' => 'Solar Panel Installation Coimbatore Tamil Nadu', 'caption' => 'Rooftop solar panel installation with government subsidy in Coimbatore, Ooty, Kotagiri by Kiara Battery Clinic'],
        ['file' => 'gallery-5.jpg', 'title' => 'Industrial UPS Installation Coimbatore Factory Power Backup', 'caption' => 'Industrial UPS and battery bank installation for factories in Coimbatore - best UPS service and installation'],
        ['file' => 'gallery-6.jpg', 'title' => 'Inverter Battery Installation Coimbatore - Kiara Battery Clinic', 'caption' => 'Tubular inverter battery installation and replacement in Coimbatore homes and offices'],
        ['file' => 'gallery-7.jpg', 'title' => 'Battery Service and Testing Coimbatore', 'caption' => 'Battery health check, testing and service for all vehicle types in Coimbatore by Kiara Battery Clinic'],
        ['file' => 'gallery-8.jpg', 'title' => 'UPS AMC and Repair Service Coimbatore', 'caption' => 'UPS annual maintenance contract and repair service in Coimbatore, Tamil Nadu by Kiara Battery Clinic'],
        ['file' => 'gallery-9.jpg', 'title' => 'Solar Inverter and Battery Bank Setup Coimbatore', 'caption' => 'Solar inverter and battery bank installation for homes and factories in Coimbatore, Ooty region'],
    ];
    ?>
    <?php foreach ($staticGalleryImages as $sg): ?>
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/<?php echo $sg['file']; ?></image:loc>
      <image:title><?php echo htmlspecialchars($sg['title'], ENT_QUOTES, 'UTF-8'); ?></image:title>
      <image:caption><?php echo htmlspecialchars($sg['caption'], ENT_QUOTES, 'UTF-8'); ?></image:caption>
    </image:image>
    <?php endforeach; ?>
    <!-- Project images -->
    <?php
    $projectImages = [
        ['file' => 'project-1.jpg', 'title' => 'Battery Replacement Project Coimbatore - Kiara Battery Clinic', 'caption' => 'Completed car battery replacement project in Coimbatore - best battery service and installation'],
        ['file' => 'project-2.jpg', 'title' => 'Home UPS Installation Project Coimbatore', 'caption' => 'Completed home UPS inverter installation project in Coimbatore by Kiara Battery Clinic'],
        ['file' => 'project-3.jpg', 'title' => 'Solar Panel Installation Project Coimbatore', 'caption' => 'Completed rooftop solar panel installation in Coimbatore - best solar install service'],
        ['file' => 'project-4.jpg', 'title' => 'Industrial UPS Project Coimbatore Factory', 'caption' => 'Completed industrial UPS and battery bank installation for factory in Coimbatore'],
        ['file' => 'project-5.jpg', 'title' => 'Inverter Battery Installation Coimbatore Project', 'caption' => 'Completed inverter battery installation project - best inverter battery service Coimbatore'],
        ['file' => 'project-6.jpg', 'title' => 'Bike Battery Service Project Coimbatore', 'caption' => 'Completed bike battery replacement project - doorstep service in Coimbatore'],
        ['file' => 'project-7.jpg', 'title' => 'UPS Repair and AMC Service Project Coimbatore', 'caption' => 'UPS repair and annual maintenance contract service in Coimbatore by Kiara Battery Clinic'],
        ['file' => 'project-8.jpg', 'title' => 'Solar Inverter Project Ooty Nilgiris - Kiara Battery Clinic', 'caption' => 'Solar inverter installation project in Ooty and Nilgiris region by Kiara Battery Clinic'],
        ['file' => 'project-9.jpg', 'title' => 'Battery Bank Installation Industrial Coimbatore', 'caption' => 'Battery bank and industrial power backup installation in Coimbatore, Tamil Nadu'],
    ];
    ?>
    <?php foreach ($projectImages as $pi): ?>
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/<?php echo $pi['file']; ?></image:loc>
      <image:title><?php echo htmlspecialchars($pi['title'], ENT_QUOTES, 'UTF-8'); ?></image:title>
      <image:caption><?php echo htmlspecialchars($pi['caption'], ENT_QUOTES, 'UTF-8'); ?></image:caption>
    </image:image>
    <?php endforeach; ?>
  </url>
  <?php endif; ?>

  <!-- ========== PRODUCTS PAGE ========== -->
  <url>
    <loc><?php echo $site_url; ?>/products</loc>
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/team-1.jpg</image:loc>
      <image:title>Amaron Pro Car Battery 55Ah - Best Price in Coimbatore | Kiara Battery Clinic</image:title>
      <image:caption>Amaron Pro car battery 55Ah available at best price in Coimbatore with free doorstep fitting</image:caption>
    </image:image>
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/team-2.jpg</image:loc>
      <image:title>Exide Xplore Bike Battery 5Ah - Coimbatore Doorstep Delivery</image:title>
      <image:caption>Exide Xplore bike battery 5Ah with doorstep delivery and free fitting in Coimbatore, Ooty, Tiruppur</image:caption>
    </image:image>
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/team-3.jpg</image:loc>
      <image:title>Exide Inva Master 150Ah Tubular Battery - Long Backup for Inverter Coimbatore</image:title>
      <image:caption>Exide InvaMaster 150Ah tubular battery for home inverter - long backup, best price in Coimbatore</image:caption>
    </image:image>
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/team-4.jpg</image:loc>
      <image:title>Luminous Eco Watt 900VA Inverter - Home Use Coimbatore</image:title>
      <image:caption>Luminous Eco Watt 900VA home inverter with doorstep installation service in Coimbatore</image:caption>
    </image:image>
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/team-5.jpg</image:loc>
      <image:title>Loom Solar 440W Mono PERC Panel - Rooftop Installation Coimbatore</image:title>
      <image:caption>Loom Solar 440W mono PERC solar panel for rooftop installation in Coimbatore, Ooty, Tamil Nadu</image:caption>
    </image:image>
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/team-6.jpg</image:loc>
      <image:title>APC Smart-UPS 3000VA Industrial UPS - Factory Power Backup Coimbatore</image:title>
      <image:caption>APC Smart-UPS 3000VA industrial UPS for factory and data centre power backup in Coimbatore</image:caption>
    </image:image>
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/team-7.jpg</image:loc>
      <image:title>Amaron Current 150Ah Tall Tubular Battery - Long Life Inverter Battery Coimbatore</image:title>
      <image:caption>Amaron Current 150Ah tall tubular battery for long-life inverter power backup in Coimbatore</image:caption>
    </image:image>
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/team-8.jpg</image:loc>
      <image:title>Amaron Go 65Ah Car Battery - All Car Brands Coimbatore</image:title>
      <image:caption>Amaron Go 65Ah car battery for all car brands - best price and doorstep fitting in Coimbatore</image:caption>
    </image:image>
    <!-- Category images -->
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/category-amaron.jpg</image:loc>
      <image:title>Amaron Battery Dealer Coimbatore - Best Price with Warranty</image:title>
      <image:caption>Amaron car and bike batteries with long life and zero-maintenance warranty in Coimbatore - Kiara Battery Clinic</image:caption>
    </image:image>
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/category-exide.jpg</image:loc>
      <image:title>Exide Battery Dealer Coimbatore - Bike, Car, Tubular Batteries</image:title>
      <image:caption>Exide batteries for bikes, cars, UPS and inverters - trusted brand at best price in Coimbatore</image:caption>
    </image:image>
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/category-ups-inverter.jpg</image:loc>
      <image:title>Home UPS and Inverter Battery Coimbatore - Kiara Battery Clinic</image:title>
      <image:caption>Reliable home UPS systems and inverters with professional doorstep installation in Coimbatore</image:caption>
    </image:image>
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/category-solar.jpg</image:loc>
      <image:title>Solar Panel Installation Coimbatore Ooty - Government Scheme</image:title>
      <image:caption>Complete rooftop solar panel installations with government subsidy assistance across Tamil Nadu</image:caption>
    </image:image>
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/category-industrial-ups.jpg</image:loc>
      <image:title>Industrial UPS Installation Coimbatore - Factory Power Backup</image:title>
      <image:caption>High-capacity industrial UPS for factories and data centres with AMC and maintenance in Coimbatore</image:caption>
    </image:image>
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/category-tubular.jpg</image:loc>
      <image:title>Tubular Battery for Inverter and UPS Coimbatore</image:title>
      <image:caption>Long-lasting tubular batteries for home inverters and UPS systems - best brands at lowest prices in Coimbatore</image:caption>
    </image:image>
  </url>

  <!-- ========== TESTIMONIALS PAGE ========== -->
  <url>
    <loc><?php echo $site_url; ?>/testimonials</loc>
    <?php if (!empty($testimonialList)): ?>
    <?php $seenImgs = array(); ?>
    <?php foreach ($testimonialList as $t): ?>
    <?php
        if (empty($t->reviewer_img) || empty($t->reviewer_name)) { continue; }
        if (stripos($t->reviewer_img, 'pxl_') !== false) { continue; }
        $rName = trim(strip_tags($t->reviewer_name));
        $rImgUrl = (strpos($t->reviewer_img, 'http') === 0 || strpos($t->reviewer_img, './') === 0 || strpos($t->reviewer_img, 'uploads/') === 0)
            ? $site_url . '/' . ltrim($t->reviewer_img, './')
            : $site_url . '/uploads/testimonials/' . $t->reviewer_img;
        if (isset($seenImgs[$rImgUrl])) { continue; }
        $seenImgs[$rImgUrl] = true;
    ?>
    <image:image>
      <image:loc><?php echo htmlspecialchars($rImgUrl, ENT_QUOTES, 'UTF-8'); ?></image:loc>
      <image:title><?php echo htmlspecialchars($rName, ENT_QUOTES, 'UTF-8'); ?> - Customer Review, Kiara Battery Clinic Coimbatore</image:title>
      <image:caption>Verified customer review for Kiara Battery Clinic battery and UPS service in Coimbatore</image:caption>
    </image:image>
    <?php endforeach; ?>
    <?php endif; ?>
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/faqs-image.jpg</image:loc>
      <image:title>Battery Service Reviews Coimbatore - Kiara Battery Clinic</image:title>
      <image:caption>Customer reviews and testimonials for battery replacement, UPS and solar service in Coimbatore</image:caption>
    </image:image>
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/cta-box-img.png</image:loc>
      <image:title>Kiara Battery Clinic - Doorstep Battery and UPS Service Coimbatore</image:title>
      <image:caption>Book a doorstep battery or UPS service in Coimbatore - call Kiara Battery Clinic anytime</image:caption>
    </image:image>
  </url>

  <!-- ========== CONTACT US PAGE ========== -->
  <url>
    <loc><?php echo $site_url; ?>/contact-us</loc>
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/faqs-image.jpg</image:loc>
      <image:title>Contact Kiara Battery Clinic - Coimbatore Battery and Solar Service</image:title>
      <image:caption>Contact Kiara Battery Clinic for battery replacement, UPS installation and solar service in Coimbatore</image:caption>
    </image:image>
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/logo.png</image:loc>
      <image:title>Kiara Battery Clinic - Coimbatore Battery, UPS and Solar Service</image:title>
      <image:caption>Kiara Battery Clinic - 36, 9th Street, Tatabad, Coimbatore 641012, Tamil Nadu</image:caption>
    </image:image>
  </url>

  <!-- ========== BRAND PARTNER LOGOS ========== -->
  <?php if (!empty($brandList)): ?>
  <url>
    <loc><?php echo $site_url; ?>/about-us</loc>
    <?php foreach ($brandList as $b): ?>
    <?php
        $bPath = ltrim((string)$b->brand_img, './');
        if ($bPath === '') { continue; }
        $bUrl = (strpos($b->brand_img, 'http') === 0)
            ? $b->brand_img
            : ((strpos($bPath, 'uploads/') === 0 || strpos($bPath, 'themes/') === 0)
                ? $site_url . '/' . $bPath
                : $site_url . '/uploads/brand_img/' . $bPath);
    ?>
    <image:image>
      <image:loc><?php echo htmlspecialchars($bUrl, ENT_QUOTES, 'UTF-8'); ?></image:loc>
      <image:title><?php echo htmlspecialchars(trim(strip_tags($b->brand_name)), ENT_QUOTES, 'UTF-8'); ?> Battery - Kiara Battery Clinic Authorized Partner Coimbatore</image:title>
      <image:caption>Kiara Battery Clinic is an authorized dealer for <?php echo htmlspecialchars(trim(strip_tags($b->brand_name)), ENT_QUOTES, 'UTF-8'); ?> batteries in Coimbatore</image:caption>
    </image:image>
    <?php endforeach; ?>
  </url>
  <?php endif; ?>

</urlset>
