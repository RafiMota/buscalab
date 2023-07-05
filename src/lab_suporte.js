


function showPage(page){
    document.querySelectorAll('article').forEach(section =>{
        section.style.display = 'none';
    })  
    
    document.getElementById(page).style.display = 'flex';
}

document.addEventListener('DOMContentLoaded', function(){
    document.querySelectorAll('button').forEach(button =>{
        button.onclick = function(){
            showPage(this.dataset.page);
            console.log(this.dataset.page);
        }
    })
})

showPage("Softwares");

