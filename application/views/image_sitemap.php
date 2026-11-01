<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$CI =& get_instance();
if (!isset($site_url)) {
    $site_url = rtrim(base_url(), '/');
}
if (!isset($serviceList) && isset($CI->webmodel)) {
    $serviceList = $CI->webmodel->serviceList();
}
if (!isset($galleryList) && isset($CI->webmodel)) {
    $galleryList = $CI->webmodel->galleryList();
}
if (!isset($testimonialList) && isset($CI->webmodel)) {
    $testimonialList = $CI->webmodel->testimonialList();
}
if (!isset($brandList) && isset($CI->webmodel)) {
    $brandList = $CI->webmodel->brandList();
}
if (!class_exists('Gallerymodel') && isset($CI->load)) {
    $CI->load->model('gallerymodel');
}

// Google Image Sitemap - Extended Version
// Covers ALL pages: Home, About, Services, Gallery, Testimonials, Contact
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
      <image:loc><?php echo $site_url; ?>/themes/images/hero-bg.png</image:loc>
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
      <image:loc><?php echo $site_url; ?>/themes/images/our-goals-img-1.png</image:loc>
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
      <image:loc><?php echo $site_url; ?>/themes/images/our-goals-img-4.png</image:loc>
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
      <image:loc><?php echo $site_url; ?>/themes/images/home-image.png</image:loc>
      <image:title>Battery UPS Solar Service FAQs - Kiara Battery Clinic Coimbatore</image:title>
      <image:caption>Frequently asked questions about battery replacement, UPS installation and solar service in Coimbatore</image:caption>
    </image:image>
    <!-- CTA box image -->
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/cta-box-img.png</image:loc>
      <image:title>Kiara Battery Clinic Doorstep Service Vehicle - Coimbatore</image:title>
      <image:caption>Call Kiara Battery Clinic for 24/7 doorstep battery and UPS service anywhere in Coimbatore</image:caption>
    </image:image>
    <!-- Dynamic service images displayed on homepage slider -->
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
        $sNameClean = htmlspecialchars(trim(strip_tags($s->service_name)), ENT_QUOTES, 'UTF-8');
        $sDescClean = !empty($s->short_description) ? htmlspecialchars(trim(strip_tags($s->short_description)), ENT_QUOTES, 'UTF-8') : '';
    ?>
    <image:image>
      <image:loc><?php echo htmlspecialchars($srvImgUrl, ENT_QUOTES, 'UTF-8'); ?></image:loc>
      <image:title><?php echo $sNameClean; ?> - Best Battery Service and Installation in Coimbatore | Kiara Battery Clinic</image:title>
      <?php if (!empty($sDescClean)): ?><image:caption><?php echo $sDescClean; ?> - Coimbatore Battery Service</image:caption><?php endif; ?>
    </image:image>
    <?php endforeach; ?>
    <?php endif; ?>
  </url>

  <!-- ========== ABOUT US ========== -->
  <url>
    <loc><?php echo $site_url; ?>/about-us</loc>
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/about-image-1.png</image:loc>
      <image:title>Kiara Battery Clinic Technicians at Work - Coimbatore Battery Service</image:title>
      <image:caption>Expert battery technicians providing doorstep car battery and bike battery service in Coimbatore</image:caption>
    </image:image>
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/about-image-2.png</image:loc>
      <image:title>Kiara Battery Clinic Shop - Coimbatore Battery and UPS Store</image:title>
      <image:caption>Battery shop in Coimbatore - car battery, bike battery, home UPS, inverter and solar service centre</image:caption>
    </image:image>
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/company-values-image-1.png</image:loc>
      <image:title>Kiara Battery Clinic Coimbatore - Trusted Power Solutions Provider</image:title>
      <image:caption>Trusted battery and power solutions in Coimbatore - genuine products, doorstep service, best prices</image:caption>
    </image:image>
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/company-values-image-2.jpg</image:loc>
      <image:title>UPS and Solar Service - Kiara Battery Clinic Coimbatore</image:title>
      <image:caption>Home UPS, inverter and solar panel installation service in Coimbatore by Kiara Battery Clinic</image:caption>
    </image:image>
    <image:image>
      <image:loc><?php echo $site_url; ?>/themes/images/about-image.png</image:loc>
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
        $rowImgs = class_exists('Gallerymodel') ? Gallerymodel::parseImages($row->gallery_img) : (array)$row->gallery_img;
        $totalImgs = count($rowImgs);
        $gTitle = !empty($row->gallery_name) ? trim(strip_tags($row->gallery_name)) : 'Kiara Battery Clinic - Battery and Solar Installation Coimbatore';
        $gCaption = !empty($row->description) ? trim(strip_tags($row->description)) : 'Professional battery replacement, UPS inverter setup and solar panel installation in Coimbatore by Kiara Battery Clinic';
        foreach ($rowImgs as $idx => $gImg):
            $gPath = ltrim((string)$gImg, './');
            if ($gPath === '') { continue; }
            $gUrl = (strpos($gImg, 'http') === 0) ? $gImg : $site_url . '/' . $gPath;
            $photoSuffix = ($totalImgs > 1) ? ' (Photo ' . ($idx + 1) . ' of ' . $totalImgs . ')' : '';
    ?>
    <image:image>
      <image:loc><?php echo htmlspecialchars($gUrl, ENT_QUOTES, 'UTF-8'); ?></image:loc>
      <image:title><?php echo htmlspecialchars($gTitle . $photoSuffix, ENT_QUOTES, 'UTF-8'); ?> - Coimbatore Battery, UPS &amp; Solar Installation | Kiara Battery Clinic</image:title>
      <image:caption><?php echo htmlspecialchars($gCaption, ENT_QUOTES, 'UTF-8'); ?></image:caption>
    </image:image>
    <?php endforeach; ?>
    <?php endforeach; ?>
  </url>
  <?php endif; ?>

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
      <image:loc><?php echo $site_url; ?>/themes/images/faqs-image.png</image:loc>
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
      <image:loc><?php echo $site_url; ?>/themes/images/contact-image.png</image:loc>
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
