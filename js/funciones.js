document.addEventListener('click', function (event) {
    if(event.target.id == 'entrada_taller'){
        document.querySelector('#tabla_entrada').style.display = ""
        document.querySelector('#tabla_salida').style.display = "none"
        document.querySelector('#entrada_taller').classList.add("boton-marcado")
        document.querySelector('#salida_fabrica').classList.remove("boton-marcado")
        return
    }
    if(event.target.id == 'salida_fabrica'){
        document.querySelector('#tabla_entrada').style.display = "none"
        document.querySelector('#tabla_salida').style.display = ""
        document.querySelector('#salida_fabrica').classList.add("boton-marcado")
        document.querySelector('#entrada_taller').classList.remove("boton-marcado")
        return
    }
})

function editar_entrada(id) {
    
    const form = document.createElement('form')
    input_id = document.createElement('input'),
    submitButton = document.createElement('button');

    form.name = 'form_post';
    form.method = 'POST'
    form.action = 'editar_carga.php'
    form.style.position = 'absolute'
    form.style.left = '-9999px'
    
    input_id.type = 'text';
    input_id.value = id
    input_id.name = 'id_entrada';
    
    submitButton.type = 'submit';

    form.appendChild(input_id);
    form.appendChild(submitButton);

    document.body.appendChild(form)

    if (form.checkValidity()) {
        form.submit();
    }else{
        this.alert('No se pudo enviar form.')
    }
}

function editar_salida(id) {
    
    const form = document.createElement('form')
    input_id = document.createElement('input'),
    submitButton = document.createElement('button');

    form.name = 'form_post';
    form.method = 'POST'
    form.action = 'editar_carga.php'
    form.style.position = 'absolute'
    form.style.left = '-9999px'
    
    input_id.type = 'text';
    input_id.value = id
    input_id.name = 'id_salida';
    
    submitButton.type = 'submit';

    form.appendChild(input_id);
    form.appendChild(submitButton);

    document.body.appendChild(form)

    if (form.checkValidity()) {
        form.submit();
    }else{
        this.alert('No se pudo enviar form.')
    }
}
