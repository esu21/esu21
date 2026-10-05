// Mobile menu toggle
const toggle = document.querySelector(".nav-toggle");
const menu = document.getElementById("nav-menu");
toggle.addEventListener("click", () => {
  const open = menu.classList.toggle("open");
  toggle.setAttribute("aria-expanded", open);
});
document.addEventListener("keydown", (e) => {
  if (e.key === "Escape" && menu.classList.contains("open")) {
    menu.classList.remove("open");
    toggle.setAttribute("aria-expanded", "false");
    toggle.focus();
  }
});

document.querySelectorAll(".year").forEach((el) => (el.textContent = new Date().getFullYear()));

// Show a message after contact.php redirects back with ?sent=1 or ?sent=0
const form = document.querySelector(".contact-form");
const sent = new URLSearchParams(location.search).get("sent");
if (form && sent !== null) {
  const note = document.createElement("p");
  note.className = "form-status " + (sent === "1" ? "ok" : "err");
  note.setAttribute("role", "status");
  note.setAttribute("tabindex", "-1");
  note.textContent = sent === "1"
    ? "Thank you! Your request was sent. We will contact you within one business day to schedule your free consultation."
    : "Sorry, your request could not be sent. Please call 720-453-6187 or email Info@MRDBenefitsConsulting.com.";
  form.prepend(note);
  note.focus();
}
