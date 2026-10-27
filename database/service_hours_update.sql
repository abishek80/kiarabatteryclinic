-- Service hours changed from 24/7 to Monday to Saturday, 9AM to 10PM.
-- Run once on every environment (local + live). Row tokens/URLs are unchanged.
SET NAMES utf8mb4;

-- FAQs
UPDATE `faq` SET
  `title` = 'Do you provide doorstep car & bike battery service in Coimbatore?',
  `description` = 'Yes, Kiara Battery Clinic provides emergency doorstep battery replacement, jumpstart, and battery health testing Monday to Saturday, 9AM to 10PM across Coimbatore (Tatabad, RS Puram, Gandhipuram, Peelamedu, Saravanampatti) as well as Ooty, Pollachi, and Tiruppur.'
WHERE `id` = 1;

UPDATE `faq` SET
  `description` = 'Kiara Battery Clinic specializes exclusively in battery and power backup solutions. We offer computerized battery testing, 100% genuine factory-fresh stock, transparent pricing, and dedicated doorstep assistance Monday to Saturday, 9AM to 10PM.'
WHERE `id` = 6;

UPDATE `faq` SET
  `title` = 'What are your service hours in Tatabad, Coimbatore?',
  `description` = 'Our service hours are Monday to Saturday, 9AM to 10PM. Our phone lines, doorstep service and breakdown assistance operate during these hours.'
WHERE `id` = 18;

-- Gallery
UPDATE `gallery` SET `gallery_name` = 'Car Battery Doorstep Replacement' WHERE `id` = 2;

-- Services
UPDATE `service` SET
  `card2_description` = 'Scheduled quarterly health checks, battery impedance testing, and priority breakdown assistance (Monday to Saturday, 9AM to 10PM) under custom AMC plans.',
  `process_steps` = REPLACE(`process_steps`, 'Annual Maintenance Contract (AMC) onboarding and 24/7 support.', 'Annual Maintenance Contract (AMC) onboarding and support (Monday to Saturday, 9AM to 10PM).')
WHERE `id` = 4;

UPDATE `service` SET
  `service_name` = 'Support & Complete Follow-Up',
  `short_description` = 'Our customer support team is available Monday to Saturday, 9AM to 10PM. After every installation, we follow up to ensure everything is working perfectly - because your satisfaction matters most.',
  `description` = 'Dedicated emergency helpline and post-installation customer follow-up, Monday to Saturday, 9AM to 10PM. We assist with warranty claims, maintenance reminders, and technical support.',
  `card1_title` = 'Emergency Support Line',
  `card1_description` = 'Call +91 90038 11107 Monday to Saturday, 9AM to 10PM for emergency breakdown assistance.',
  `process_steps` = REPLACE(`process_steps`, '24/7 customer helpline support.', 'Customer helpline support (Monday to Saturday, 9AM to 10PM).'),
  `faqs` = '[{"question":"How do I claim battery warranty if an issue occurs?","answer":"Simply call our support number with your invoice\\/warranty code. We provide on-site warranty inspection and hassle-free replacement."},{"question":"What are your support hours?","answer":"Our emergency call desk and mobile support team operate Monday to Saturday, 9AM to 10PM."}]'
WHERE `id` = 9;
