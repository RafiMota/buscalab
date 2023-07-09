
// function showPage(page){
//     document.querySelectorAll('article').forEach(section =>{
//         section.style.display = 'none';
//     })  
    
//     document.getElementById(page).style.display = 'flex';
// }

function lixopopup(href_aqui, href_todos){
    
    let popup = document.createElement('div')
    let body = document.querySelector("body")
    body.appendChild(popup)
    popup.className = 'popup' 
    popup.style = "padding: 10px; position: absolute; top: 250px; right: 250px; bottom: 250px; left: 350px; background: white;  opacity: 95%; border-radius: 20px; display: flex; flex-flow: column nowrap; gap: 20px; justify-content: center; align-items: center;"
    let button_aqui = document.createElement('a')
    button_aqui.href = href_aqui
    button_aqui.innerText = "Excluir apenas deste laboratório"
    button_aqui.style = "padding: 10px; background: grey; border-radius: 5px;"
    let button_todos = document.createElement('a')
    button_todos.href = href_todos
    button_todos.innerText = "Excluir de todos os laboratórios"
    button_todos.style = "padding: 10px; background: grey; border-radius: 5px;"
    
    let button_close = document.createElement('button')
    button_close.innerText = "X"
    button_close.style = "background: red; padding: 5px; font-size: 0.5rem; position: absolute; top: 10px; right:10px;" 
    button_close.onclick = function(){
        let popup = document.getElementsByClassName("popup");
        console.log(popup);
        popup[0].remove();
    }

    popup.appendChild(button_close)
    popup.appendChild(button_aqui)
    popup.appendChild(button_todos)
    console.log(popup);
}
// href="../../../src/models/labs.model.php?l=<?= $id_lab . '&Sre=' . $id_soft ?>"

document.addEventListener('DOMContentLoaded', function(){
    // document.querySelectorAll('button').forEach(button =>{
    //     button.onclick = function(){
    //         showPage(this.dataset.page);
    //         console.log(this.dataset.page);
    //     }
    // })

    document.querySelectorAll(".lixo").forEach(lixo =>{
        lixo.onclick = function(){
            lixopopup(this.dataset.id, this.dataset.todos);
        } 
    })
})

// showPage("Softwares");