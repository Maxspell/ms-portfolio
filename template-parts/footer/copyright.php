<?php
/**
 * Footer Copyright Template Part.
 *
 * @package MSPortfolio
 */

declare(strict_types=1);

defined('ABSPATH') || exit;
?>

<div class="footer__inner">
    <div class="footer__brand">
        <p class="footer__copy">
            &copy; <?php echo esc_html(date('Y')); ?> Макс Стіжко. <?php esc_html_e('WordPress & PHP Розробник. Усі права захищено.', 'ms-portfolio'); ?>
        </p>
    </div>

    <div class="footer__links">
        <a href="https://t.me/maxstizhko" target="_blank" rel="noopener noreferrer" class="badge badge--outline">
            Telegram: @maxstizhko
        </a>
        <a href="https://github.com/Maxspell" target="_blank" rel="noopener noreferrer" class="badge badge--outline">
            GitHub
        </a>
    </div>
</div>
