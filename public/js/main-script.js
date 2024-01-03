const store = document.querySelectorAll('#store')
const content = document.querySelectorAll('#content')
const product = document.querySelectorAll('#product')

store.forEach((item, index) => {
    item.addEventListener('click', () => {
        store.forEach((cardItem, cardIndex) => {
            if (cardIndex === index) {
                cardItem.classList.add('active')
                content[cardIndex].classList.add('hide')
                product[cardIndex].classList.remove('hide')
            } else {
                cardItem.classList.remove('active')
            }
        })
    })
})