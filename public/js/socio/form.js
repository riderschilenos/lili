document.getElementById("username").addEventListener('keyup', slugChange);

function slugChange(){
    
    title = document.getElementById("username").value;

    document.getElementById("slug").value = slug(title);

}

function slug (str) {
    var $slug = '';
    var trimmed = str.trim(str);
    $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
    replace(/-+/g, '-').
    replace(/^-|-$/g, '');
    return ("www.riderschilenos.cl/"+$slug).toLowerCase();
}