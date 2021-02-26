type = "text/javascript"
var isOpen = false;

function showDiv() {
    if (isOpen) {
        document.getElementById('hiddenDiv').style.display = 'none';
    } else {
        document.getElementById('hiddenDiv').style.display = 'block';
    }
    isOpen = !isOpen;
}