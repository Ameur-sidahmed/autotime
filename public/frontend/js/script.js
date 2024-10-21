document.addEventListener('DOMContentLoaded', () => {
    // Fonction de recherche
    function search() {
        const input = document.getElementById('search-input');
        const filter = input.value.toLowerCase();
        const items = document.querySelectorAll('.controle-tech-item');

        items.forEach((item) => {
            const txtValue = item.textContent || item.innerText;
            if (txtValue.toLowerCase().indexOf(filter) > -1) {
                item.style.display = '';
            } else {
                item.style.display = 'none';
            }
        });
    }

    // Intersection Observer
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('show');
            } else {
                entry.target.classList.remove('show');
            }
        });
    });

    const hiddenElements = document.querySelectorAll('.controle-tech-item');
    hiddenElements.forEach((el) => observer.observe(el));

    // Ajouter un écouteur d'événement à l'input de recherche
    document.getElementById('search-input').addEventListener('keyup', search);
});
