 <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
 <link href={{ asset('node_modules/bootstrap/dist/css/bootstrap.min.css') }} rel="stylesheet">
 <link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css') }}">

 <!-- Fonts -->
 <link rel="preconnect" href="https://fonts.bunny.net">
 <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
 <link rel="stylesheet" href="{{ asset('fontawesome-free-6.4.2-web/css/all.min.css') }}">



 <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
 <script src="{{ asset('node_modules/jquery/dist/jquery.min.js') }}"></script>
 <script src="{{ asset('DataTables/datatables.min.js') }}"></script>


 <script>
     ///Inicializa DataTables///
     $(document).ready(function() {
         $('#myTable').DataTable({
             language: {
                 info: "Mostrando _START_ a _END_ de _TOTAL_ elementos",
                 infoEmpty: "Mostrando 0 a 0 de 0 elementos",
                 infoFiltered: "(filtrados de _MAX_ elementos en total)",
                 lengthMenu: "Mostrar _MENU_ elementos",
                 zeroRecords: "No se encontraron elementos coincidentes",
                 search: "Buscar:",
                 paginate: {
                     first: "Primero",
                     last: "Último",
                     next: "Siguiente",
                     previous: "Anterior"
                 }
             },
             lengthChange: false,
             dom: '<"top"f>rt<"bottom"lp><"clear">' // Mueve el buscador a la parte superior izquierda
             //ordering: false
         });
     });
 </script>


 <!-- scripts EDITAR-->
 <script>
     document.addEventListener("DOMContentLoaded", function() {
         const mostrarModalBtns = document.querySelectorAll("[id^='editarModal']");
         const cerrarModalBtns = document.querySelectorAll(".modal-close");
         const miModal = document.getElementById("editModal");

         mostrarModalBtns.forEach((btn) => {
             btn.addEventListener("click", () => {
                 miModal.classList.remove("hidden");
             });
         });

         cerrarModalBtns.forEach((btn) => {
             btn.addEventListener("click", () => {
                 miModal.classList.add("hidden");
             });
         });
     });

     $(document).on("click", "#editarModal", function() {
         var ids = $(this).data('ids'); // acá obtenemos el id al hacer clic en el boton
         var names = $(this).data('names'); // acá obtenemos el name al hacer clic en el boton, etc, etc
         var rol = $(this).data('rol');
         var tel = $(this).data('tel');
         var emails = $(this).data('emails');
         var nombre = $(this).data('nombre');
         var descripcion = $(this).data('descripcion');
         var categoria = $(this).data('categoria');

         $("#ids").val(ids);
         $("#names").val(names);
         $("#rol").val(rol);
         $("#tel").val(tel);
         $("#emails").val(emails);
         $("#nombre").val(nombre);
         $("#descripcion").val(descripcion);
         $("#categoria").val(categoria);

         urlFull = $('#editUser').attr('data-action').slice(0, -
         1); //esta linea accede a los atributos del formulario
         // y borra o limpia el nro 1 que estamos pasando en el "route" del action en el formulario (action="{{ route('profile.borrar', 1) }}"),
         // con ello nos queda la url limpia sin el nro 1 para poder concatenar el id que estamos optiendo al hacer clic en el boton de borrado.
         // Ademas le estamos indicando que borre o limpie el data-action y no el action que está en el formulario

         urlFull +=
         ids; // acá estamos concatenando la URL con el id que obtuvimos al hacer clic en el boton de borrado

         $('#editUser').attr('action', urlFull); // acá obtenemos ya la nueva ruta o url con el id
         console.log(urlFull);
     })
 </script>

 <!-- scripts CREAR-->
 <script>
     document.addEventListener("DOMContentLoaded", function() {
         const mostrarModalBtns = document.querySelectorAll("[id^='crear-modal']");
         const cerrarModalBtns = document.querySelectorAll(".modal-close");
         const miModal = document.getElementById("crea-modal");

         mostrarModalBtns.forEach((btn) => {
             btn.addEventListener("click", () => {
                 miModal.classList.remove("hidden");
             });
         });

         cerrarModalBtns.forEach((btn) => {
             btn.addEventListener("click", () => {
                 miModal.classList.add("hidden");
             });
         });
     });
 </script>

 <!-- scripts ELIMINAR-->
 <script>
     document.addEventListener("DOMContentLoaded", function() {
         const mostrarModalBtns = document.querySelectorAll("[id^='mostrarModal']");
         const cerrarModalBtns = document.querySelectorAll(".modal-close");
         const miModal = document.getElementById("miModal");

         mostrarModalBtns.forEach((btn) => {
             btn.addEventListener("click", () => {
                 miModal.classList.remove("hidden");
             });
         });

         cerrarModalBtns.forEach((btn) => {
             btn.addEventListener("click", () => {
                 miModal.classList.add("hidden");
             });
         });
     });

     $(document).on("click", "#mostrarModal", function() {
         var id = $(this).data('id'); // acá obtenemos el id al hacer clic en el boton
         var name = $(this).data('name'); // acá obtenemos el name al hacer clic en el boton, etc, etc
         var nombres = $(this).data('nombres');
         var nomb = $(this).data('nomb');

         $("#id").val(id);
         $("#name").val(name);
         $("#nombres").val(nombres);
         $("#nomb").val(nomb);


         urlFull = $('#deleteUser').attr('data-action').slice(0, -
         1); //esta linea accede a los atributos del formulario
         // y borra o limpia el nro 1 que estamos pasando en el "route" del action en el formulario (action="{{ route('profile.borrar', 1) }}"),
         // con ello nos queda la url limpia sin el nro 1 para poder concatenar el id que estamos optiendo al hacer clic en el boton de borrado.
         // Ademas le estamos indicando que borre o limpie el data-action y no el action que está en el formulario

         urlFull +=
         id; // acá estamos concatenando la URL con el id que obtuvimos al hacer clic en el boton de borrado

         $('#deleteUser').attr('action', urlFull); // acá obtenemos ya la nueva ruta o url con el id
         //console.log(urlFull);
     })
 </script>
