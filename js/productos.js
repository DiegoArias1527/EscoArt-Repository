class Productos{
    static productosStock = 0;

    constructor(idProducto, nomProducto, precioProducto, descPreoducto, cantidadProductos){
        this._idProducto = idProducto;
        this._nomProducto = nomProducto;
        this._precioProducto = precioProducto;
        this._descPreoducto = descPreoducto;
        this._cantidadProductos = cantidadProductos;
    }
    modificarAtributos(){}
    aplicarDescuento(){}
    agregarStock(){}
    reducirStock(){}

}