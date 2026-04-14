const items = document.querySelectorAll(".nav ul li");
const nav = document.querySelector(".nav ul");

function move(el) {
    const rect = el.getBoundingClientRect();
    const parent = nav.getBoundingClientRect();

    nav.style.setProperty("--x", (rect.left - parent.left) + "px");
    nav.style.setProperty("--w", rect.width + "px");
}

// default active
move(document.querySelector(".active"));

items.forEach(item => {

    // ❌ REMOVE hover movement completely

    item.addEventListener("click", () => {
        document.querySelector(".active")?.classList.remove("active");
        item.classList.add("active");

        move(item);
    });
});

// keep line on active only
nav.addEventListener("mouseleave", () => {
    move(document.querySelector(".active"));
});