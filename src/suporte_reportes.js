function concluiTarefa() {
    let estadoTarefa = document.getElementById('status').innerText

    if(estadoTarefa == 'Pendente') {
        document.getElementById('tarefa').style.backgroundColor = "#22dd22"
        document.getElementById('status').innerText = 'Concluído'
    } else {
        document.getElementById('tarefa').style.backgroundColor = "#647482"
        document.getElementById('status').innerText = 'Pendente'
    }
    
}