document.addEventListener("DOMContentLoaded", async () => {
    try {
        const response = await fetch('/api/instagram');
        const data = await response.json();

        const container = document.getElementById('instagram-feed');
        container.innerHTML = ''; // Limpiar contenido previo

        if (!data.length) {
            container.innerHTML = '<p>No hay publicaciones disponibles.</p>';
            return;
        }

        data.forEach(post => {
            const postElement = document.createElement('div');
            postElement.className = 'bg-gray-100 p-2 rounded shadow-sm';

            postElement.innerHTML = `
                <a href="${post.permalink}" target="_blank">
                    <img src="${post.media_url}" alt="Instagram Post" class="w-full h-auto max-w-xs rounded">
                </a>
                <p class="text-sm mt-2">${post.caption || ''}</p>
            `;

            container.appendChild(postElement);
        });

    } catch (error) {
        console.error('Error al cargar Instagram:', error);
        document.getElementById('instagram-feed').innerHTML = `<p>Error al cargar las publicaciones.</p>`;
    }
});
