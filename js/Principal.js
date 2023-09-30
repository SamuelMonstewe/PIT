function HambButton() {
    document.getElementById("HambV").style.visibility = "visible"
}

function ExtiBar() {
    document.getElementById("HambV").style.visibility = "hidden"
    document.getElementById("OptionsPerfil").style.visibility = "hidden"
    document.getElementById("OptionsPerfil").style.top = "0vh"
    document.getElementById("OptionsPerfil").style.backgroundColor = "transparent"
    document.getElementById("OptionsPerfil").style.color = "transparent"
}
function InputFocus() {
    document.getElementById("Lupa-Input").style.visibility = "hidden"
}
function OpenOpitions() {
    document.getElementById("OptionsPerfil").style.visibility = "visible"
    document.getElementById("OptionsPerfil").style.transition = "0.5s"
    document.getElementById("OptionsPerfil").style.position = "absolute"
    document.getElementById("OptionsPerfil").style.top = "8.9vh"
    document.getElementById("OptionsPerfil").style.backgroundColor = "#F6A62E"
    document.getElementById("OptionsPerfil").style.color = "black"
}