<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRUD - ESCOART</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

  <link rel="stylesheet" href="../datatable/css/main.css">
</head>

<body>

  <div class="container fondo">
    <h1 class="text-center">CRUD - ESCOART</h1>

    <div class="row">
      <div class="col-2 offset-10">
        
      </div>
    </div>
    </br>
    </br>
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="datos_usuario">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nombre_Usuario</th>
            <th>Primer_Apellido</th>
            <th>Segundo_Apellido</th>
            <th>Correo_Usuario</th>
            <th>Contraseña_Usuario</th>
            <th>Editar</th>
            <th>Borrar</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="modalUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Crear Nuevo Registro</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form method="POST" id="formulario">
          <div class="modal-content">
            <div class="modal-body">
              <label for="nombre">Ingrese el Nombre</label>
              <input type="text" name="nombre" id="nombre" class="form-control">
              </br>

              <label for="primerape">Ingrese el Primer Apellido</label>
              <input type="text" name="primerape" id="primerape" class="form-control">
              </br>

              <label for="segundoape">Ingrese el Segundo Apellido</label>
              <input type="text" name="segundoape" id="segundoape" class="form-control">
              </br>

              <label for="correo">Ingrese el Correo</label>
              <input type="email" name="correo" id="correo" class="form-control">
              </br>
            </div>

            <div class="modal-footer">
              <input type="hidden" name="Id_Usuario" id="Id_Usuario">
              <input type="hidden" name="operacion" id="operacion">
              <input type="submit" name="action" id="action" class="btn btn-success" value="Crear">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>


  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  
  <script type="text/javascript">
    $(document).ready(function(){

      $('#botonCrear').click(function(){
        $("#formulario")[0].reset();
        $(".modal-title").text("Crear Registro");
        $("#action").val("Crear");
        $("#operacion").val("Crear");
      });

      var dataTable = $('#datos_usuario').DataTable({
        "processing":true,
        "serverSide":true,
        "order":[],
        "ajax":{
          url: "obtener_registros.php",
          type: "POST"
        },
        "columnsDefs":[
          {
          "targets":[0,3,4],
          "orderable":false,
         },
        ]
      });

      //Funcion para Crear Registro
      $(document).on('submit','#formulario', function(event){
        event.preventDefault();
        var nombre = $('#nombre').val();
        var primerape = $('#primerape').val();
        var segundoape = $('#segundoape').val();
        var correo = $('#correo').val();
        var contraseña = $('#contrasena').val();

        if(nombre != '' && primerape != '' && segundoape != '' && correo != ''){
          $.ajax({
            url: "../datatable/crear.php",
            method: "POST",
            data:new FormData(this),
            contentType:false,
            processData:false,
            success:function(data)
            {
              alert(data);
              $('#formulario')[0].reset(); 
              $('#modalUsuario').modal('hide');
              dataTable.ajax.reload();
            }
          });
        }else{
          alert("Todos los campos son obligatorio");
        }
      });

      
      //Funcion para Editar
      $(document).on('click', '.editar', function(){
        var Id_Usuario = $(this).attr("id");
        $.ajax({
          url:"../datatable/obtener_registro.php",
          method:"POST",
          data:{Id_Usuario:Id_Usuario},
          dataType:"json",
          success:function(data)
          {
            $('#modalUsuario').modal('show');
            $('#nombre').val(data.Nom_Usuario);
            $('#primerape').val(data.Primer_Apellido);
            $('#segundoape').val(data.Segundo_Apellido);
            $('#correo').val(data.Correo_Usuario);
            $('.modal-title').text("Editar Registro");
            $('#Id_Usuario').val(Id_Usuario);
            $('#action').val("Editar");
            $('#operacion').val("Editar");
          },
          error: function(jqXHR, textStatus, errorThrown){
            console.log(textStatus, errorThrown);
          }
        })
      });


      //Funcion de Borrar
      $(document).on('click', '.borrar', function(){
        var Id_Usuario = $(this).attr("id");
        if (confirm("Estas seguro que deseas borrar este registro: " + Id_Usuario))
        {
          $.ajax({
            url: "../datatable/borrar.php",
            method:"POST",
            data:{Id_Usuario:Id_Usuario},
            success:function(data)
            {
              alert(data);
              dataTable.ajax.reload();
            }
          });  
        }else{
          return false;
        }
      });

    });
  </script>

</body>

</html>