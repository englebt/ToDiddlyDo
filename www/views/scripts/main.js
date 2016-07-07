function hide (elements) {
    elements = elements.length ? elements : [elements];
    for (var index = 0; index < elements.length; index++) {
        elements[index].style.display = 'none';
    }
}

function show (elements, displayType) {
    elements = elements.length ? elements : [elements];
    for (var index = 0; index < elements. length; index++) {
        elements[index].style.display = displayType || 'block';
    }
}