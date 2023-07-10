
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
    popup.style = "padding: 60px; position: absolute; top: 250px; right: 200px; bottom: 250px; left: 300px; background: white; border-radius: 20px; display: flex; flex-flow: column nowrap; gap: 20px; justify-content: center; align-items: center;"
    let button_aqui = document.createElement('a')
    button_aqui.href = href_aqui
    button_aqui.innerText = "Excluir apenas deste laboratório"
    button_aqui.style = "padding: 10px; background: #19CEEF; border-radius: 5px;"
    let button_todos = document.createElement('a')
    button_todos.href = href_todos
    button_todos.innerText = "Excluir de todos os laboratórios"
    button_todos.style = "padding: 10px; background: #19CEEF; border-radius: 5px;"
    
    let button_close = document.createElement('button')
    button_close.innerText = "X"
    button_close.style = "background: red; padding: 5px; font-size: 0.5rem; position: absolute; top: 10px; right:10px;" 
    button_close.onclick = function(){
        let popup = document.getElementsByClassName("popup");
        console.log(popup);
        popup[0].remove();
    }
    let div_botoes = document.createElement('div')
    div_botoes.style = "display: flex; flex-flow: row nowrap; justify-content: center; align-items: center; gap: 10px;"
    let div_texto = document.createElement('div')

    let texto_titulo = document.createElement('h2')
    texto_titulo.innerText = "Atenção"

    let texto_paragrafo = document.createElement('h3')
    texto_paragrafo.innerText = "Você deseja excluir o software apenas desse laboratório ou de todos os laboratórios?"

    div_texto.style = "display: flex; flex-flow: column nowrap; justify-content: center; align-items: center; gap: 10px;"

    div_texto.appendChild(texto_titulo)
    div_texto.appendChild(texto_paragrafo)
    
    popup.appendChild(button_close)
    popup.appendChild(div_texto)
    div_botoes.appendChild(button_aqui)
    div_botoes.appendChild(button_todos)
    popup.appendChild(div_botoes)
    // console.log(popup);
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