<?php
/**
 * Footer template.
 *
 * @package MSPortfolio
 */

declare(strict_types=1);

defined('ABSPATH') || exit;
?>

<footer class="footer">
    <div class="container">
        <?php get_template_part('template-parts/footer/copyright'); ?>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
