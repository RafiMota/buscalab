document.addEventListener('DOMContentLoaded', function(){
    document.querySelectorAll('.reporte').forEach(report =>{
        report.onclick = function(){
            concluiTarefa(this, this.dataset.estado);
            console.log(this.dataset.estado);
        }
    })
})



function concluiTarefa(elemento, estado) {

    let isso = elemento;

    
    if(estado == 'Pendente') {
        isso.style.backgroundColor = "#22dd22"
        isso.dataset.estado = 'Concluído'
        isso.innerText = 'Concluído'
    } else {
        isso.style.backgroundColor = "#647482"
        isso.innerText = 'Pendente'
        isso.dataset.estado = 'Pendente'
    }
    
}