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
                <td><a href = "${producto.permalink}">Entra aqui</td>
                <td><img src="${producto.thumbnail}"></td>
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


 

  async function  guardarProductos(productos){
    console.log(productos);
    let url = "http://localhost/API_MateoQuintana/backend/controller/controller.php?funcion=guardarProducto";
    let formData = new FormData();

    formData.append("id",productos.id);
    formData.append("titulo",productos.title);
    formData.append("link",productos.permalink);
    formData.append("foto",productos.thumbnail);
    formData.append("precio",productos.price);

    let config = {
        method:'post',
        body: formData
    }
    let respuesta = await fetch(url,config);
    let rec = await respuesta.json();
    console.log(rec);
 }
}