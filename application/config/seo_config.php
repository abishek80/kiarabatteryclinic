<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Single Source of Truth Master SEO, AEO & GEO Configuration
|--------------------------------------------------------------------------
| Comprehensive settings for Car Battery, Bike Battery, Battery Sales & Service,
| UPS, Inverter, Inverter Battery & Emergency Doorstep Service in Coimbatore & Tamil Nadu.
*/

$config['seo'] = array(
    'site_url' => 'https://kiarabatteryclinic.com/',
    'site_name' => 'Kiara Battery Clinic',
    'site_tagline' => "Coimbatore's #1 Battery Shop, UPS & Solar Service Experts",
    'default_description' => 'Kiara Battery Clinic offers 24/7 doorstep bike battery, car battery replacement, home UPS, inverter service, industrial UPS & solar panel installation across Coimbatore, Ooty, Pollachi, Tiruppur & Kotagiri.',
    'default_keywords' => 'car battery Coimbatore, bike battery replacement, battery shop Coimbatore, home UPS inverter price, inverter battery dealer Tatabad, doorstep battery service 24/7, Kiara Battery Clinic',
    'default_og_image' => 'themes/images/logo.png',

    'business_info' => array(
        'name' => 'Kiara Battery Clinic',
        'legal_name' => 'Kiara Battery Clinic',
        'street' => '36, 9th Street, Tatabad',
        'locality' => 'Coimbatore',
        'region' => 'Tamil Nadu',
        'postal_code' => '641012',
        'country' => 'IN',
        'phone' => '+91 90038 11107',
        'phone_raw' => '+919003811107',
        'email' => 'enquiry@kiarabatteryclinic.com',
        'google_maps' => 'https://maps.app.goo.gl/U3FhHqsbEmwYwqUN8',
        'opening_hours' => 'Mo-Su 00:00-23:59',
        'price_range' => '₹₹',
        'area_served' => array('Coimbatore', 'Ooty', 'Kotagiri', 'Pollachi', 'Tiruppur', 'Tatabad', 'Gandhipuram', 'RS Puram', 'Peelamedu', 'Saravanampatti', 'Thudiyalur', 'Singanallur', 'Vadavalli'),
        'brands_offered' => array('Amaron', 'Exide', 'Okaya', 'SF Sonic', 'Luminous', 'Microtek', 'Tata Green'),
        'social' => array(
            'whatsapp' => 'https://wa.link/w646lw',
            'instagram' => 'https://www.instagram.com/kiara_battery_clinic/'
        )
    ),

    'keyword_mapping' => array(
        'car_battery' => array(
            'primary_keyword' => 'car battery replacement Coimbatore',
            'secondary_keywords' => array('car battery shop near me', 'Amaron car battery price Coimbatore', 'Exide car battery replacement', 'emergency car battery jumpstart Coimbatore'),
            'target_url' => 'services'
        ),
        'bike_battery' => array(
            'primary_keyword' => 'bike battery replacement Coimbatore',
            'secondary_keywords' => array('two wheeler battery shop near me', 'scooter battery replacement', 'Amaron bike battery price'),
            'target_url' => 'services'
        ),
        'ups_inverter' => array(
            'primary_keyword' => 'home UPS inverter service Coimbatore',
            'secondary_keywords' => array('inverter battery dealer Tatabad', 'Luminous inverter price Coimbatore', 'tubular inverter battery replacement', 'office UPS service Coimbatore'),
            'target_url' => 'services'
        ),
        'doorstep_service' => array(
            'primary_keyword' => '24/7 doorstep battery service Coimbatore',
            'secondary_keywords' => array('emergency battery replacement near me', 'car battery breakdown assistance Coimbatore', 'onsite battery installation'),
            'target_url' => 'contact-us'
        )
    ),

    'aeo_questions' => array(
        array(
            'question' => 'How long does a car battery usually last in Coimbatore climate conditions?',
            'answer' => 'A high-quality car battery (like Amaron or Exide) typically lasts 3 to 5 years in Indian climatic conditions. Extreme heat, infrequent driving, or faulty alternators can reduce lifespan. Regular voltage checks during free routine testing at Kiara Battery Clinic ensure peak health.'
        ),
        array(
            'question' => 'What is the difference between a UPS and an Inverter for home backup?',
            'answer' => 'A UPS (Uninterruptible Power Supply) provides zero-millisecond switching time, ideal for sensitive electronics like computers and medical equipment. An inverter has a slight transfer lag (10-20ms), suitable for general home appliances like fans, lights, and TVs.'
        ),
        array(
            'question' => 'Do you provide 24/7 emergency doorstep battery replacement in Coimbatore?',
            'answer' => 'Yes! Kiara Battery Clinic offers 24/7 emergency doorstep battery replacement, testing, and jumpstart services across Coimbatore (Tatabad, Gandhipuram, RS Puram, Peelamedu, Saravanampatti) as well as Ooty, Kotagiri, Pollachi, and Tiruppur.'
        ),
        array(
            'question' => 'How do I choose the correct battery for my car or bike?',
            'answer' => 'Match your vehicle model, engine capacity (cc), battery dimensions, terminal layout, and Ampere-hour (Ah) rating. Kiara Battery Clinic technicians verify vehicle compatibility before installation to guarantee proper fitment and performance.'
        )
    ),

    'pages' => array(
        'home' => array(
            'title' => 'Kiara Battery Clinic | Car & Bike Battery, UPS & Inverter Dealer Coimbatore',
            'description' => "Coimbatore's #1 battery shop. Expert car battery, bike battery replacement, home UPS, inverter, industrial UPS & solar panel installation. 24/7 doorstep service across Coimbatore, Ooty, Pollachi, Tiruppur & Kotagiri.",
            'keywords' => 'car battery Coimbatore, bike battery replacement, battery shop near me, home UPS inverter price, doorstep battery service 24/7, Kiara Battery Clinic',
            'canonical' => '',
            'og_type' => 'website',
            'schema_type' => 'AutomotiveBusiness'
        ),
        'about_us' => array(
            'title' => 'About Us | Kiara Battery Clinic - Trusted Battery & Power Experts Coimbatore',
            'description' => 'Learn about Kiara Battery Clinic, Coimbatore’s premier battery and power solutions shop. Authorized dealer for Amaron, Exide, Okaya & Luminous with 24/7 emergency doorstep fitting and solar rooftop setups.',
            'keywords' => 'about Kiara Battery Clinic, battery store Tatabad Coimbatore, trusted battery dealer Coimbatore, power solutions expert Tamil Nadu',
            'canonical' => 'about-us',
            'og_type' => 'article',
            'schema_type' => 'AboutPage'
        ),
        'services' => array(
            'title' => 'Battery Services | Car Battery, Bike Battery, Home UPS & Inverter Service Coimbatore',
            'description' => 'Explore complete power solutions: car battery replacement, bike battery fitting, home UPS installation, inverter battery sales, industrial UPS maintenance, and 24/7 doorstep emergency battery service.',
            'keywords' => 'car battery replacement Coimbatore, bike battery service, home UPS service, inverter battery dealer Tatabad, industrial UPS installation, 24/7 doorstep battery assistance',
            'canonical' => 'services',
            'og_type' => 'website',
            'schema_type' => 'Service'
        ),
        'service_detail' => array(
            'title' => 'Expert Battery & Power Services | Kiara Battery Clinic Coimbatore',
            'description' => 'Professional battery testing, doorstep replacement, UPS installation, and solar maintenance with 100% genuine products and manufacturer warranty in Coimbatore.',
            'keywords' => 'doorstep battery replacement Coimbatore, inverter battery service, solar panel fitting Tatabad',
            'canonical' => 'service',
            'og_type' => 'article',
            'schema_type' => 'Service'
        ),
        'category' => array(
            'title' => 'Battery & Power Categories | Amaron, Exide, Okaya & Luminous Coimbatore',
            'description' => 'Browse battery categories for cars, two-wheelers, heavy commercial vehicles, home UPS, solar inverters, and industrial power systems at Kiara Battery Clinic Coimbatore.',
            'keywords' => 'Amaron car battery Coimbatore, Exide bike battery dealer Tatabad, Okaya inverter battery, vehicle battery types',
            'canonical' => 'category',
            'og_type' => 'website',
            'schema_type' => 'CollectionPage'
        ),
        'products' => array(
            'title' => 'Battery Products & Price List | Car, Bike, UPS & Inverter Batteries Coimbatore',
            'description' => 'Top brand automotive batteries, inverter batteries, solar panels, and UPS systems at best prices in Coimbatore. Free installation & 24/7 doorstep delivery.',
            'keywords' => 'car battery price Coimbatore, bike battery shop near me, home UPS inverter price Tatabad, solar battery Coimbatore',
            'canonical' => 'products',
            'og_type' => 'website',
            'schema_type' => 'CollectionPage'
        ),
        'product_detail' => array(
            'title' => 'Genuine Battery Product Details | Kiara Battery Clinic Coimbatore',
            'description' => 'Buy genuine batteries with official manufacturer warranty. Doorstep delivery, installation, and old battery buyback exchange available in Coimbatore.',
            'keywords' => 'buy car battery online Coimbatore, bike battery replacement, inverter battery warranty',
            'canonical' => 'product',
            'og_type' => 'product',
            'schema_type' => 'Product'
        ),
        'testimonials' => array(
            'title' => 'Customer Reviews & Ratings | Kiara Battery Clinic Coimbatore',
            'description' => 'Read customer reviews from vehicle owners & homeowners across Coimbatore, Ooty, Pollachi, Tiruppur & Kotagiri who trust Kiara Battery Clinic for doorstep battery service & solar setups.',
            'keywords' => 'Kiara Battery Clinic reviews, customer testimonials Coimbatore battery shop, trusted inverter service ratings',
            'canonical' => 'testimonials',
            'og_type' => 'website',
            'schema_type' => 'ItemPage'
        ),
        'gallery' => array(
            'title' => 'Photo Gallery | Kiara Battery Clinic Coimbatore',
            'description' => 'Browse our gallery of car battery replacements, bike battery fittings, solar panel installations, home UPS setups, and doorstep emergency service across Coimbatore.',
            'keywords' => 'Kiara Battery Clinic gallery, battery service photos Coimbatore, solar installation photos, inverter battery setup Tatabad',
            'canonical' => 'gallery',
            'og_type' => 'website',
            'schema_type' => 'ImageGallery'
        ),
        'contact_us' => array(
            'title' => 'Contact Us | 24/7 Doorstep Battery Service Coimbatore - Kiara Battery Clinic',
            'description' => 'Need emergency battery service in Coimbatore? Call +91 90038 11107 or visit our Tatabad store. 24/7 doorstep bike/car battery jumpstart & replacement.',
            'keywords' => 'contact battery clinic Coimbatore, battery emergency phone number Coimbatore, Tatabad battery shop address, doorstep battery request',
            'canonical' => 'contact-us',
            'og_type' => 'website',
            'schema_type' => 'ContactPage'
        ),
        'privacy_policy' => array(
            'title' => 'Privacy Policy | Kiara Battery Clinic Coimbatore',
            'description' => 'Privacy Policy for Kiara Battery Clinic. Learn how we protect customer data and handle service requests.',
            'keywords' => 'privacy policy Kiara Battery Clinic',
            'canonical' => 'privacy-policy',
            'og_type' => 'website',
            'schema_type' => 'WebPage'
        ),
        'terms_and_conditions' => array(
            'title' => 'Terms and Conditions | Kiara Battery Clinic Coimbatore',
            'description' => 'Terms and conditions governing battery purchases, warranty claims, and doorstep installation services at Kiara Battery Clinic.',
            'keywords' => 'terms and conditions battery clinic, warranty policy',
            'canonical' => 'terms-and-conditions',
            'og_type' => 'website',
            'schema_type' => 'WebPage'
        ),
        'return_policy' => array(
            'title' => 'Return Policy | Kiara Battery Clinic Coimbatore',
            'description' => 'Official return and replacement policy for batteries, UPS systems, and accessories purchased at Kiara Battery Clinic Coimbatore.',
            'keywords' => 'battery return policy Coimbatore, replacement guarantee',
            'canonical' => 'return-policy',
            'og_type' => 'website',
            'schema_type' => 'WebPage'
        ),
        'refund_policy' => array(
            'title' => 'Refund Policy | Kiara Battery Clinic Coimbatore',
            'description' => 'Refund guidelines and warranty claim procedures for products and services at Kiara Battery Clinic.',
            'keywords' => 'refund policy Kiara Battery Clinic, warranty claim',
            'canonical' => 'refund-policy',
            'og_type' => 'website',
            'schema_type' => 'WebPage'
        )
    )
);
