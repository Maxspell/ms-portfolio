<?php
/**
 * Front Page Template (Landing Page)
 *
 * @package MSPortfolio
 */

declare(strict_types=1);

defined('ABSPATH') || exit;

get_header();
?>

<main id="primary" class="site-main">
    <?php
    // 1. Hero Section
    get_template_part('template-parts/sections/hero');

    // 2. Trust Bar (KPIs & Metrics)
    get_template_part('template-parts/sections/trust-bar');

    // 3. Portfolio Cases
    get_template_part('template-parts/sections/portfolio');

    // 4. Services
    get_template_part('template-parts/sections/services');

    // 5. Tech Stack & Skills
    get_template_part('template-parts/sections/stack');

    // 6. Workflow Process
    get_template_part('template-parts/sections/workflow');

    // 7. Why Me (Clean Code vs Page Builders)
    get_template_part('template-parts/sections/why-me');

    // 8. Client Reviews
    get_template_part('template-parts/sections/reviews');

    // 9. FAQ Accordion
    get_template_part('template-parts/sections/faq');

    // 10. Contact Form & Direct Messenger
    get_template_part('template-parts/sections/contact');
    ?>
</main>

<?php
get_footer();
