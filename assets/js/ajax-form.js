/**
 * AJAX Form Submission Handler — ms-portfolio
 * Handles form validation, AJAX dispatch, and visual feedback.
 */

document.addEventListener('DOMContentLoaded', () => {
  'use strict';

  const form = document.querySelector('.contact-form');
  if (!form) return;

  const submitBtn = form.querySelector('button[type="submit"]');
  const responseBox = form.querySelector('.contact-form__response');

  form.addEventListener('submit', async (e) => {
    e.preventDefault();

    if (!window.msPortfolioData) {
      console.error('msPortfolioData is not localized.');
      return;
    }

    const formData = new FormData(form);
    formData.append('action', 'ms_portfolio_submit_contact');
    formData.append('nonce', window.msPortfolioData.nonce);

    // Visual loading state
    const originalBtnHtml = submitBtn ? submitBtn.innerHTML : '';
    if (submitBtn) {
      submitBtn.disabled = true;
      submitBtn.innerHTML = `<span>${window.msPortfolioData.i18n.sending}</span>`;
    }

    if (responseBox) {
      responseBox.textContent = '';
      responseBox.className = 'contact-form__response';
    }

    try {
      const response = await fetch(window.msPortfolioData.ajaxUrl, {
        method: 'POST',
        body: formData,
      });

      const result = await response.json();

      if (result.success) {
        form.reset();
        if (responseBox) {
          responseBox.textContent = result.data.message || window.msPortfolioData.i18n.success;
          responseBox.classList.add('contact-form__response--success');
        }
      } else {
        if (responseBox) {
          responseBox.textContent = (result.data && result.data.message)
            ? result.data.message
            : window.msPortfolioData.i18n.error;
          responseBox.classList.add('contact-form__response--error');
        }
      }
    } catch (err) {
      console.error('AJAX form error:', err);
      if (responseBox) {
        responseBox.textContent = window.msPortfolioData.i18n.networkError;
        responseBox.classList.add('contact-form__response--error');
      }
    } finally {
      if (submitBtn) {
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalBtnHtml;
      }
    }
  });
});
