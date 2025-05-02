document.addEventListener("DOMContentLoaded", () => {
    const html = document.documentElement;
    const themeCheckbox = document.getElementById("checkbox");

    // Inversione logica: checked = light, unchecked = dark
    const savedTheme = localStorage.getItem("theme") || "light";
    html.setAttribute("data-bs-theme", savedTheme);
    themeCheckbox.checked = savedTheme === "light";

    applyInverseTheme(savedTheme); // Applichiamo lo stile inverso al caricamento

    themeCheckbox.addEventListener("change", () => {
        const newTheme = themeCheckbox.checked ? "light" : "dark";
        html.setAttribute("data-bs-theme", newTheme);
        localStorage.setItem("theme", newTheme);
        applyInverseTheme(newTheme); // Applichiamo lo stile inverso al cambio tema
    });

    function applyInverseTheme(currentTheme) {
        const inverseElements = document.querySelectorAll(
            "[data-theme-invert]"
        );

        inverseElements.forEach((el) => {
            // Pulizia classi
            el.classList.remove(
                "bg-dark",
                "text-white",
                "bg-light",
                "text-dark"
            );

            if (currentTheme === "dark") {
                // Tema sito scuro → elemento invertito chiaro
                el.classList.add("bg-light", "text-dark");
            } else {
                // Tema sito chiaro → elemento invertito scuro
                el.classList.add("bg-dark", "text-white");
            }
        });
    }
    
});
