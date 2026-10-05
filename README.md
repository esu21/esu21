# MRD Benefits Consulting website

Static one-page site for **MRDBenefitsConsulting.com**, hosted on Hostinger.

## Files
- `index.html` – page content
- `styles.css` – design
- `script.js` – mobile menu + form messages
- `contact.php` – emails contact form submissions (runs on Hostinger's PHP)
- `assets/favicon.svg` – logo / browser icon

## Before going live
1. Replace the placeholder phone number in `index.html` (search for `TODO`).
2. Create the mailbox `info@mrdbenefitsconsulting.com` in Hostinger (Emails), or change the address in `index.html` and `contact.php`.
3. Edit services, About text, and FAQ to match what you actually offer.

## Upload to Hostinger
1. hPanel → **Websites** → your site → **File Manager**.
2. Open `public_html`, delete the default `default.php`/`index.php` if present.
3. Upload `index.html`, `styles.css`, `script.js`, `contact.php`, and the `assets` folder.
4. Visit https://mrdbenefitsconsulting.com (DNS can take a few hours after registration).

Optional: in hPanel → **Advanced → Git**, connect this GitHub repo to `public_html` so updates deploy automatically.
