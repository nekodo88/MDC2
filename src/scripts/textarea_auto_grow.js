if(document.querySelector('textarea')) {

    console.log('textarea_auto_grow')

    function auto_grow(element) {
    element.style.height = "50px";
    element.style.height = (element.scrollHeight) + 10 + "px";
}

document.querySelector('textarea').setAttribute("oninput", "auto_grow(this)");
}