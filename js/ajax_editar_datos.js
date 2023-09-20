// DISEÑO PARA CELULAR
document.addEventListener('DOMContentLoaded', function (event) {
    if(window.innerWidth < 768){
        document.querySelector('#guardar_datos').innerHTML = `<i class="bi bi-floppy"></i>`
        document.querySelector('#eliminar_entrada').innerHTML = '<i class="bi bi-trash"></i>'
    }
})
document.addEventListener('click', function (event) {
    if(event.target.id == 'preparar_salida') preparar_salida(event)
})

function eliminar_entrada(id) {
    alertify.confirm('Eliminar datos', 'Seguro que quiere eliminar los datos, tambien se borrara la salida en caso de tenerla ?', function(){
        window.location.href = "ajax/eliminar_carga.php?id="+id
    }, function(){
        alertify.error('Cancelado')
    });
}
function preparar_salida(event) {
    event.preventDefault()
    document.querySelector('#div_observacion').style.display = ''
    document.querySelector('#div_enviado').style.display = ''
    document.querySelector('#cancelar').style.display = ''
    document.querySelector('#eliminar_entrada').style.display = 'none'
    document.querySelector('#guardar_datos').style.display = 'none'
    document.querySelector('#cantidad').readOnly = true
    document.querySelector('#fecha').value = ''
    document.querySelector('#entrada_taller').innerHTML = '<u>CARGAR SALIDA DE FABRICA</u>'
    document.querySelector('#preparar_salida').textContent = 'Guardar salida'
    document.querySelector('#nombre_fecha').textContent = 'Fecha de retiro'
    document.querySelector('#preparar_salida').setAttribute('onclick','guardar_salida()')
    document.querySelector('#preparar_salida').id = 'guardar_salida'
}
function editar_entrada() {
    
    let nombre_taller = document.querySelector('#nombre_taller').value,
    id = document.querySelector('#id_entrada').value,
    fecha_entrada = document.querySelector('#fecha').value,
    producto = document.querySelector('#producto').value,
    cantidad = document.querySelector('#cantidad').value,
    valor = document.querySelector('#valor').value

    mensaje_error = ''

    if(nombre_taller.trim() == '') mensaje_error = 'Complete el nombre del taller.'
    else if(fecha_entrada == '') mensaje_error = 'Complete la fecha.'
    else if(producto.trim() == '') mensaje_error = 'Complete el nombre del producto.'
    else if(cantidad.trim() == '') mensaje_error = 'Agregue una cantidad.'
    else if(valor.trim() == '') mensaje_error = 'Agregue el valor del producto'
    else if(id.trim() == '') location.reload()

    if(mensaje_error != ''){
        alertify.alert('Campos obligatorios', mensaje_error)
        return false
    }
    const datosPost = new FormData()
    datosPost.append('nombre_taller', nombre_taller)
    datosPost.append('id', id)
    datosPost.append('fecha_entrada', fecha_entrada)
    datosPost.append('producto', producto)
    datosPost.append('cantidad', cantidad)
    datosPost.append('valor', valor)

    alertify.confirm('Carga de datos', 'Seguro que quiere guardar los datos?', function(){

        fetch('ajax/ajax_editar_entrada.php', {
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
            }            
        })
        .catch(function (error){
            console.log(error)
            // Catch errors
            alertify.alert('Carga de datos','Ocurrio un error al guardar los datos.')
        })
    }, function(){ alertify.error('Cancelado')});

}

function editar_salida() {
    
    let nombre_taller = document.querySelector('#nombre_taller').value,
    id = document.querySelector('#id_salida').value,
    codigo = document.querySelector('#codigo').value,
    fecha_retiro = document.querySelector('#fecha').value,
    producto = document.querySelector('#producto').value,
    cantidad = document.querySelector('#cantidad').value,
    enviado = document.querySelector('#enviado').value,
    valor = document.querySelector('#valor').value,
    observacion = document.querySelector('#observacion').value

    mensaje_error = ''

    if(nombre_taller.trim() == '') mensaje_error = 'Complete el nombre del taller.'
    else if(fecha_retiro == '') mensaje_error = 'Complete la fecha.'
    else if(producto.trim() == '') mensaje_error = 'Complete el nombre del producto.'
    else if(cantidad.trim() == '') mensaje_error = 'Agregue una cantidad.'
    else if(enviado.trim() == '') mensaje_error = 'Agregue la cantidad de productos enviados.'
    else if(parseInt(cantidad) < parseInt(enviado)) mensaje_error = 'El numero de enviados no puede ser mayor a la cantidad.'
    else if(valor.trim() == '') mensaje_error = 'Agregue el valor del producto'
    else if(id.trim() == '' || codigo.trim() == '') location.reload()

    if(mensaje_error != ''){
        alertify.alert('Campos obligatorios', mensaje_error)
        return false
    }
    const datosPost = new FormData()
    datosPost.append('nombre_taller', nombre_taller)
    datosPost.append('id', id)
    datosPost.append('codigo', codigo)
    datosPost.append('fecha_retiro', fecha_retiro)
    datosPost.append('producto', producto)
    datosPost.append('cantidad', cantidad)
    datosPost.append('enviado', enviado)
    datosPost.append('valor', valor)
    datosPost.append('observacion', observacion)

    alertify.confirm('Carga de datos', 'Seguro que quiere guardar los datos?', function(){

        fetch('ajax/ajax_editar_salida.php', {
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
            }            
        })
        .catch(function (error){
            console.log(error)
            // Catch errors
            alertify.alert('Carga de datos','Ocurrio un error al guardar los datos.')
        })
    }, function(){ alertify.error('Cancelado')});

}

