let labChecked = document.getElementById('labs').value
document.getElementById('categoria').style.display = 'none' 

function checkValue() {
    if (labChecked != 'placeholder') {
        document.getElementById('categoria').style.display = 'block' 
    } else {
        document.getElementById('categoria').style.display = 'none' 
    }  
    alert("oi")
}

console.log(labChecked);