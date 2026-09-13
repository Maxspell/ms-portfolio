/**
 * Main JavaScript Controller — ms-portfolio
 * Vanilla ES6+ without jQuery.
 */

document.addEventListener('DOMContentLoaded', () => {
  'use strict';

  // 1. Mobile Menu Toggle
  const menuToggle = document.querySelector('.header__toggle');
  const mainNav = document.querySelector('.header__nav');

  if (menuToggle && mainNav) {
    menuToggle.addEventListener('click', () => {
      const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
      menuToggle.setAttribute('aria-expanded', String(!isExpanded));
      menuToggle.classList.toggle('header__toggle--active');
      mainNav.classList.toggle('header__nav--open');
      document.body.classList.toggle('no-scroll', !isExpanded);
    });

    // Close menu when clicking on nav links
    mainNav.querySelectorAll('a').forEach(link => {
      link.addEventListener('click', () => {
        menuToggle.setAttribute('aria-expanded', 'false');
        menuToggle.classList.remove('header__toggle--active');
        mainNav.classList.remove('header__nav--open');
        document.body.classList.remove('no-scroll');
      });
    });
  }

  // 2. FAQ Accordion
  const faqItems = document.querySelectorAll('.faq-item');
  faqItems.forEach(item => {
    const trigger = item.querySelector('.faq-item__trigger');
    const content = item.querySelector('.faq-item__content');

    if (trigger && content) {
      trigger.addEventListener('click', () => {
        const isOpen = item.classList.contains('faq-item--open');

        // Close other items
        faqItems.forEach(otherItem => {
          if (otherItem !== item) {
            otherItem.classList.remove('faq-item--open');
            const otherBtn = otherItem.querySelector('.faq-item__trigger');
            if (otherBtn) otherBtn.setAttribute('aria-expanded', 'false');
          }
        });

        // Toggle current item
        item.classList.toggle('faq-item--open', !isOpen);
        trigger.setAttribute('aria-expanded', String(!isOpen));
      });
    }
  });

  // 3. Header Glass Scroll Blur Effect
  const header = document.querySelector('.header');
  if (header) {
    window.addEventListener('scroll', () => {
      if (window.scrollY > 40) {
        header.classList.add('header--scrolled');
      } else {
        header.classList.remove('header--scrolled');
      }
    }, { passive: true });
  }
});
