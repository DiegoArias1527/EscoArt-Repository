class Categoria {
    constructor(idCategoria, nomCategoria) {
        this._idCategoria = idCategoria;
        this._nomCategoria = nomCategoria;
        this._productos = []; // Array para almacenar productos
    }

    modificarAtributos(nuevoId, nuevoNombre) {
        this._idCategoria = nuevoId;
        this._nomCategoria = nuevoNombre;
    }

    asignacionProductos(producto) {
        this._productos.push(producto);
    }

    agregarProductos(producto) {
        this._productos.push(producto);
    }

    eliminarProductos(idProducto) {
        this._productos = this._productos.filter(producto => producto.id !== idProducto);
    }

    listarProductosPorPrecio() {
        return this._productos.sort((a, b) => a.precio - b.precio);
    }
}

// Ejemplo de uso
const categoria1 = new Categoria(1, "Electrónicos");

const producto1 = { id: 1, nombre: "Televisor", precio: 500 };
const producto2 = { id: 2, nombre: "Laptop", precio: 1000 };
const producto3 = { id: 3, nombre: "Smartphone", precio: 800 };

categoria1.agregarProductos(producto1);
categoria1.agregarProductos(producto2);
categoria1.agregarProductos(producto3);

console.log(categoria1.listarProductosPorPrecio());


//-----------------------------------------------------------------------------------------------------------------------------//

class Productos {
    constructor() {
        this._productos = [];
    }

    agregarProducto(producto) {
        this._productos.push(producto);
    }

    eliminarProducto(idProducto) {
        this._productos = this._productos.filter(producto => producto.id !== idProducto);
    }

    listarProductosPorPrecio() {
        return this._productos.slice().sort((a, b) => a.precio - b.precio);
    }
}

class Categoria {
    constructor(idCategoria, nomCategoria, productos) {
        this._idCategoria = idCategoria;
        this._nomCategoria = nomCategoria;
        this._productos = productos || new Productos();
    }

    modificarAtributos(nuevoId, nuevoNombre) {
        this._idCategoria = nuevoId;
        this._nomCategoria = nuevoNombre;
    }

    asignacionProductos(producto) {
        this._productos.agregarProducto(producto);
    }

    agregarProductos(producto) {
        this._productos.agregarProducto(producto);
    }

    eliminarProductos(idProducto) {
        this._productos.eliminarProducto(idProducto);
    }

    listarProductosPorPrecio() {
        return this._productos.listarProductosPorPrecio();
    }
}

// Ejemplo de uso
const productos = new Productos();

const producto1 = { id: 1, nombre: "Televisor", precio: 500 };
const producto2 = { id: 2, nombre: "Laptop", precio: 1000 };
const producto3 = { id: 3, nombre: "Smartphone", precio: 800 };

productos.agregarProducto(producto1);
productos.agregarProducto(producto2);
productos.agregarProducto(producto3);

const categoria1 = new Categoria(1, "Electrónicos", productos);

console.log(categoria1.listarProductosPorPrecio());