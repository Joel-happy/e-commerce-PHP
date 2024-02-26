if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready)
} else {
    ready()
}

function ready() {
    let removeCartItemsButtons = document.getElementsByClassName('supprimer')
    for (let i = 0; i < removeCartItemsButtons.length; i++) {
        let buton = removeCartItemsButtons[i]
        buton.addEventListener('click', removeCartItem)
    }

    let quantityInputs = document.getElementsByClassName('qte_article')
    for (let i = 0; i < quantityInputs.length; i++) {
        let input = quantityInputs[i]
        input.addEventListener('change', quantityChanged)
    }
    
    let addToCartsButtons=document.getElementsByClassName('ajouter-article')
    for (let i = 0; i < addToCartsButtons.length; i++){
        let button=addToCartsButtons[i]
        button.addEventListener('click',addToCartClicked)
    }
    
}

function removeCartItem(event) {
    let buttonclicked = event.target
    buttonclicked.parentElement.parentElement.remove()
    updateCartTotal()
}

function quantityChanged(event) {
    let input = event.target
    if (isNaN(input.value) || input.value <= 0) {
        input.value = 1
    }
    updateCartTotal()
}

function addToCartClicked(event){
    let button=even.target
    let shopItem=button.parentElement.parentElement
    let title=shopItem.getElementsByClassName('nom-article')[0].innerText
    console.log(title)
    
}

function updateCartTotal() {
    let cartItemContainer = document.getElementsByClassName('containeur-article')[0]
    let cartRows = cartItemContainer.getElementsByClassName('ligne-panier')
    let total = 0
    for (let i = 0; i < cartRows.length; i++) {
        let cartRow = cartRows[i]
        let priceElement = cartRow.getElementsByClassName('cout-article')[0]
        let quantityElement = cartRow.getElementsByClassName('qte_article')[0]
        let price = parseFloat(priceElement.innerText.replace('€', ''))
        let quantity = quantityElement.value
        total = total + (price * quantity)
    }
    total=Math.round(total*100)/100
    document.getElementsByClassName('total-article')[0].innerText = '€' + total
}