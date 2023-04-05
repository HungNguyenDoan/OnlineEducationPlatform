const hidden = (id, btnId) => {
    const container = document.getElementById(id);
    const btn = document.getElementById(btnId);
    btn.addEventListener('click', (event) => {
        event.preventDefault();
        if (container.style.display === 'none') {
            container.style.display = 'flex';
        }
        else {
            container.style.display = 'none';
        }
    })
}
export { hidden }