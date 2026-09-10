# AGENTS.MD: Max Stizhko — WordPress & PHP Developer Portfolio (ms-portfolio)

## 1. Обзор проекта (Project Overview)
- **Персональный бренд**: Макс Стіжко / Max Stizhko
- **Специализация**: Профессиональная разработка на WordPress & PHP (Modern Custom Themes, WooCommerce, Headless/REST API, ACF Pro, интеграции с CRM и платежными шлюзами).
- **Целевая аудитория**: Предприниматели, малый и средний бизнес (Украина, Европа, США), digital-агентства на субподряд.
- **Главный канал связи / CTA**: Прямой контакт в Telegram [@maxstizhko](https://t.me/maxstizhko) + интерактивная форма обратной связи.
- **Мультиязычность**: Двуязычный сайт (Украинский `uk` — основной, Английский `en` — международный) на базе плагина **Polylang**.
- **Визуальная концепция**: Dark Tech / Glassmorphism (глубокий темный фон `#0a0b10`, изумрудно-бирюзовые акценты `#10b981` / `#06b6d4`, плавные градиенты, полупрозрачные карточки с размытием `backdrop-filter: blur`, микро-анимации).

---

## 2. Стандарты разработки WordPress Pro (WordPress Pro Guidelines)
Проект строится по стандартам enterprise/production-уровня WordPress:
- **WordPress Coding Standards (WPCS)**: Строгое следование стандартам оформления кода PHP, безопасность (nonce-проверки, sanitization входных данных через `sanitize_text_field()`, escaping выходных данных через `esc_html()`, `esc_attr()`, `esc_url()`).
- **Zero Heavy Page Builders**: Никакого Elementor/Divi. Кастомная тема с легковесными модулями и ACF Pro Flexible Content / Gutenberg blocks.
- **Производительность**: 95+ баллов Google PageSpeed Insights (Mobile & Desktop). Чистый Vanilla JS без jQuery на фронтенде, WebP/AVIF изображения с атрибутами `loading="lazy"`, критический CSS.
- **I18n & Мультиязычность (Polylang)**:
  - Все статические строки темы регистрируются через `pll_register_string()` и выводятся через `pll__()` / `pll_e()`.
  - Меню, таксономии и CPT поддерживают связывание языковых версий в Polylang.
  - Кастомный переключатель языка (Language Switcher) в хедере с сохранением текущего URL.

---

## 3. Архитектура темы WordPress (`wp-content/themes/ms-portfolio/`)

```text
ms-portfolio/
├── acf-json/                         # Авто-синхронизация полей ACF в Git (load_json / save_json)
├── assets/
│   ├── css/
│   │   ├── variables.css             # Дизайн-токены (цвета, шрифты, отступы, тени)
│   │   ├── main.css                  # Базовые стили, сетка, typography
│   │   ├── components.css            # БЭМ-компоненты (карточки, кнопки, glassmorphism, формы)
│   │   ├── critical.css              # Критический CSS для мгновенного первого рендера (Hero)
│   │   └── animations.css            # Микро-анимации и hover-эффекты
│   ├── js/
│   │   ├── main.js                   # Инициализация, скролл, мобильное меню, аккордеоны
│   │   ├── language-switch.js        # Плавное переключение языка
│   │   └── ajax-form.js              # Отправка заявок (AJAX + Nonce + валидация)
│   ├── images/
│   │   ├── icons/                    # SVG иконки (технологии, соцсети, UI)
│   │   └── cases/                    # Превью работ и кейсов в WebP
│   └── fonts/                        # Локальные WOFF2 шрифты (GDPR compliant)
├── languages/                        # Файлы локализации (.pot, .po, .mo)
├── inc/
│   ├── setup.php                     # Регистрация меню, поддержка thumbnails, title-tag, textdomain, HTML5
│   ├── enqueue.php                   # Подключение ассетов с версионированием + wp_localize_script (nonce, ajaxUrl)
│   ├── cpt-portfolio.php             # Регистрация Custom Post Type «Кейсы / Портфолио» + таксономии
│   ├── cpt-reviews.php               # Регистрация Custom Post Type «Отзывы»
│   ├── acf-fields.php                # Конфигурация и регистрация полей ACF Pro (JSON sync)
│   ├── polylang.php                  # Регистрация строк Polylang (pll_register_string)
│   ├── telegram-bot.php              # Интеграция с Telegram Bot API (wp_remote_post, лиды)
│   └── ajax-handlers.php             # Обработка формы: sanitization, nonce check, Telegram + Email
├── template-parts/
│   ├── header/
│   │   ├── nav.php                   # Основное меню
│   │   └── lang-switcher.php         # Переключатель UK / EN
│   ├── sections/
│   │   ├── hero.php                  # Главный экран с УТП и CTA
│   │   ├── trust-bar.php             # Цифры и ключевые показатели
│   │   ├── portfolio.php             # Сетка кейсов с фильтрацией
│   │   ├── services.php              # Услуги и специфика разработки
│   │   ├── stack.php                 # Стек технологий и инструментов
│   │   ├── workflow.php              # 5 этапов работы над проектом
│   │   ├── why-me.php                # Преимущества (чистый код vs конструкторы)
│   │   ├── reviews.php               # Отзывы клиентов
│   │   ├── faq.php                   # Часто задаваемые вопросы (аккордеон)
│   │   └── contact.php               # Форма заявки + быстрый переход в Telegram
│   └── footer/
│       └── copyright.php             # Подвал сайта
├── 404.php                           # Шаблон страницы 404 Not Found
├── archive-portfolio.php             # Шаблон архива кейсов портфолио
├── footer.php                        # Подвал темы (wp_footer)
├── functions.php                     # Точка входа: загрузка модулей из /inc/
├── header.php                        # Шапка темы (wp_head)
├── index.php                         # Обязательный fallback-шаблон WordPress
├── front-page.php                    # Главный шаблон посадочной страницы
├── single-portfolio.php              # Шаблон подробного кейса
└── style.css                         # Метаданные темы WordPress, Text Domain: ms-portfolio
```

---

## 4. Контент и секции лендинга (UA / EN)

### 4.1. Header (Шапка)
- **Логотип / Имя**: Макс Стіжко / Max Stizhko (`PHP & WordPress Developer`).
- **Навигация**: Кейси (Projects), Послуги (Services), Процес (Workflow), Відгуки (Reviews), Контакти (Contact).
- **Индикатор доступности**: `🟢 Доступний для нових проєктів` / `🟢 Available for new projects`.
- **Language Switcher**: Переключатель языков `UA | EN`.
- **CTA кнопка**: «Обговорити проєкт» / «Let's Talk» (быстрый переход к контактам).

### 4.2. Hero Section (Главный экран)
- **Заголовок (H1)**:
  - *UA*: Розробка швидких та керованих сайтів для бізнесу на WordPress & PHP під ключ.
  - *EN*: Custom WordPress & PHP Development for Growing Businesses.
- **Подзаголовок**:
  - *UA*: Без важких конструкторів. Чистий оптимізований код, сучасний дизайн та інтуїтивна панель керування.
  - *EN*: High-performance custom themes, zero bloat, tailored admin experience, and 95+ PageSpeed scores.
- **Кнопки действий**:
  - «Переглянути кейси» / «View Projects» (скролл к портфолио).
  - «Написати в Telegram» / «Message on Telegram» (прямой диалог [@maxstizhko](https://t.me/maxstizhko)).

### 4.3. Trust Bar (Показатели)
- **95+** — Google PageSpeed score (Mobile & Desktop).
- **100%** — Дотримання термінів за договором / On-time project delivery.
- **0%** — Конструкторів / No heavy page builders.
- **Гарантія** — Гарантійна підтримка коду / Ongoing maintenance & warranty.

### 4.4. Portfolio (Кейсы)
- 3–5 избранных проектов.
- Для каждого проекта: скриншот в интерфейсе макапа, название, ниша, решенная задача, технологии (ACF, WooCommerce, REST API), ссылка на сайт / демо.

### 4.5. Services (Услуги)
1. **Сайти для бізнесу під ключ** (Landing page, корпоративні сайти з кастомною посадкою на WP).
2. **E-commerce на WooCommerce** (Кастомні інтернет-магазини з платіжними шлюзами та інтеграцією доставок).
3. **Кастомний бекенд на PHP** (Розробка модулів, плагінів, робота з WP REST API та сторонніми API).
4. **Оптимізація та редизайн** (Прискорення повільних сайтів, переверстка старих тем на чистий код).

### 4.6. Tech Stack (Стек)
- Core: PHP 8.x, WordPress, MySQL, Vanilla JavaScript (ES6+), HTML5, CSS3 / Modern CSS.
- WP Ecosystem: ACF Pro, WooCommerce, Polylang, Gutenberg Blocks, WP CLI.
- Tools & Deploy: Git, Webpack / Vite, Composer, REST API, cURL, Telegram Bot API.

### 4.7. Workflow (Этапы сотрудничества)
1. **Аналіз & ТЗ**: Фіксація вимог, структури та підсумкового кошторису.
2. **Дизайн & Верстка**: Адаптивний інтерфейс із фокусом на UX та швидкість.
3. **Кастомна посадка на WP**: Налаштування полів ACF та зручного редагування.
4. **Тестування & SEO**: Перевірка безпеки, валідація коду, адаптивність та швидкість.
5. **Запуск & Інструкція**: Перенесення на хостинг, відео-інструкція по керуванню сайтом.

### 4.8. Why Me (Преимущества чистого кода)
- **Чистий код проти Elementor**: відсутність зайвого сміття у DOM, миттєва генерація сторінок на сервері.
- **Повна безпека**: відсутність дір від десятків непотрібних плагінів.
- **Пряма комунікація**: прямий зв'язок з розробником без посередників і спотворень.

### 4.9. Reviews & FAQ (Отзывы и Вопросы)
- Блок отзывов с фото клиентов и ссылками на проекты.
- Интерактивный аккордеон с ответами на вопросы (сроки, этапы оплаты, выбор хостинга).

### 4.10. Contact / CTA (Контакты и Лидогенерация)
- Форма: Имя, Telegram / Телефон, Кратко о проекте.
- Интеграция: Мгновенное сообщение ботом в личку Telegram [@maxstizhko](https://t.me/maxstizhko).
- Прямые контакты: Telegram, WhatsApp, Email.

---

## 5. Инструкции для разработчиков и AI-агентов (Pro Workflow)
1. **Безопасность & PHP Стандарты**:
   - Каждый файл PHP в теме должен начинаться с `declare(strict_types=1);` и проверки `defined('ABSPATH') || exit;`.
   - Использовать единый префикс функций темы (`ms_portfolio_`) или namespace `MSPortfolio`.
   - Любой AJAX-запрос обязан проверять `check_ajax_referer()` / `wp_verify_nonce()`.
   - Все входящие поля формы валидируются через `sanitize_text_field()` / `sanitize_textarea_field()` перед отправкой в Telegram Bot API / Email.
   - Любой вывод в шаблонах обязан экранироваться (`esc_html()`, `esc_attr()`, `esc_url()`, `wp_kses_post()`).
2. **Локализация и Polylang Compatibility**:
   - Тема поддерживает стандартную локализацию через `load_theme_textdomain('ms-portfolio', get_template_directory() . '/languages');`.
   - Для всех статичных строк темы использовать функции с text-domain: `esc_html__('Text', 'ms-portfolio')`.
   - Для динамических строк и контента админки регистрировать строки в Polylang: `pll_register_string('ms-portfolio', 'Строка', 'Theme')`.
   - При выводе дат, ссылок и текущего языка использовать `pll_current_language()`, `pll_home_url()`.
   - В ACF Pro настраивать синхронизацию через `acf-json/` (`acf/settings/save_json`, `acf/settings/load_json`).
3. **Фронтенд, CSS (БЭМ) & Скрипты**:
   - Никаких inline-стилей в разметке.
   - Использовать CSS Custom Properties для дизайн-токенов (`--bg-primary`, `--accent-color`, `--card-bg`, etc.).
   - Именовать классы строго по методологии **БЭМ** (`.portfolio-card`, `.portfolio-card__title`, `.portfolio-card--featured`).
   - Передавать `ajaxUrl`, `nonce` и строки локализации формы в JS через `wp_localize_script('ms-portfolio-ajax', 'msPortfolioData', [...])`.
   - Модульный Vanilla JS (ES6+) без библиотек и без загрязнения глобальной области видимости `window`.
