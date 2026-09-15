<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Get SEO metadata for a page key merged with custom overrides
 */
if (!function_exists('get_seo_meta')) {
    function get_seo_meta($page_key = 'home', $custom_data = array()) {
        $CI =& get_instance();
        $CI->config->load('seo_config', TRUE);
        $seo_config = $CI->config->item('seo_config');

        $site_url = rtrim($seo_config['seo']['site_url'], '/') . '/';
        $site_name = $seo_config['seo']['site_name'];
        $default_og_image = $site_url . ltrim($seo_config['seo']['default_og_image'], '/');

        $pages = $seo_config['seo']['pages'];
        $page = isset($pages[$page_key]) ? $pages[$page_key] : $pages['home'];

        $title = !empty($custom_data['metaTitle']) ? $custom_data['metaTitle'] : (
            !empty($custom_data['title']) ? $custom_data['title'] : $page['title']
        );
        $description = !empty($custom_data['metaDescription']) ? $custom_data['metaDescription'] : (
            !empty($custom_data['description']) ? $custom_data['description'] : $page['description']
        );
        $keywords = !empty($custom_data['metaKeyword']) ? $custom_data['metaKeyword'] : (
            !empty($custom_data['keywords']) ? $custom_data['keywords'] : $page['keywords']
        );
        
        $canonical_slug = isset($custom_data['canonical']) ? $custom_data['canonical'] : $page['canonical'];
        $canonical = $canonical_slug === '' ? $site_url : $site_url . ltrim($canonical_slug, '/');

        $og_image = !empty($custom_data['og_image']) ? $custom_data['og_image'] : $default_og_image;
        if (strpos($og_image, 'http') !== 0) {
            $og_image = $site_url . ltrim($og_image, '/');
        }

        $og_type = !empty($custom_data['og_type']) ? $custom_data['og_type'] : $page['og_type'];
        $schema_type = !empty($custom_data['schema_type']) ? $custom_data['schema_type'] : $page['schema_type'];
        $robots = !empty($custom_data['robots']) ? $custom_data['robots'] : 'index, follow';

        // Breadcrumbs array
        $breadcrumbs = array(
            array('name' => 'Home', 'url' => $site_url)
        );
        if ($page_key !== 'home' && !empty($page['title'])) {
            $crumb_title = isset($custom_data['crumb_title']) ? $custom_data['crumb_title'] : trim(explode('|', $page['title'])[0]);
            $breadcrumbs[] = array('name' => $crumb_title, 'url' => $canonical);
        }

        return array(
            'page_key' => $page_key,
            'site_name' => $site_name,
            'site_url' => $site_url,
            'title' => htmlspecialchars($title, ENT_QUOTES, 'UTF-8'),
            'description' => htmlspecialchars($description, ENT_QUOTES, 'UTF-8'),
            'keywords' => htmlspecialchars($keywords, ENT_QUOTES, 'UTF-8'),
            'canonical' => $canonical,
            'og_image' => $og_image,
            'og_type' => $og_type,
            'schema_type' => $schema_type,
            'robots' => $robots,
            'breadcrumbs' => $breadcrumbs,
            'business_info' => $seo_config['seo']['business_info'],
            'aeo_questions' => isset($seo_config['seo']['aeo_questions']) ? $seo_config['seo']['aeo_questions'] : array()
        );
    }
}

/**
 * Render complete HTML SEO Head elements (title, meta, canonical, open graph, twitter)
 */
if (!function_exists('render_seo_tags')) {
    function render_seo_tags($meta) {
        $html = '';
        $html .= '	<title>' . $meta['title'] . '</title>' . "\n";
        $html .= '	<meta name="title" content="' . $meta['title'] . '">' . "\n";
        $html .= '	<meta name="description" content="' . $meta['description'] . '">' . "\n";
        $html .= '	<meta name="keywords" content="' . $meta['keywords'] . '">' . "\n";
        $html .= '	<meta name="robots" content="' . $meta['robots'] . '">' . "\n";
        $html .= '	<meta name="googlebot" content="' . $meta['robots'] . '">' . "\n";
        $html .= '	<link rel="canonical" href="' . $meta['canonical'] . '">' . "\n";
        
        // Open Graph (WhatsApp, Facebook, LinkedIn, iMessage)
        $html .= '	<meta property="og:site_name" content="' . $meta['site_name'] . '">' . "\n";
        $html .= '	<meta property="og:type" content="' . $meta['og_type'] . '">' . "\n";
        $html .= '	<meta property="og:url" content="' . $meta['canonical'] . '">' . "\n";
        $html .= '	<meta property="og:title" content="' . $meta['title'] . '">' . "\n";
        $html .= '	<meta property="og:description" content="' . $meta['description'] . '">' . "\n";
        $html .= '	<meta property="og:image" content="' . $meta['og_image'] . '">' . "\n";
        $html .= '	<meta property="og:image:secure_url" content="' . $meta['og_image'] . '">' . "\n";
        $html .= '	<meta property="og:image:type" content="image/jpeg">' . "\n";
        $html .= '	<meta property="og:image:width" content="1200">' . "\n";
        $html .= '	<meta property="og:image:height" content="630">' . "\n";

        // Twitter / X Card
        $html .= '	<meta name="twitter:card" content="summary_large_image">' . "\n";
        $html .= '	<meta name="twitter:url" content="' . $meta['canonical'] . '">' . "\n";
        $html .= '	<meta name="twitter:title" content="' . $meta['title'] . '">' . "\n";
        $html .= '	<meta name="twitter:description" content="' . $meta['description'] . '">' . "\n";
        $html .= '	<meta name="twitter:image" content="' . $meta['og_image'] . '">' . "\n";

        return $html;
    }
}

