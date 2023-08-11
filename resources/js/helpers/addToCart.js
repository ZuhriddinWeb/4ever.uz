export function addToCart(id_product) {
    axios.get(`cart-save/${id_product}`).then(({ data }) => {
        if (data) store.state.cart.push(id_product)
        else {
            store.state.cart = store.state.cart.filter((item) => item !== id_product)
        }
    })
}