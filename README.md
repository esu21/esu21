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

## Upload to Hostinger
1. hPanel → **Websites** → your site → **File Manager** → `public_html`.
2. Delete the default `default.php` / `index.php` if present.
3. Upload all `.html` files, `styles.css`, `script.js`, `contact.php`, and the `assets` folder.

Optional: hPanel → **Advanced → Git** can deploy this repository to `public_html` automatically.
