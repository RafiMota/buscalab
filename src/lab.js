document.addEventListener('DOMContentLoaded', () => {    

    let params = new URLSearchParams(location.search);
    let lab = params.get('l')
   
    function labCor(lab_id){
        lab = lab_id;
        rgb = [
            {
                
                "base-color": "#B81F1F",
                "secondary-color": "#FB7185",
                "complementary-color": "#063448",
                "logo": "../assets/cyberpunk/logo-cyberpunk.svg",
                "lupa": "../assets/cyberpunk/lupa-cyberpunk.svg",
                "megafone": "../assets/cyberpunk/megafone-cyberpunk.svg",
                "capa": "../assets/cyberpunk/capa-cyberpunk.png"
            },
            {
                
                "base-color": "#1F0653",
                "secondary-color": "#7560BA",
                "complementary-color": "#1F0653",
                "logo": "../assets/spaceopera/logo-spaceopera.svg",
                "lupa": "../assets/spaceopera/lupa-spaceopera.svg",
                "megafone": "../assets/spaceopera/megafone-spaceopera.svg",
                "capa": "../assets/spaceopera/capa-spaceopera.png"
            },
            {
                "base-color": "#EF2E00",
                "secondary-color": "#EAAD4E",
                "complementary-color": "#EF2E00",
                "logo": "../assets/medieval/logo-medieval.svg",
                "lupa": "../assets/medieval/lupa-medieval.svg",
                "megafone": "../assets/medieval/megafone-medieval.svg",
                "capa": "../assets/medieval/capa-medieval.png"
            }, 
            {
                "base-color": "#193E1D",
                "secondary-color": "#A0C592",
                "complementary-color": "#152314",
                "logo": "../assets/solarpunk/logo-solarpunk.svg",
                "lupa": "../assets/solarpunk/lupa-solarpunk.svg",
                "megafone": "../assets/solarpunk/megafone-solarpunk.svg",
                "capa": "../assets/solarpunk/capa-solarpunk.png"
            },
            {
                
                "base-color": "#469AAF",
                "secondary-color": "#A1AAA9",
                "complementary-color": "#D0BABB",
                "logo": "../assets/magicworld/logo-magicworld.svg",
                "lupa": "../assets/magicworld/lupa-magicworld.svg",
                "megafone": "../assets/magicworld/megafone-magicworld.svg",
                "capa": "../assets/magicworld/capa-magicworld.png"
            },                  
            {
                
                "base-color": "#C35221",
                "secondary-color": "#EB975F",
                "complementary-color": "#C35221",
                "logo": "../assets/steampunk/logo-steampunk.svg",
                "lupa": "../assets/steampunk/lupa-steampunk.svg",
                "megafone": "../assets/steampunk/megafone-steampunk.svg",
                "capa": "../assets/steampunk/capa-steampunk.png"
            }
        ]
        console.log("capa carregada");
        let logo = document.getElementById("logo");
        logo.src = rgb[lab-1]["logo"];
        
        let capa = document.getElementById("capa");
        capa.src = rgb[lab-1]["capa"];
        
        let header = document.getElementById("header")
        header.style.borderBottomColor = rgb[lab-1]["secondary-color"]

        let abas = document.getElementById("abas")
        abas.style.color = rgb[lab-1]["base-color"]
        
        let aba_selec = document.getElementsByClassName("glide__bullet--active")
        aba_selec[0].style.borderBottomColor = rgb[lab-1]["base-color"]        

        let report_button = document.getElementById("reportar_facil");

        // console.log(report_button);

        report_button.style.backgroundColor = rgb[lab-1]
        ["base-color"];

        // console.log(report_button);

        let buttons = document.querySelectorAll("button")
        for(let button of buttons){
            button.style.color = rgb[lab-1]["base-color"]
        }

    }

    labCor(lab);

});