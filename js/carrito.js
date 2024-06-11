document.addEventListener("DOMContentLoaded", function () {

    const agregarCarritoBtns = document.querySelectorAll(".agregar-carrito-btn");
    const vaciarCarritoBtn = document.getElementById("vaciar-carrito");
    const carritoBtnNavbar = document.querySelector(".nav-account a[href='index.php#carritox']");
    const carritoContainer = document.querySelector(".carrito");
    const carrito = [];
    let totalCarrito = 0;
    
    function agregarAlCarrito(nombreProducto, precioProducto) {
        const productoExistente = carrito.find((producto) => producto.nombre === nombreProducto);

        if (productoExistente) {
            productoExistente.cantidad++;
            productoExistente.total = productoExistente.cantidad * precioProducto;
        } else {
            carrito.push({
                nombre: nombreProducto,
                precio: precioProducto,
                cantidad: 1,
                total: precioProducto,
            });
        }

        totalCarrito += precioProducto;
        actualizarCarrito();
    };

    function actualizarCarrito() {
        const carritoContenido = document.querySelector(".carrito-contenido");
        const totalCarritoElement = document.getElementById("total-carrito");

        carritoContenido.innerHTML = "";

        carrito.forEach((producto) => {
            const productoElement = document.createElement("div");
            productoElement.classList.add("carrito-item");
            let preciox = (producto.precio).toLocaleString('en-US')
            let precioxtotal = (producto.total).toLocaleString('en-US')
            productoElement.innerHTML = `
                <span>${producto.nombre}</span>
                <span>Cantidad: ${producto.cantidad}</span>
                <span>Precio: `+ preciox +` COP</span>
                <span>Total: `+ precioxtotal +` COP</span>
            `;
            carritoContenido.appendChild(productoElement);
        });
        totalCarritoElement.textContent = (totalCarrito).toLocaleString('en-US') + " COP";
    }

    function vaciarCarrito() {
        carrito.length = 0;
        totalCarrito = 0;

        actualizarCarrito();
    }

    function comprar() {
        const carritoJSON = JSON.stringify(carrito);
    
        const carritoInput = document.getElementById("carrito-input");
        carritoInput.value = carritoJSON;
    
        const carritoForm = document.getElementById("carrito-form");
        carritoForm.submit();
    }
    

    // Agregar evento de clic al botón "Vaciar Carrito"
    vaciarCarritoBtn.addEventListener("click", function () {
        vaciarCarrito();
    });

    // Agregar evento de clic al botón "CARRITO"    
    agregarCarritoBtns.forEach(function (btn) {
        btn.addEventListener("click", function (event){
            carritoContainer.style.display = "block";

        })
    })

    carritoBtnNavbar.addEventListener("click", function (event) {
        event.preventDefault();
        
        if (carritoContainer.style.display === "block") {
            carritoContainer.style.display = "none";
        } else {
            carritoContainer.style.display = "block";
        }
    });

    // Agregar evento de clic al botón "Agregar al carrito" en tus productos
    agregarCarritoBtns.forEach(function (btn) {
        btn.addEventListener("click", function () {

            const productoElement = btn.closest(".box-producto");
            const nombreProducto = productoElement.querySelector("h3").textContent;
            const precioProducto = parseInt(productoElement.querySelector(".precio").textContent.replace(" COP", "").replace(",", ""));
            
            agregarAlCarrito(nombreProducto, precioProducto);
        });
    });
    
    // Agregar evento de clic al botón "Comprar"
    const comprarBtn = document.getElementById("comprar");
    comprarBtn.addEventListener("click", function () {
        comprar();
    });
});