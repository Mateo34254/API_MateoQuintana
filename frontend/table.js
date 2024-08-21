window.onload = async ()=>{
    let productos = await obtenerProductos();
    mostrarProductos(productos);
    console.log(productos);
}

async function obtenerProductos(){
    let url = `https://api.mercadolibre.com/sites/MLU/search?category=MLU1144`;
    let consulta = await fetch(url);
    let datos = await consulta.json();
    let productos  = datos.results;
    return productos;
}

 async function mostrarProductos(productos){
    let productosListElement = document.querySelector("#listaProducto");
    productosListElement.innerHTML='';
    productos.forEach(producto => {
        let tr = document.createElement("tr");
        tr.innerHTML+= `
                <td>${producto.title}</td>
                <td><a href = "${producto.permalink}">Entra aqui</td>
                <td><img src="${producto.thumbnail}"></td>
                <td>${producto.price}</td>        
        `;
        let botoncito = document.createElement("button")
        botoncito.onclick = ()=>{guardarProducto(producto)};
        let td = document.createElement("td");
        td.appendChild(botoncito);
        tr.appendChild(td);
        productosListElement.appendChild(tr);
        botoncito.textContent = "Guardar BD";

     });
    }


 

async function guardarProducto(producto){
    console.log(producto);
    let url = "http://localhost/API_MateoQuintana/backend/controller/controller.php?funcion=guardarProducto";
    let formData = new FormData();

    formData.append("id", producto.id);
    formData.append("title", producto.title);
    formData.append("link", producto.permalink);
    formData.append("img", producto.thumbnail);
    formData.append("price", producto.price);

    let config = {
        method: 'POST',
        body: formData
    }

    let respuesta = await fetch(url, config);
    let rec = await respuesta.json();
    console.log(rec);
}