/**
 * Render structured JSON-LD Schema.org scripts (Organization, LocalBusiness, BreadcrumbList, FAQPage, Service)
 */
if (!function_exists('render_schema_jsonld')) {
    function render_schema_jsonld($meta) {
        $b = $meta['business_info'];
        $site_url = $meta['site_url'];

        // 1. Organization Schema
        $org_schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => $b['name'],
            'url' => $site_url,
            'logo' => $site_url . 'themes/images/logo.png',
            'contactPoint' => array(
                '@type' => 'ContactPoint',
                'telephone' => $b['phone'],
                'contactType' => 'customer service',
                'areaServed' => 'IN',
                'availableLanguage' => array('en', 'ta')
            ),
            'sameAs' => array_values($b['social'])
        );

        // 2. LocalBusiness / AutomotiveBusiness Schema
        $local_schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'AutomotiveBusiness',
            'name' => $b['name'],
            'image' => $meta['og_image'],
            '@id' => $site_url . '#localbusiness',
            'url' => $site_url,
            'telephone' => $b['phone'],
            'priceRange' => $b['price_range'],
            'address' => array(
                '@type' => 'PostalAddress',
                'streetAddress' => $b['street'],
                'addressLocality' => $b['locality'],
                'addressRegion' => $b['region'],
                'postalCode' => $b['postal_code'],
                'addressCountry' => $b['country']
            ),
            'geo' => array(
                '@type' => 'GeoCoordinates',
                'latitude' => 11.016647,
                'longitude' => 76.950577
            ),
            'openingHoursSpecification' => array(
                '@type' => 'OpeningHoursSpecification',
                'dayOfWeek' => array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'),
                'opens' => '00:00',
                'closes' => '23:59'
            ),
            'areaServed' => $b['area_served'],
            'brand' => array_map(function($brand) { return array('@type' => 'Brand', 'name' => $brand); }, $b['brands_offered']),
            'knowsAbout' => array(
                'Car Battery Replacement',
                'Bike Battery Sales & Service',
                'Home UPS & Inverter Installation',
                'Tubular Inverter Batteries',
                'Industrial Power Back-up Systems',
                'Rooftop Solar Panel Installation'
            ),
            'hasMap' => $b['google_maps']
        );

        // 3. WebSite Schema
        $website_schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            'name' => $b['name'],
            'url' => $site_url
        );

        // 4. BreadcrumbList Schema
        $breadcrumb_items = array();
        foreach ($meta['breadcrumbs'] as $idx => $crumb) {
            $breadcrumb_items[] = array(
                '@type' => 'ListItem',
                'position' => $idx + 1,
                'name' => $crumb['name'],
                'item' => $crumb['url']
            );
        }
        $breadcrumb_schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => $breadcrumb_items
        );

        // 5. FAQPage Schema for AEO
        $faq_schema = null;
        if (!empty($meta['aeo_questions'])) {
            $main_entities = array();
            foreach ($meta['aeo_questions'] as $q) {
                $main_entities[] = array(
                    '@type' => 'Question',
                    'name' => $q['question'],
                    'acceptedAnswer' => array(
                        '@type' => 'Answer',
                        'text' => $q['answer']
                    )
                );
            }
            $faq_schema = array(
                '@context' => 'https://schema.org',
                '@type' => 'FAQPage',
                'mainEntity' => $main_entities
            );
        }

        $json_flags = JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT;

        $html = '<script type="application/ld+json">' . "\n" . json_encode($org_schema, $json_flags) . "\n" . '</script>' . "\n";
        $html .= '<script type="application/ld+json">' . "\n" . json_encode($local_schema, $json_flags) . "\n" . '</script>' . "\n";
        $html .= '<script type="application/ld+json">' . "\n" . json_encode($website_schema, $json_flags) . "\n" . '</script>' . "\n";
        if (count($breadcrumb_items) > 1) {
            $html .= '<script type="application/ld+json">' . "\n" . json_encode($breadcrumb_schema, $json_flags) . "\n" . '</script>' . "\n";
        }
        if ($faq_schema) {
            $html .= '<script type="application/ld+json">' . "\n" . json_encode($faq_schema, $json_flags) . "\n" . '</script>' . "\n";
        }

        return $html;
    }
}
