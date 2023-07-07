


document.addEventListener('DOMContentLoaded', function(){
    let reports_id = []
    window.sessionStorage.setItem("ids", JSON.stringify(reports_id))
    // console.log(sessionStorage.getItem("ids"))
    document.querySelectorAll('.reporte').forEach(reporte =>{
        reporte.onclick = function(){
            concluiTarefa(this, this.dataset.estado, this.dataset.id);
            
        }
    })
})


function concluiTarefa(elemento, estado, id) {

    function removeId(ids, index){
        if(index >-1){
            ids.splice(index,1)
            sessionStorage.setItem("ids",JSON.stringify(ids))
        }
        

    }

    if(estado == 'Pendente') {
        elemento.style.backgroundColor = "#22dd22"
        elemento.dataset.estado = 'Concluído'
        elemento.children[0].innerText = "Concluído" 

        let reports_id = JSON.parse(sessionStorage.getItem("ids"))
        
        reports_id.push(id)
        sessionStorage.setItem("ids",JSON.stringify(reports_id))

        lixo = document.getElementById("lixo")
        lixo.style.backgroundColor = "#22dd22"
        lixo.style.display = "block"

    } else {
        elemento.style.backgroundColor = "#647482"
        elemento.dataset.estado = 'Pendente'
        elemento.children[0].innerText = "Pendente"

        reports_id = JSON.parse(sessionStorage.getItem("ids"))
        
        let index = reports_id.indexOf(`${id}`)  
            
        removeId(reports_id,index)

       

        lixo = document.getElementById("lixo")
        if(JSON.parse(sessionStorage.getItem("ids")).length == 0){
            console.log("vazio");
            lixo.style.display = 'none'
            lixo.style.backgroundColor = 'grey'
        }

    }
    
}

let dialog = document.getElementById('dialog')

function openDialog() {
    console.log('clicado')

    dialog.style.display = 'flex'

    
}


   
    
$('#lixo').click(function () {
    let reports_id = JSON.parse(sessionStorage.getItem("ids"))
    const url =  '../../src\\models\\remover_reportes.php'
    const body = {
        ids: reports_id,
    }

    $.post(url,body,function(data,status){
        console.log(`${data} and status is ${status}`)
    })  
    
    setTimeout(function(){        
        location.reload()
    },1000);
    
})
    