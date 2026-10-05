// Mobile menu toggle
const toggle = document.querySelector(".nav-toggle");
const menu = document.getElementById("nav-menu");
toggle.addEventListener("click", () => {
  const open = menu.classList.toggle("open");
  toggle.setAttribute("aria-expanded", open);
});
menu.querySelectorAll("a").forEach((a) =>
  a.addEventListener("click", () => {
    menu.classList.remove("open");
    toggle.setAttribute("aria-expanded", "false");
  })
);

document.getElementById("year").textContent = new Date().getFullYear();

// Show a message after contact.php redirects back with ?sent=1 or ?sent=0
const sent = new URLSearchParams(location.search).get("sent");
if (sent !== null) {
  const form = document.querySelector(".contact-form");
  const note = document.createElement("p");
  note.className = "form-status " + (sent === "1" ? "ok" : "err");
  note.setAttribute("role", "status");
  note.textContent = sent === "1"
    ? "Thank you! Your message was sent. We'll be in touch within one business day."
    : "Sorry, your message couldn't be sent. Please email or call us directly.";
  form.prepend(note);
  document.getElementById("contact").scrollIntoView();
}
