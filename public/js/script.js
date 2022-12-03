function validar(){
    //valido el nombre
    if (document.fvalida.nombre.value.length==0){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Tienes que escribir el nombre del producto',
            })
           document.fvalida.nombre.focus()
           return 0;
    }

        if (document.fvalida.precio.value.length==0){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Tienes que escribir el precio del producto',
            })
            document.fvalida.precio.focus()
            return 0;
     }
 
     if (document.fvalida.categoria.value.length==0){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Tienes que escribir el precio del producto',
        })
        document.fvalida.precio.focus()
        return 0;
 }

 

    Swal.fire({
        icon: 'success',
        title: 'Registrado correctamente',
        showConfirmButton: false,
        timer: 3000
      })
    document.fvalida.submit();
}

function actualizar() {
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Actualizado correctamente',
        showConfirmButton: false,
        timer: 1500
      })
    document.actualizado.submit();
}