# MRD Benefits Consulting website

Static website for **MRDBenefitsConsulting.com**, hosted on Hostinger. Content follows the
*MRD Benefits Consulting Business Plan 2027*.

## Pages
| File | Content |
| --- | --- |
| `index.html` | Home: who we help, featured sessions, age-55 preparation, how it works |
| `services.html` | All seven services with price, length, deliverables, deposits, exclusions; Community Access Program; workshops |
| `about.html` | Founder bio, values, vision, service area |
| `resources.html` | Official SSA/Medicare/SHIP links and plain-language Medicare terms (dated) |
| `policies.html` | Full disclaimers, privacy, cancellation/refund, accessibility |
| `contact.html` + `contact.php` | Free-consultation request form (emails Info@MRDBenefitsConsulting.com) |

Shared files: `styles.css`, `script.js`, `assets/favicon.svg`.

## Before going live
1. Create the mailbox `Info@MRDBenefitsConsulting.com` in Hostinger (hPanel → Emails) so the form can deliver.
2. Once Microsoft Bookings is set up, change the "Request a Free Consultation" buttons to the Bookings link.
3. Per the plan, Medicare education should be promoted only after the legal scope review. Until then you may
   want to remove the Medicare sessions from `services.html`, `index.html`, and the contact form list.
4. Update the "Last reviewed" date on `resources.html` whenever you re-check it.
5. Test every page with JAWS and keyboard only.

## Deploy to Hostinger

### Automatic (hPanel Git, recommended)
Every push to the deployed branch updates the live site.

1. **Empty `public_html` first.** hPanel → **Websites** → *MRDBenefitsConsulting.com* → **Dashboard** →
   **File Manager** → `public_html`, then delete everything in it (e.g. `default.php`). Git deployment
   only works into an empty folder.
2. hPanel → **Websites** → *MRDBenefitsConsulting.com* → **Advanced → Git** → **Create a New Repository**:
   - **Repository:** `https://github.com/esu21/esu21.git` (public, so no SSH key is needed)
   - **Branch:** `claude/focused-johnson-db8qgp` (or `main` once one exists)
   - **Directory:** leave blank (deploys to `public_html`)
   - Click **Create**, then **Deploy** once to pull the site.
3. Turn on auto-deployment: in the same Git page, click **Auto Deployment** and copy the **Webhook URL**.
4. On GitHub: **github.com/esu21/esu21 → Settings → Webhooks → Add webhook**
   - **Payload URL:** the webhook URL from step 3
   - **Content type:** `application/x-www-form-urlencoded` (default)
   - **Events:** *Just the push event* → **Add webhook**
5. Check it: visit the site, then push a small change and confirm it appears within a minute.
   Also confirm `https://MRDBenefitsConsulting.com/.git/config`, `/README.md` and `/CLAUDE.md` return "Not Found"
   (`.htaccess` blocks them).
6. Recommended: hPanel → **Security → SSL** → make sure SSL is active and turn on **Force HTTPS**.

If the site ever stops updating, open **Advanced → Git** and click **Deploy** manually; the deployment
log there shows any error.

### Manual
1. hPanel → **Websites** → your site → **File Manager** → `public_html`.
2. Delete the default `default.php` / `index.php` if present.
3. Upload all `.html` files, `styles.css`, `script.js`, `contact.php`, `.htaccess`, and the `assets` folder.
