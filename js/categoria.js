class Categoria {
    constructor(idCategoria, nomCategoria){
       this._idCategoria = idCategoria;
       this._nomCategoria = nomCategoria;
    }

    modificarAtributos(nuevoId, nuevoNombre) {
        this._idCategoria = nuevoId;
        this._nomCategoria = nuevoNombre;
    }

    agregarProductos(producto) {
        this._productos.push(producto);
    }

    eliminarProductos() {}

}

let categoria1 = new Categoria(1,'Escolares')
let categoria2 = new Categoria(2,'Oficina')
let categoria3 = new Categoria(3,'Artes')

console.log(categoria1);