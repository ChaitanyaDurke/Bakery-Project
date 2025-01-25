const addToCartButtons = document.querySelectorAll('.add-to-cart');
const cartItemsElement = document.getElementById('cart-items');
const cartTotalElement = document.getElementById('total-value');
const cartElement = document.getElementById('cart');

let cart = [];

addToCartButtons.forEach(button => {
    button.addEventListener('click', () => {
        const productContainer = button.parentElement;
        const productTitle = productContainer.querySelector('.product-title').innerText;
        const productPrice = parseFloat(productContainer.querySelector('.product-price').innerText.replace('Rs. ', ''));
        const productId = productContainer.dataset.productId;

        const existingItem = cart.find(item => item.id === productId);

        if (existingItem) {
            existingItem.quantity++;
        } else {
            cart.push({ id: productId, title: productTitle, price: productPrice, quantity: 1 });
        }

        updateCart();
    });
});

function updateCart() {
    cartItemsElement.innerHTML = '';
    let total = 0;

    cart.forEach(item => {
        const itemElement = document.createElement('li');
        itemElement.classList.add('cart-item');
        itemElement.innerHTML = `
            <span>${item.title} x ${item.quantity}</span>
            <span>Rs. ${(item.price * item.quantity).toFixed(2)}</span>
            <button class="remove-item" data-id="${item.id}">Remove</button>
        `;
        total += item.price * item.quantity;
        cartItemsElement.appendChild(itemElement);
    });

    cartTotalElement.innerText = `Rs. ${total.toFixed(2)}`;
}

document.addEventListener('click', event => {
    if (event.target.classList.contains('remove-item')) {
        const itemId = event.target.dataset.id;
        const itemIndex = cart.findIndex(item => item.id === itemId);
        cart.splice(itemIndex, 1);
        updateCart();
    }
});

document.getElementById('checkout-button').addEventListener('click', () => {
    // Implement checkout logic here
    alert('Checkout functionality is not implemented yet!');
});

document.getElementById('cart-icon').addEventListener('click', () => {
    cartElement.style.display = 'block';
});

document.getElementById('cart-close').addEventListener('click', () => {
    cartElement.style.display = 'none';
});
