let modal = document.createElement('div');
modal.style.position = 'fixed';
modal.style.width = '100vw';
modal.style.height = '100vh';
modal.style.zIndex = '99999';
modal.style.background = '#000000DD';
modal.style.display = 'flex';
modal.style.justifyContent = 'center';
modal.style.alignItems = 'center';
modal.innerHTML = `
    <div class="loading-img" style="background: url(storage/images/loading.gif); background-repeat: no-repeat; background-position: center; background-size: cover; width: 100px; height: 100px"></div>
`;

window.addEventListener('DOMContentLoaded', (event) => {
    document.body.append(modal);
});

window.addEventListener('load', (event) => {
    modal.remove();
});
