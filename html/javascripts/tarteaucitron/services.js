/**
 * @module TarteAuCitron/Services
 */

/**
 * Fonction appelée lorsque le cookie n'a pas encore été accepté.
 */
export const recaptchaFallback = () => {
  const recaptchaContainer = document.getElementById("recaptcha-container");
  const recaptchaContent = document.querySelector(".tac_float");
  const submitButton = document.getElementById("contact-submit");
  if (!recaptchaContainer && !recaptchaContent && !submitButton) return;

  submitButton.disabled = true;

  const recaptchaText = recaptchaContent?.childNodes[0];
  const recaptchaButton = recaptchaContent?.childNodes[1];
  if (!recaptchaText && !recaptchaButton) return;

  recaptchaText.textContent =
    "Afin de soumettre de pouvoir soumettre votre formulaire, veuillez accepter les cookies en rapport à reCAPTCHA.";
  recaptchaButton.textContent = "Autoriser reCAPTCHA";
};
