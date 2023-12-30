const card = document.getElementById('card');
const content = document.getElementById('content');
const produk = document.getElementById('produk');
const btnCategory = document.getElementById('categoryButton');

card.addEventListener('click', () => {
    card.classList.toggle('active');
    content.classList.toggle('hide');
    produk.classList.toggle('hide');
});

btnCategory.addEventListener('click', () => {
    btnCategory.classList.toggle('active');
});