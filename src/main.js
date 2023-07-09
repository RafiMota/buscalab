// showSlides();
const slide = document.getElementsByClassName("glide__bullet")[0]
const options = {
  attributes: true
}

function callback(mutationList, observer) {
  mutationList.forEach(function(mutation) {
    if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
        let ball = document.getElementsByClassName("glide__bullet--active");     
        
        adjustcolor(ball[0].dataset.number);
    }
  })
}

const observer = new MutationObserver(callback)
observer.observe(slide, options)

function adjustcolor(n) {
    color = n;
    rgb = [
        {
            "base-color": "#B81F1F",
            "secondary-color": "#FB7185",
            "complementary-color": "#063448",
            "logo": "assets/cyberpunk/logo-cyberpunk.svg",
            "lupa": "assets/cyberpunk/lupa-cyberpunk.svg",
            "megafone": "assets/cyberpunk/megafone-cyberpunk.svg",
            "regras": "assets/cyberpunk/regras-cyberpunk.svg",
        },
        {
            "base-color": "#1F0653",
            "secondary-color": "#7560BA",
            "complementary-color": "#1F0653",
            "logo": "assets/spaceopera/logo-spaceopera.svg",
            "lupa": "assets/spaceopera/lupa-spaceopera.svg",
            "megafone": "assets/spaceopera/megafone-spaceopera.svg",
            "regras": "assets/spaceopera/regras-spaceopera.svg",
        },
        {
            "base-color": "#EF2E00",
            "secondary-color": "#EAAD4E",
            "complementary-color": "#EF2E00",
            "logo": "assets/medieval/logo-medieval.svg",
            "lupa": "assets/medieval/lupa-medieval.svg",
            "megafone": "assets/medieval/megafone-medieval.svg",
            "regras": "assets/medieval/regras-medieval.svg",
        },  
        {
            "base-color": "#193E1D",
            "secondary-color": "#A0C592",
            "complementary-color": "#152314",
            "logo": "assets/solarpunk/logo-solarpunk.svg",
            "lupa": "assets/solarpunk/lupa-solarpunk.svg",
            "megafone": "assets/solarpunk/megafone-solarpunk.svg",
            "regras": "assets/solarpunk/regras-solarpunk.svg",
        },        
        {
            "base-color": "#0A2162",
            "secondary-color": "#4F78ED",
            "complementary-color": "#0A2162",
            "logo": "assets/magicworld/logo-magicworld.svg",
            "lupa": "assets/magicworld/lupa-magicworld.svg",
            "megafone": "assets/magicworld/megafone-magicworld.svg",
            "regras": "assets/magicworld/regras-magicworld.svg",
        },    
        {
            "base-color": "#6D2A10",
            "secondary-color": "#EB975F",
            "complementary-color": "#6D2A10",
            "logo": "./assets/steampunk/logo-steampunk.svg",
            "lupa": "./assets/steampunk/lupa-steampunk.svg",
            "megafone": "./assets/steampunk/megafone-steampunk.svg",
            "regras": "assets/steampunk/regras-steampunk.svg",
        }
    ]
    console.log("Deu certo");

    let header = document.getElementById("header")
    let title = document.getElementById("title");
    let report = document.getElementById("report");
    let h3_report = document.getElementById("h3-report");
    let regras = document.getElementById("regras");
    let h3_regras = document.getElementById("h3-regras");
    let logo = document.getElementById("logo");
    let lupa = document.getElementById("lupa");
    let megafone = document.getElementById("megafone");
    let report_button = document.getElementById("report_button");
    let regras_button = document.getElementById("regras_button");
    let regras_texto = document.getElementById("regras_texto")
    title.style.color = "#ffffff";
    let footer= document.getElementById("footer");

    let bolas = document.getElementsByClassName("glide__bullet")
    
    for(let bol of bolas){
        bol.style.backgroundColor = "#dddddd";
    }
        
    let bola = document.getElementsByClassName("glide__bullet--active")
    bola[0].style.backgroundColor = rgb[color]["base-color"];
    
    header.style.borderBottomColor = rgb[color]["secondary-color"]
    logo.src = rgb[color]["logo"];
    lupa.src = rgb[color]["lupa"];
    megafone.src = rgb[color]["megafone"];
    title.style.color = rgb[color]["base-color"];
    report_button.style.backgroundColor = rgb[color]["complementary-color"];
    regras.src = rgb[color]["regras"]
    regras_button.style.backgroundColor = rgb[color]["complementary-color"];
    h3_report.style.color = rgb[color]["complementary-color"];
    h3_regras.style.color = rgb[color]["base-color"];
    regras_texto.style.color = rgb[color]["base-color"];
    footer.style.borderTopColor = rgb[color]["base-color"];
    report.style.backgroundColor = rgb[color]["secondary-color"];
    logo.style.fill = rgb[color]["base-color"];
    // document.getElementById("title").style.color = rgb[slideIndex-1]["base-color"];

    let setas = document.getElementsByClassName("setas")
    setas[0].style.color = rgb[color]["base-color"]  
    setas[1].style.color = rgb[color]["base-color"]
    console.log(setas);
}

function showSlides(n) {
    setTimeout(function(n){
        if (n >=0 ){
            adjustcolor(n);
            return;
        }
        let ball = document.getElementsByClassName("glide__bullet--active");  
        adjustcolor(ball[0].dataset.number);
        
    },500);
}


