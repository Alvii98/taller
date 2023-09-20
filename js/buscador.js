document.addEventListener('keyup', function (event) {
    if (event.target.id == 'codigo') buscar(0,event)
    if (event.target.id == 'fecha_entrega') buscar(2,event)
    if (event.target.id == 'producto') buscar(3,event)
})

document.addEventListener('click', function (event) {
    if(event.target.id == 'entrada_taller' || event.target.id == 'salida_fabrica'){
        let inputs = document.querySelectorAll('input')
        if(inputs[0].value.trim() != ''){
            buscar(0,false,inputs[0].value.trim()) 
        }else if(inputs[1].value.trim() != ''){
            buscar(2,false,inputs[1].value.trim())
        }else if(inputs[2].value.trim() != ''){
            buscar(3,false,inputs[2].value.trim())
        }else{
            buscar(3,false,'')
        }
    }
})

function buscar(columna,event,filt = '') {

    if(columna == 0){
        document.querySelector('#fecha_entrega').value = ''
        document.querySelector('#producto').value = ''
    }else if(columna == 2){
        document.querySelector('#codigo').value = ''
        document.querySelector('#producto').value = ''
    }else if(columna == 3){
        document.querySelector('#codigo').value = ''
        document.querySelector('#fecha_entrega').value = ''
    }
    var filter, table, tbody, tr, td, td_cont, td_none
    filter = event ? event.target.value.toUpperCase() : filt.toUpperCase() //Parametro pasado a mayuscula
    if(filter.trim() == '') filter = ''
    table = document.querySelector("#tabla_entrada").style.display
    tbody = table == '' ? document.querySelectorAll("tbody")[0] : document.querySelectorAll("tbody")[1]
    // console.log(tbody)
    // return
    tr = tbody.getElementsByTagName("tr")
    td_cont = 0
    td_none = 0
    if(columna == '-'){
        alert('Seleccione la columna en la que quiere buscar.')
        return false
    }
    // recorre todos los tr
    for (let i = 0; i < tr.length; i++) {
        // Elemento td de la columna seleccionada
        td = tr[i].getElementsByTagName("td")[columna]
        if (td) {
            td_cont++
            //indexOf() retorna el indice donde se encuentra la palaba(filter) o -1 si no esta
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].setAttribute('style','')
                if (tbody.getElementsByTagName("th")[0] != undefined) {
                    for (let e = 0; e < tbody.getElementsByTagName("th").length; e++) {
                        tbody.getElementsByTagName("th")[e].parentNode.remove()
                    }
                }
            } else {
                td_none++
                tr[i].setAttribute('style','display:none;')
            }
        }
    }
    // td_cont va a contar todos los td y td_none va a contar todos los que puso en none
    // si son iguales es porque no encontro ningun dato con los parametros
    if(td_cont == td_none){
        if (tbody.getElementsByTagName("th")[0] == undefined) {
            tbody.innerHTML += '<th colspan="10" class="text-center">No se encontraron datos.</th>'
        }
    }
}