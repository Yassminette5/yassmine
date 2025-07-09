document.addEventListener('DOMContentLoaded', () => {
    // 🎉 Affichage du nom de l’utilisateur
    const user = JSON.parse(document.getElementById('admin-title').dataset.user);
    document.getElementById('admin-title').innerText = `👋 Bienvenue, ${user.nom}`;

    // 📁 Navigation sidebar
    const links = document.querySelectorAll('.sidebar li[data-section]');
    const sections = document.querySelectorAll('.content-section');

    links.forEach(link => {
        link.addEventListener('click', () => {
            // Activer la section cliquée
            const sectionId = link.dataset.section;

            // Masquer toutes les sections
            sections.forEach(sec => sec.classList.remove('active'));
            document.getElementById(sectionId).classList.add('active');

            // Activer l’élément cliqué
            links.forEach(l => l.classList.remove('active'));
            link.classList.add('active');
        });
    });

    // 🌙 Dark Mode (avec mémorisation)
    const toggleBtn = document.getElementById('darkModeToggle');
    
    // Charger l'état depuis localStorage
    if (localStorage.getItem('dark-mode') === 'on') {
        document.body.classList.add('dark-mode');
    }

    toggleBtn.addEventListener('click', () => {
        document.body.classList.toggle('dark-mode');
        const isDark = document.body.classList.contains('dark-mode');
        localStorage.setItem('dark-mode', isDark ? 'on' : 'off');
    });

    // 📱 Toggle menu responsive
    const sidebar = document.getElementById('sidebar');
    const menuToggle = document.getElementById('menuToggle');

    if (menuToggle) {
        menuToggle.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
        });
    }
});
