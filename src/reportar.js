// Função para atualizar as opções do campo "Tipo de Problema"
function atualizarOpcoes() {
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


    // Limpar as opções anteriores
    problema.innerHTML = ""
    software.value = ""
    equipamento.value = ""
    mesa.value = ""
    outroProblema.value = ""


    // Esconder todas as opções 
    divSoftware.style.visibility = 'collapse';
    divEquipamento.style.visibility= 'collapse';
    divProblema.style.visibility = 'collapse';
    divMesa.style.visibility= 'collapse';
    divOutro.style.visibility= 'collapse';

    

    // Obter o valor selecionado no campo "Categoria"
    var problemaSelecionado = categoria.value;

    // Definir as opções de acordo com o problema selecionado
    if (problemaSelecionado === "Computador") {
        
        var opcoesComputador = ["Selecione um problema", "Sem internet", "Não liga", "Monitor quebrado", "Periféricos não funcionam"];
          for (var i = 0; i < opcoesComputador.length; i++) {
            var option = document.createElement("option");
            if(i==0)option.hidden = "hidden"
            option.text = opcoesComputador[i];
            option.value = opcoesComputador[i];
            if(i%2==0){
                option.classList = "bg-rose-100"
            } else{
                option.classList = ""
            }
            problema.add(option);
        }
        
        
        divProblema.style.visibility = 'visible';
        divMesa.style.visibility= 'visible';
        

    } else if (problemaSelecionado === "Equipamento") {

        var opcoesEquipamento = ["Selecione um problema", "Nâo liga", "Não conecta", "Pingando"];
        for (var i = 0; i < opcoesEquipamento.length; i++) {
            var option = document.createElement("option");
            if(i==0)option.hidden = "hidden"
            option.text = opcoesEquipamento[i];
            option.value = opcoesEquipamento[i];
            if(i%2==0){
                option.classList = "bg-rose-100"
            } else{
                option.classList = ""
            }
            problema.add(option);
        }
        
        
        divProblema.style.visibility = 'visible';
        divEquipamento.style.visibility= 'visible';

    } else if (problemaSelecionado === "Software") {
        var opcoesSoftware = ["Selecione um problema", "Não foi instalado", "Não abre", "Expirou a licença"];
        for (var i = 0; i < opcoesSoftware.length; i++) {
            var option = document.createElement("option");
            if(i==0)option.hidden = "hidden"
            option.text = opcoesSoftware[i];
            option.value = opcoesSoftware[i];
            if(i%2==0){
                option.classList = "bg-rose-100"
            } else{
                option.classList = ""
            }
            problema.add(option);
        }
        
        divSoftware.style.visibility = 'visible';
        divProblema.style.visibility = 'visible';
        divMesa.style.visibility= 'visible';
        
    } else if (problemaSelecionado === "Outro") {

        divOutro.style.visibility= 'visible';
    } 
}