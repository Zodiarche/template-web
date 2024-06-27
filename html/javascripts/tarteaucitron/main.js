import { recaptchaFallback } from "./services.js";

/**
 * @module TarteAuCitron/Main
 */

tarteaucitron.init({
  privacyUrl: "",
  hashtag: "#tarteaucitron",
  cookieName: "tarteaucitron",
  orientation: "bottom",
  showAlertSmall: false,
  cookieslist: true,
  adblocker: false,
  AcceptAllCta: true,
  highPrivacy: true,
  handleBrowserDNTRequest: false,
  removeCredit: true,
});

(tarteaucitron.job = tarteaucitron.job || []).push("recaptcha");
(tarteaucitron.job = tarteaucitron.job || []).push("gtag");
tarteaucitron.user.gtagUa = "G-38C4MGRZSQ";

/**
 * Hook lorsque la bannière de TAC est chargée
 */
const onTACLoaded = () => {
  recaptchaFallback();
};

/**
 * Vérifie si la bannière de TAC est chargée
 * @returns {boolean} - Retourne true si la bannière est chargée, sinon false
 */
const checkTACLoaded = () => {
  const banner = document.querySelector("#tarteaucitronRoot");
  if (!banner) return false;

  onTACLoaded();

  return true;
};

/**
 * MutationObserver pour surveiller les changements dans le DOM
 * @param {MutationRecord[]} mutations - Liste des mutations observées
 */
const observer = new MutationObserver((mutations) => {
  mutations.forEach((mutation) => {
    if (mutation.addedNodes.length <= 0) return;
    if (!checkTACLoaded()) return;

    observer.disconnect();
  });
});

observer.observe(document.body, { childList: true });
