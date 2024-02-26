import KEYS from "../assets/Keys.js";

const $d = document;
const $productos = $d.getElementById("productos");
const $template = $d.getElementById("producto-template").content;
const $fragment = $d.createDocumentFragment();
const $carrito = $d.getElementById("carrito");
const $listaCarrito = $d.getElementById("lista-carrito");
const $total = $d.getElementById("total");
const $pagarBtn = $d.getElementById("pagar");
const options = { headers: {Authorization: `Bearer ${KEYS.secret}`}};
const formatomoneda = num => {
    const numString = num.toString(); // Convertir a cadena
    return `$${numString.slice(0, -2)}.${numString.slice(-2)}`;
};

let products, prices;
let carrito = [];

Promise.all([
    fetch("https://api.stripe.com/v1/products", options),
    fetch("https://api.stripe.com/v1/prices", options)
])
.then(responses => Promise.all(responses.map(res => res.json())))
.then(json => {
    products = json[0].data;
    prices = json[1].data;

    prices.forEach(el => {
        let productData = products.filter(product => product.id === el.product)

        $template.querySelector(".producto").setAttribute("data-price", el.id);
        $template.querySelector("img").src = productData[0].images[0];
        $template.querySelector("img").alt = productData[0].name;
        $template.querySelector("figcaption").innerHTML = `${productData[0].name} ${formatomoneda(el.unit_amount_decimal)} ${(el.currency).toUpperCase()}`;
        $template.querySelector(".agregar-carrito").setAttribute("data-price", el.id); // Agregar data-price al botón

        let $clone = $d.importNode($template, true);

        $fragment.appendChild($clone);
    });

    $productos.appendChild($fragment);

})
.catch(error => {
    let message = error.statuText || "Ocurrió un error en la petición";

    $productos.innerHTML = `Error: ${error.status}: ${message}`;
})

$d.addEventListener("click", e => {
    if (e.target.matches(".agregar-carrito")) {
        let priceId = e.target.parentElement.getAttribute("data-price");
        const selectedProduct = prices.find(price => price.id === priceId);

        // Buscar si el producto ya está en el carrito
        const existingProduct = carrito.find(item => item.id === selectedProduct.id);

        if (existingProduct) {
            // Si el producto ya está en el carrito, aumentar la cantidad
            existingProduct.quantity += 1;
        } else {
            // Si el producto no está en el carrito, agregarlo con una cantidad inicial de 1
            selectedProduct.quantity = 1;
            carrito.push(selectedProduct);
        }
        
        actualizarCarrito();
    }
});

$pagarBtn.addEventListener("click", () => {
    const lineItems = carrito.map(item => ({
        price: item.id,
        quantity: item.quantity
    }));

    Stripe(KEYS.public).redirectToCheckout({
        lineItems,
        mode: "payment",
        successUrl: "http://localhost/EscoArt-Repository/tienda/index.html",
        cancelUrl: "http://localhost/EscoArt-Repository/tienda/index.html"
    });
});

function actualizarCarrito() {
    $listaCarrito.innerHTML = "";
    let total = 0;

    carrito.forEach(item => {
        const listItem = document.createElement("li");
        listItem.textContent = `${item.name} x ${item.quantity} - ${formatomoneda(item.unit_amount_decimal * item.quantity)} ${(item.currency).toUpperCase()}`;
        $listaCarrito.appendChild(listItem);
        total += item.unit_amount_decimal * item.quantity;
    });

    $total.textContent = formatomoneda(total.toString());
}
