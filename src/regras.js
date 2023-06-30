let counter = 0

function showContent() {

    if (counter % 2 == 0) {
        document.getElementById('regra').style.display = 'block'
        document.getElementById('seta').innerText = '>'
        
    } else {
        document.getElementById('regra').style.display = 'none'
        document.getElementById('seta').innerText = 'V'
    }
    counter++
    console.log(counter);
}