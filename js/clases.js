class Categoria {
    constructor(idCategoria, nomCategoria){
       this._idCategoria = idCategoria;
       this._nomCategoria = nomCategoria;
    }
    modificarAtributos(){}
    asignacionProductos(){}
    agreagarproductos(){}
    eliminarproductos(){}
    listarproductosporprecio(){}
}


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


class Provedor {
    constructor(idProvedor, nomProvedor, apeProvedor, telProvedor){
        this._idProvedor = idProvedor;
        this._nomProvedor = nomProvedor;
        this._apeProvedor = apeProvedor;
        this._telProvedor = telProvedor;
    }
    modificarInformacion(){}
    agreagarproductos(){}
    eliminarproductos(){}
    actualizarinventario(){}

}


class Estado{
    constructor(idEstado, estado){
        this._idEstado = idEstado;
        this._estado = estado;
    }
    cambiarestado(){}

}


class Envio{
    constructor(idEnvio, estadoEnvio, fechaEnvio, fechaEntrega){
        this._idEnvio = idEnvio;
        this._estadoEnvio = estadoEnvio;
        this._fechaEnvio = fechaEnvio;
        this._fechaEntrega = fechaEntrega;
    }
    actualizarestado(){}
    actualizarfechadeentrega(){}
    calculartiempodeentrga(){}
}

class Usuario{
    constructor(idUsuario,nomUsuario,apeUsuario,correoUsuario,telUsuario,contraseñaUsuario,direccionUsuario){
        this._idUsuario = idUsuario;
        this._nomUsuario = nomUsuario;
        this._apeUsuario = apeUsuario;
        this._correoUsuario = correoUsuario;
        this._telUsuario = telUsuario;
        this._contraseñaUsuario = contraseñaUsuario;
        this._direccionUsuario = direccionUsuario;
    }
    modificarInformacion(){}
    realizarCompra(){}
    realizarPago(){}
    cancelarPago(){}
    cancelarPedido(){}
    cambiarContraseña(){}
    agregaralCarrito(){}
    eliminardelCarrito(){}
    verCarrito(){}
    iniciarSesion(){}
    cerraSesion(){}
}

class Pedido{
    constructor(idPedido,fechaPedido,estadoPedido){
        this._idPedido = idPedido;
        this._fechaPedido = fechaPedido;
        this._estadoPedido = estadoPedido;
    }
    calcularTotal(){}
    obtenerDetalles(){}
}

class Pago{
    constructor(idPago,valorPago,fechaPago){
        this._idPago = idPago;
        this._valorPago = valorPago;
        this._fechaPago = fechaPago;
    }
    obtenerEstado(){}
    obtenerDetallesPago(){}
}

class CarritoCompras{
    constructor(idCarrito){
        this._idCarrito = idCarrito;
    }
    calcularTotal(){}
    obtenerDetalles(){}
}
