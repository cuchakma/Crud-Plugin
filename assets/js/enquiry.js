let form_value = document.getElementById('enquiry-form');
form_value.addEventListener('submit', Processform);

function Processform(event) {
    event.preventDefault();
    let name    = document.getElementById('name').value;
    let email   = document.getElementById('email').value;
    let message = document.getElementById('message').value;
    let object = {name, email, message};
    var url = cccrudobject.ajaxurl;
    fetch( url,{
        method:'POST',
        body : JSON.stringify(object),
        headers: {"Content-type": "application/json; charset=UTF-8"}
    })
    .then(json => console.log(cccrudobject.error));
}