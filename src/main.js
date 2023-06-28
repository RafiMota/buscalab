
// showSlides();
const slide = document.getElementsByClassName("glide__bullet")[0]
const options = {
  attributes: true
}

function callback(mutationList, observer) {
  mutationList.forEach(function(mutation) {
    if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
        let ball = document.getElementsByClassName("glide__bullet--active");     
        console.log("bola "+ball[0].dataset.number);
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
            "logo": "/assets/cyberpunk/logo-cyberpunk.svg",
            "lupa": "/assets/cyberpunk/lupa-cyberpunk.svg",
            "megafone": "assets/cyberpunk/megafone-cyberpunk.svg",
        },
        {
            "base-color": "#EF2E00",
            "secondary-color": "#F2BC66",
            "complementary-color": "#EF2E00",
            "logo": "/assets/magicworld/logo-magicworld.svg",
            "lupa": "/assets/magicworld/lupa-magicworld.svg",
            "megafone": "assets/magicworld/megafone-magicworld.svg",
        },
        {
            "base-color": "#193E1D",
            "secondary-color": "#A0C592",
            "complementary-color": "#152314",
            "logo": "/assets/solarpunk/logo-solarpunk.svg",
            "lupa": "/assets/solarpunk/lupa-solarpunk.svg",
            "megafone": "assets/solarpunk/megafone-solarpunk.svg",
        },
        {
            "base-color": "#C35221",
            "secondary-color": "#EB975F",
            "complementary-color": "#C35221",
            "logo": "/assets/steampunk/logo-steampunk.svg",
            "lupa": "/assets/steampunk/lupa-steampunk.svg",
            "megafone": "assets/steampunk/megafone-steampunk.svg",
        }
    ]


    let title = document.getElementById("title");
    let report = document.getElementById("report");
    let h3 = document.getElementById("h3-report");
    let logo = document.getElementById("logo");
    let lupa = document.getElementById("lupa");
    let megafone = document.getElementById("megafone");
    let report_button = document.getElementById("report_button");
    title.style.color = "#ffffff";

    logo.src = rgb[color]["logo"];
    lupa.src = rgb[color]["lupa"];
    megafone.src = rgb[color]["megafone"];
    title.style.color = rgb[color]["base-color"];
    report_button.style.backgroundColor = rgb[color]["base-color"];
    h3.style.color = rgb[color]["complementary-color"];
    report.style.backgroundColor = rgb[color]["secondary-color"];
    logo.style.fill = rgb[color]["base-color"];
    // document.getElementById("title").style.color = rgb[slideIndex-1]["base-color"];
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

