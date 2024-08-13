async function obtenerProductos(){
    let url = `https://api.mercadolibre.com/sites/MLU/search?category=MLU1144`;
    let consulta = await fetch(url);
    let datos = await consulta.json();
    let productos  = datos.results;
    return productos;
}
window.onload = async ()=>{
    let productos = await obtenerProductos();
    mostrarProductos(productos);
    console.log(productos);
}
 function mostrarProductos(productos){
    let productosListElement = document.querySelector("#listaProducto");
    productos.forEach(producto => {
        let tr = document.createElement("tr");
        tr.innerHTML+= `

                <td>${producto.title}</td>
                <td>${producto.permalink}</td>
                <td>${producto.thumbnail}</td>
                <td>${producto.price}</td>        
        `;
        let button = document.createElement("button");
        button.innerHTML="guardar";
        tr.appendChild(button);
        button.onclick = ()=>{
            guardarProductos(producto);
        }
        productosListElement.appendChild(tr);
    });


 }

 function guardarProductos(producto){
    let formData = new FormData();
    formData.append("nombre",producto.title);
    
 }