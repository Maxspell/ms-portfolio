<?php
/**
 * Section: Hero
 *
 * @package MSPortfolio
 */

declare(strict_types=1);

defined('ABSPATH') || exit;
?>

<section class="hero" id="hero">
    <div class="container">
        <div class="hero__content">
            <div class="hero__status status-indicator">
                <span class="status-indicator__dot"></span>
                <span class="status-indicator__text"><?php esc_html_e('Доступний для нових проєктів', 'ms-portfolio'); ?></span>
            </div>

            <h1 class="hero__title">
                <?php esc_html_e('Розробка швидких та керованих сайтів для бізнесу на', 'ms-portfolio'); ?>
                <span class="hero__title-accent">WordPress & PHP</span>
                <?php esc_html_e('під ключ.', 'ms-portfolio'); ?>
            </h1>

            <p class="hero__subtitle">
                <?php esc_html_e('Без важких конструкторів. Чистий оптимізований код, сучасний дизайн та інтуїтивна панель керування для швидкого росту вашого бізнесу.', 'ms-portfolio'); ?>
            </p>

            <div class="hero__actions">
                <a href="#contact" class="btn btn--primary btn--lg">
                    <span><?php esc_html_e('Обговорити проєкт', 'ms-portfolio'); ?></span>
                    <span class="btn__icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </span>
                </a>
                <a href="#portfolio" class="btn btn--secondary btn--lg">
                    <span><?php esc_html_e('Переглянути кейси', 'ms-portfolio'); ?></span>
                </a>
                <a href="https://t.me/maxstizhko" target="_blank" rel="noopener noreferrer" class="btn btn--ghost btn--lg">
                    <span><?php esc_html_e('Написати в Telegram', 'ms-portfolio'); ?></span>
                </a>
            </div>

            <div class="hero__terminal terminal-window">
                <div class="terminal-window__header">
                    <div class="terminal-window__dots">
                        <span class="terminal-window__dot"></span>
                        <span class="terminal-window__dot"></span>
                        <span class="terminal-window__dot"></span>
                    </div>
                    <span class="terminal-window__title">DeveloperStack.php</span>
                </div>
                <div class="terminal-window__body">
                    <pre class="terminal-window__code"><span class="terminal-window__prompt">$</span> <span class="terminal-window__keyword">class</span> <span class="terminal-window__function">WordPressArchitect</span> {
    <span class="terminal-window__keyword">public const</span> <span class="terminal-window__variable">STANDARDS</span> = [<span class="terminal-window__string">'Clean OOP PHP 8.x'</span>, <span class="terminal-window__string">'Custom WP Themes'</span>, <span class="terminal-window__string">'Zero Bloat'</span>];
    <span class="terminal-window__keyword">public const</span> <span class="terminal-window__variable">PERFORMANCE</span> = <span class="terminal-window__string">'95+ PageSpeed Guarantee'</span>;
    <span class="terminal-window__keyword">public function</span> <span class="terminal-window__function">deliverValue</span>(): <span class="terminal-window__keyword">string</span> {
        <span class="terminal-window__keyword">return</span> <span class="terminal-window__string">"Scalable, maintainable, and high-converting WordPress solutions."</span>;
    }
}</pre>
                </div>
            </div>
        </div>
    </div>
</section>
