window.addEventListener("click", function(event){
    if(event.target.id == 'guardar_entrada') guardar_entrada()
    // if(event.target.id == 'guardar_salida') guardar_salida()
})

function guardar_entrada(){

    let nombre_taller = document.querySelector('#nombre_taller').value,
    fecha_entrega = document.querySelector('#fecha_entrega').value,
    producto = document.querySelector('#producto').value,
    cantidad = document.querySelector('#cantidad').value,
    valor = document.querySelector('#valor').value,
    mensaje_error = ''

    if(nombre_taller.trim() == '') mensaje_error = 'Complete el nombre del taller.'
    else if(fecha_entrega.trim() == '') mensaje_error = 'Complete la fecha.'
    else if(producto.trim() == '') mensaje_error = 'Complete el nombre del producto.'
    else if(cantidad.trim() == '') mensaje_error = 'Agregue una cantidad.'
    else if(valor.trim() == '') mensaje_error = 'Agregue el valor del producto'

    if(mensaje_error != ''){
        alertify.alert('Campos obligatorios', mensaje_error)
        return false
    }
    const datosPost = new FormData()
    datosPost.append('nombre_taller', nombre_taller)
    datosPost.append('fecha_entrega', fecha_entrega)
    datosPost.append('producto', producto)
    datosPost.append('cantidad', cantidad)
    datosPost.append('valor', valor)

    alertify.confirm('Carga de datos', 'Seguro que quiere guardar los datos?', function(){

        fetch('ajax/ajax_guardar_entrada.php', {
            method: "POST",
            // Set the post data
            body: datosPost
        })
        .then(response => response.json())
        .then(function (json) {
            // console.log(json)
            if(json.error != ''){
                alertify.alert('Carga de datos',json.error)
                return
            }
            if(json.resp){
                alertify.success('Guardado correctamente')
                setTimeout(function(){window.location.href = 'index.php'}, 2000)
            }            
        })
        .catch(function (error){
            console.log(error)
            // Catch errors
            alertify.alert('Carga de datos','Ocurrio un error al guardar los datos.')
        })
    }, function(){ alertify.error('Cancelado')});

}

function guardar_salida() {
    
    let nombre_taller = document.querySelector('#nombre_taller').value,
    codigo = document.querySelector('#id_entrada').value,
    fecha_retiro = document.querySelector('#fecha').value,
    producto = document.querySelector('#producto').value,
    cantidad = document.querySelector('#cantidad').value,
    enviado = document.querySelector('#enviado').value,
    valor = document.querySelector('#valor').value,
    observacion = document.querySelector('#observacion').value,

    mensaje_error = ''

    if(nombre_taller.trim() == '') mensaje_error = 'Complete el nombre del taller.'
    else if(fecha_retiro == '') mensaje_error = 'Complete la fecha.'
    else if(producto.trim() == '') mensaje_error = 'Complete el nombre del producto.'
    else if(cantidad == '') mensaje_error = 'Agregue una cantidad.'
    else if(enviado == '') mensaje_error = 'Agregue la cantidad de productos enviados.'
    else if(parseInt(cantidad) < parseInt(enviado)) mensaje_error = 'El numero de enviados no puede ser mayor a la cantidad.'
    else if(valor.trim() == '') mensaje_error = 'Agregue el valor del producto'
    else if(codigo.trim() == '') location.reload()

    if(mensaje_error != ''){
        alertify.alert('Campos obligatorios', mensaje_error)
        return false
    }
    const datosPost = new FormData()
    datosPost.append('nombre_taller', nombre_taller)
    datosPost.append('codigo', codigo)
    datosPost.append('fecha_retiro', fecha_retiro)
    datosPost.append('producto', producto)
    datosPost.append('cantidad', cantidad)
    datosPost.append('enviado', enviado)
    datosPost.append('valor', valor)
    datosPost.append('observacion', observacion)

    alertify.confirm('Carga de datos', 'Seguro que quiere guardar los datos?', function(){

        fetch('ajax/ajax_guardar_salida.php', {
            method: "POST",
            // Set the post data
            body: datosPost
        })
        .then(response => response.json())
        .then(function (json) {
            if(json.error != ''){
                alertify.alert('Carga de datos',json.error)
                return
            }
            if(json.resp){
                alertify.success('Guardado correctamente')
                setTimeout(function(){window.location.href = 'index.php'}, 2000)
            }            
        })
        .catch(function (error){
            console.log(error)
            // Catch errors
            alertify.alert('Carga de datos','Ocurrio un error al guardar los datos.')
        })
    }, function(){ alertify.error('Cancelado')});

}