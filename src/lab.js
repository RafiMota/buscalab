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
                "base-color": "#F24422",
                "secondary-color": "#FD9D51",
                "complementary-color": "#44DF19",
                "logo": "../assets/medieval/logo-medieval.svg",
                "lupa": "../assets/medieval/lupa-medieval.svg",
                "megafone": "../assets/medieval/megafone-medieval.svg",
                "capa": "../assets/medieval/capa-medieval.png"
            },
            {
                "base-color": "#3E1FB5",
                "secondary-color": "#2F2BD0",
                "complementary-color": "#FD9F0B",
                "logo": "../assets/spaceopera/logo-spaceopera.svg",
                "lupa": "../assets/spaceopera/lupa-spaceopera.svg",
                "megafone": "../assets/spaceopera/megafone-spaceopera.svg",
                "capa": "../assets/spaceopera/capa-spaceopera.png"
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

        let logo = document.getElementById("logo");
        logo.src = rgb[lab-1]["logo"];

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