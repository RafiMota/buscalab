


document.addEventListener('DOMContentLoaded', function(){
    
    document.querySelectorAll('.reporte').forEach(reporte =>{
        reporte.onclick = function(){
            concluiTarefa(this, this.dataset.estado);
            
        }
    })
})



function concluiTarefa(elemento, estado) {
 
    if(estado == 'Pendente') {
        elemento.style.backgroundColor = "#22dd22"
        elemento.dataset.estado = 'Concluído'
        elemento.children[0].innerText = "Concluído" 
    } else {
        elemento.style.backgroundColor = "#647482"
        elemento.dataset.estado = 'Pendente'
        elemento.children[0].innerText = "Pendente"       
    }
    
}