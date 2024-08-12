async function obtenerProductos(){
    let url = `https://api.mercadolibre.com/sites/MLU/search?category=MLU1144`;
    let consulta = await fetch(url);
    let datos = await consulta.json();
    let productos  = datos.results;
    return productos;
}
window.onload = async ()=>{
    let productos = await obtenerProductos();
    console.log(productos);
}
 function mostrarProductos(productos){
    let productosListElement = document.querySelector("#listaProducto");
    productos.forEach(productos => {
        let p = document.createElement("p");
        p.onclick = () => {mostrarProductos(productos)}
        p.innerHTML = planeta.title;
        productosListElement.appendChild(p);
    });
 }