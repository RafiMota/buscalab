let slideIndex = 1;




        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("dot");
            if (n > slides.length) { slideIndex = 1 }
            if (n < 1) { slideIndex = slides.length }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";

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
            let logo  = document.getElementById("logo");
            let lupa  = document.getElementById("lupa");
            let megafone  = document.getElementById("megafone");
            let report_button = document.getElementById("report_button");
            title.style.color = "#ffffff";
            
            logo.src = rgb[slideIndex-1]["logo"];
            lupa.src = rgb[slideIndex-1]["lupa"];
            megafone.src = rgb[slideIndex-1]["megafone"];
            title.style.color = rgb[slideIndex-1]["base-color"];
            report_button.style.backgroundColor = rgb[slideIndex-1]["base-color"];
            h3.style.color = rgb[slideIndex-1]["complementary-color"];
            report.style.backgroundColor = rgb[slideIndex-1]["secondary-color"];
            logo.style.fill = rgb[slideIndex-1]["base-color"];
            // document.getElementById("title").style.color = rgb[slideIndex-1]["base-color"];
        }