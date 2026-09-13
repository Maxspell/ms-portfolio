<?php
/**
 * Section: Contact & Lead Generation
 *
 * @package MSPortfolio
 */

declare(strict_types=1);

defined('ABSPATH') || exit;
?>

<section class="section contact-section" id="contact">
    <div class="container">
        <div class="section-heading section-heading--centered">
            <span class="section-heading__accent"></span>
            <h2 class="section-heading__title"><?php esc_html_e('Давайте обговоримо ваш проєкт', 'ms-portfolio'); ?></h2>
            <p class="section-heading__description">
                <?php esc_html_e('Опишіть ваше завдання, і я зв\'яжуся з вами протягом 2-3 годин з попередньою оцінкою та пропозиціями.', 'ms-portfolio'); ?>
            </p>
        </div>

        <div class="card-glass contact-box">
            <div class="contact-info">
                <h3 class="card-glass__title" style="margin-bottom: var(--space-4);">
                    <?php esc_html_e('Прямий зв\'язок з розробником', 'ms-portfolio'); ?>
                </h3>
                <p style="color: var(--text-secondary); margin-bottom: var(--space-6); line-height: var(--leading-body);">
                    <?php esc_html_e('Відповідаю особисто. Готовий підключитися до обговорення технічного завдання, архітектури чи оцінки вже діючого проєкту.', 'ms-portfolio'); ?>
                </p>

                <div style="display: flex; flex-direction: column; gap: var(--space-4); margin-bottom: var(--space-8);">
                    <a href="https://t.me/maxstizhko" target="_blank" rel="noopener noreferrer" class="btn btn--secondary" style="justify-content: flex-start;">
                        <span style="color: var(--accent-primary); font-weight: 700;">Telegram:</span> @maxstizhko
                    </a>
                    <a href="mailto:maxstizhko@gmail.com" class="btn btn--secondary" style="justify-content: flex-start;">
                        <span style="color: var(--accent-primary); font-weight: 700;">Email:</span> maxstizhko@gmail.com
                    </a>
                </div>

                <div class="status-indicator">
                    <span class="status-indicator__dot"></span>
                    <span class="status-indicator__text"><?php esc_html_e('Середній час відповіді: ~15 хвилин', 'ms-portfolio'); ?></span>
                </div>
            </div>

            <form class="contact-form" action="#" method="POST" novalidate>
                <div class="contact-form__response" role="alert"></div>

                <div class="form-field">
                    <label class="form-field__label" for="contact-name">
                        <?php esc_html_e('Ваше ім\'я', 'ms-portfolio'); ?> *
                    </label>
                    <input class="form-field__input" type="text" id="contact-name" name="name" placeholder="<?php esc_attr_e('Наприклад: Олександр', 'ms-portfolio'); ?>" required>
                </div>

                <div class="form-field">
                    <label class="form-field__label" for="contact-channel">
                        <?php esc_html_e('Telegram або Телефон', 'ms-portfolio'); ?> *
                    </label>
                    <input class="form-field__input" type="text" id="contact-channel" name="contact" placeholder="<?php esc_attr_e('@username або +380...', 'ms-portfolio'); ?>" required>
                </div>

                <div class="form-field">
                    <label class="form-field__label" for="contact-message">
                        <?php esc_html_e('Коротко про ваш проєкт чи завдання', 'ms-portfolio'); ?> *
                    </label>
                    <textarea class="form-field__textarea" id="contact-message" name="message" placeholder="<?php esc_attr_e('Опишіть завдання, посилання на поточний сайт або ТЗ...', 'ms-portfolio'); ?>" required></textarea>
                </div>

                <button class="btn btn--primary btn--lg" type="submit" style="width: 100%; margin-top: var(--space-2);">
                    <span><?php esc_html_e('Надіслати запит розробнику', 'ms-portfolio'); ?></span>
                    <span class="btn__icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                    </span>
                </button>
            </form>
        </div>
    </div>
</section>
