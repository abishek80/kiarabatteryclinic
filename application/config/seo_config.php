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
    'default_description' => 'Kiara Battery Clinic - 6+ years of experience - offers doorstep bike battery, car battery replacement, home UPS, inverter service, industrial UPS & solar panel installation across Coimbatore, Ooty, Pollachi, Tiruppur & Kotagiri. Service hours: Mon-Sat, 9AM-10PM.',
    'default_keywords' => 'car battery Coimbatore, bike battery replacement, battery shop Coimbatore, home UPS inverter price, inverter battery dealer Tatabad, doorstep battery service Coimbatore, Kiara Battery Clinic',
    'default_og_image' => 'themes/images/og-share-banner.jpg',

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
        'email' => 'kiarabatteryclinic@gmail.com',
        'google_maps' => 'https://maps.app.goo.gl/ttQckMunQZZrcVq66',
        'opening_hours' => 'Mo-Sa 09:00-22:00',
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
        'jump_starter' => array(
            'primary_keyword' => 'jump starter service Coimbatore',
            'secondary_keywords' => array('car jump start near me', 'bike battery jump start Coimbatore', 'roadside battery assistance Coimbatore', 'dead battery help Coimbatore', 'battery jumpstart Tatabad'),
            'target_url' => 'service/jump-starter-service'
        ),
        'genset_battery' => array(
            'primary_keyword' => 'genset battery service Coimbatore',
            'secondary_keywords' => array('generator battery replacement Coimbatore', 'genset battery initialization', 'generator battery jump start', 'DG set battery maintenance Coimbatore', 'standby generator battery service'),
            'target_url' => 'service/genset-battery-service'
        ),
        'lithium_ion_battery' => array(
            'primary_keyword' => 'lithium-ion battery service Coimbatore',
            'secondary_keywords' => array('lithium battery maintenance Coimbatore', 'BMS diagnostics Coimbatore', 'EV battery service Coimbatore', 'lithium-ion battery initialization', 'energy storage battery service'),
            'target_url' => 'service/lithium-ion-battery-service'
        ),
        'doorstep_service' => array(
            'primary_keyword' => 'doorstep battery service Coimbatore',
            'secondary_keywords' => array('emergency battery replacement near me', 'car battery breakdown assistance Coimbatore', 'onsite battery installation'),
            'target_url' => 'contact-us'
        )
    ),

    'aeo_questions' => array(
        array(
            'question' => 'Do you provide lithium-ion battery initialization, service and maintenance in Coimbatore?',
            'answer' => 'Yes. Kiara Battery Clinic provides lithium-ion battery initialization, condition checks, connector inspection, BMS diagnostics and charging system checks for electric vehicles, commercial equipment and compatible energy storage systems in Coimbatore, Monday to Saturday, 9AM to 10PM, following the battery manufacturer specifications. Call or WhatsApp +91 90038 11107 with the battery make, model, voltage and application.'
        ),
        array(
            'question' => 'Do you provide genset battery service and jump-start for generators in Coimbatore?',
            'answer' => 'Yes. Kiara Battery Clinic provides genset battery initialization, maintenance, terminal inspection and jump-start assistance for compatible generators in offices, commercial buildings, industrial units and homes across Coimbatore, Monday to Saturday, 9AM to 10PM. Share your genset make, model and battery details when you call or WhatsApp +91 90038 11107.'
        ),
        array(
            'question' => 'Do you provide jump starter service for cars and bikes in Coimbatore?',
            'answer' => 'Yes. Kiara Battery Clinic provides jump starter service for compatible cars and bikes across Coimbatore (Tatabad, Gandhipuram, RS Puram, Peelamedu, Saravanampatti), with coverage on request in Ooty, Kotagiri, Pollachi and Tiruppur. Service hours are Monday to Saturday, 9AM to 10PM. Call or WhatsApp +91 90038 11107; a technician typically arrives within 30-60 minutes within Coimbatore city.'
        ),
        array(
            'question' => 'How long does a car battery usually last in Coimbatore climate conditions?',
            'answer' => 'A high-quality car battery (like Amaron or Exide) typically lasts 3 to 5 years in Indian climatic conditions. Extreme heat, infrequent driving, or faulty alternators can reduce lifespan. Regular voltage checks during free routine testing at Kiara Battery Clinic ensure peak health.'
        ),
        array(
            'question' => 'What is the difference between a UPS and an Inverter for home backup?',
            'answer' => 'A UPS (Uninterruptible Power Supply) provides zero-millisecond switching time, ideal for sensitive electronics like computers and medical equipment. An inverter has a slight transfer lag (10-20ms), suitable for general home appliances like fans, lights, and TVs. Kiara Battery Clinic stocks Luminous and Microtek UPS and inverter systems to match your home or office backup needs.'
        ),
        array(
            'question' => 'Do you provide emergency doorstep battery replacement in Coimbatore?',
            'answer' => 'Yes! Kiara Battery Clinic offers doorstep battery replacement, testing, and jumpstart services Monday to Saturday, 9AM to 10PM across Coimbatore (Tatabad, Gandhipuram, RS Puram, Peelamedu, Saravanampatti) as well as Ooty, Kotagiri, Pollachi, and Tiruppur. For emergency calls within Coimbatore city during service hours, a technician typically arrives within 30-60 minutes of your call or WhatsApp message.'
        ),
        array(
            'question' => 'How do I choose the correct battery for my car or bike?',
            'answer' => 'Match your vehicle model, engine capacity (cc), battery dimensions, terminal layout, and Ampere-hour (Ah) rating. Kiara Battery Clinic technicians verify vehicle compatibility before installation to guarantee proper fitment and performance. We stock genuine Amaron, Exide, Okaya, SF Sonic and Tata Green batteries, with free doorstep consultation to confirm the right match before you buy.'
        )
    ),

    // Per-service overrides keyed by service token; any of title / description / keywords.
    'service_seo' => array(
        'jump-starter-service' => array(
            'title' => 'Jump Starter Service for Cars & Bikes | Roadside Assistance',
            'description' => 'Need a jump starter service for your car or bike? Get help with discharged vehicle batteries and check roadside jump-start assistance in your area.',
            'keywords' => 'Jump starter service, Car jump start service, Bike jump start service, Vehicle battery jump start, Roadside battery assistance, Dead car battery assistance, Jump start service near me'
        ),
        'genset-battery-service' => array(
            'title' => 'Genset Battery Service, Initialization & Jump Start',
            'description' => 'Get genset battery initialization, generator battery maintenance, and jump-start assistance. Support reliable generator starting with professional battery care.',
            'keywords' => 'Genset battery service, Genset battery initialization, Generator battery maintenance, Generator battery jump start, Diesel generator battery service, Generator starting battery, Genset battery troubleshooting, Generator battery inspection'
        ),
        'lithium-ion-battery-service' => array(
            'title' => 'Lithium-Ion Battery Service, Initialization & Maintenance',
            'description' => 'Get lithium-ion battery initialization, diagnostics, servicing, and maintenance. Support battery reliability with appropriate inspections and preventive care.',
            'keywords' => 'Lithium-ion battery service, Lithium-ion battery initialization, Lithium battery maintenance, Lithium battery diagnostics, Battery management system (BMS) service, Lithium-ion battery inspection, Lithium battery servicing, Rechargeable battery maintenance'
        )
    ),

    'pages' => array(
        'home' => array(
            'title' => 'Kiara Battery Clinic | Car & Bike Battery, UPS & Inverter Dealer Coimbatore',
            'description' => "Coimbatore's #1 battery shop with 6+ years of experience. Expert car battery, bike battery replacement, home UPS, inverter, industrial UPS & solar panel installation. Doorstep service across Coimbatore, Ooty, Pollachi, Tiruppur & Kotagiri. Open Mon-Sat, 9AM-10PM.",
            'keywords' => 'car battery Coimbatore, bike battery replacement, battery shop near me, home UPS inverter price, doorstep battery service Coimbatore, Kiara Battery Clinic',
            'canonical' => '',
            'og_type' => 'website',
            'schema_type' => 'AutomotiveBusiness'
        ),
        'about_us' => array(
            'title' => 'About Us | Kiara Battery Clinic - Trusted Battery & Power Experts Coimbatore',
            'description' => 'Learn about Kiara Battery Clinic, Coimbatore’s premier battery and power solutions shop with 6+ years of experience. Authorized dealer for Amaron, Exide, Okaya & Luminous with doorstep fitting (Mon-Sat, 9AM-10PM) and solar rooftop setups.',
            'keywords' => 'about Kiara Battery Clinic, battery store Tatabad Coimbatore, trusted battery dealer Coimbatore, power solutions expert Tamil Nadu',
            'canonical' => 'about-us',
            'og_type' => 'article',
            'schema_type' => 'AboutPage'
        ),
        'services' => array(
            'title' => 'Battery Services | Car Battery, Bike Battery, Home UPS & Inverter Service Coimbatore',
            'description' => 'Explore complete power solutions from a team with 6+ years of experience: car battery replacement, bike battery fitting, home UPS installation, inverter battery sales, industrial UPS maintenance, and doorstep emergency battery service (Mon-Sat, 9AM-10PM).',
            'keywords' => 'car battery replacement Coimbatore, bike battery service, home UPS service, inverter battery dealer Tatabad, industrial UPS installation, doorstep battery assistance',
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
            'title' => 'Contact Us | Doorstep Battery Service Coimbatore - Kiara Battery Clinic',
            'description' => 'Need emergency battery service in Coimbatore from a team with 6+ years of experience? Call +91 90038 11107 or visit our Tatabad store. Mon-Sat, 9AM-10PM doorstep bike/car battery jumpstart & replacement.',
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
