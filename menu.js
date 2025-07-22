function displayDate(){
    document.getElementById('icon').classList.add('ides')
    document.getElementById('icon').classList.remove('non')
    document.getElementById('chrt').classList.add('non')
    document.getElementById('menu').classList.remove('non')
    document.getElementById('menu').classList.add('menu')
}
function display(){
    document.getElementById('icon').classList.add('non')
    document.getElementById('chrt').classList.remove('non')
    document.getElementById('icon').classList.remove('ides')
    document.getElementById('menu').classList.remove('menu')
    document.getElementById('menu').classList.add('non')
}
