var divCategoria = document.getElementById("divCategoria");
var categoria = document.getElementById("categoria");

var software = document.getElementById("software");
var divSoftware = document.getElementById("divSoftware");

var equipamento = document.getElementById("equipamento");
var divEquipamento = document.getElementById("divEquipamento");

var problema = document.getElementById("problema");
var divProblema = document.getElementById("divProblema");

var mesa = document.getElementById("mesa");
var divMesa = document.getElementById("divMesa");

var outroProblema = document.getElementById("outroProblema");
var divOutro = document.getElementById("divOutro");

// Função para atualizar as opções do campo "Tipo de Problema"
function atualizarOpcoes() {
    
    // Limpar as opções anteriores
    problema.innerHTML = ""
    software.value = ""
    equipamento.value = ""
    mesa.value = ""
    outroProblema.value = ""


    // Esconder todas as opções 
    divSoftware.style.display = 'none';
    divEquipamento.style.display = 'none';
    divProblema.style.display = 'none';
    divMesa.style.display = 'none';
    divOutro.style.display = 'none';

    software.required = false
    equipamento.required = false
    problema.required = false
    mesa.required = false
    outroProblema.required = false

    

    // Obter o valor selecionado no campo "Categoria"
    var problemaSelecionado = categoria.value;

    // Definir as opções de acordo com o problema selecionado
    if (problemaSelecionado === "Computador") {
        
        var opcoesComputador = ["Selecione um problema", "Sem internet", "Não liga", "Monitor quebrado", "Periféricos não funcionam"];
          for (var i = 0; i < opcoesComputador.length; i++) {
            var option = document.createElement("option");
            if(i==0){
                option.hidden = "hidden"
                option.value = "";
            } else{
                option.value = opcoesComputador[i];
            }
            option.text = opcoesComputador[i];
            
            if(i%2==0){
                option.classList = "bg-rose-100"
            } else{
                option.classList = ""
            }
            problema.add(option);
        }
        
        mostrarProblema()

    } else if (problemaSelecionado === "Equipamento") {

        var opcoesEquipamento = ["Selecione um problema", "Nâo liga", "Não conecta", "Pingando"];
        for (var i = 0; i < opcoesEquipamento.length; i++) {
            var option = document.createElement("option");
            if(i==0){
                option.hidden = "hidden"
                option.value = "";
            } else{
                option.value = opcoesEquipamento[i];
            }
            option.text = opcoesEquipamento[i];
            if(i%2==0){
                option.classList = "bg-rose-100"
            } else{
                option.classList = ""
            }
            problema.add(option);
        }
        
        
        
        divEquipamento.style.display = 'flex';
        equipamento.required = true
        
        

    } else if (problemaSelecionado === "Software") {
        var opcoesSoftware = ["Selecione um problema", "Não foi instalado", "Não abre", "Expirou a licença"];
        for (var i = 0; i < opcoesSoftware.length; i++) {
            var option = document.createElement("option");
            if(i==0){
                option.hidden = "hidden"
                option.value = "";
            } else{
                option.value = opcoesSoftware[i];
            }
            option.text = opcoesSoftware[i];
            
            if(i%2==0){
                option.classList = "bg-rose-100"
            } else{
                option.classList = ""
            }
            problema.add(option);
        }
        
        divSoftware.style.display = 'flex';
        software.required = true
        

    } else if (problemaSelecionado === "Outro") {

        divOutro.style.display = 'flex';
        outroProblema.required = true
    } 
}

function mostrarMesa(){
    if(categoria.value !="Equipamento"){
        divMesa.style.display = 'flex';   
        mesa.required = true
    }
}

function mostrarProblema(){
    divProblema.style.display = 'flex';
    problema.required = true
}