let form_value = document.forms.enquiry_form;
form_value.addEventListener('submit', Processform);

function Processform(event) {
    event.preventDefault();
    let Form_datas = new FormData( form_value );
    var url = cccrudobject.ajaxurl;

    fetch( url,{
        method:'POST',
        body : JSON.stringify( new FormData( form_value ).get('name') ),
        headers: {"Content-type": "application/json; charset=UTF-8"}
    })
    .then(json => alert(cccrudobject.error));
}