document.getElementById("nombre").addEventListener('keyup', slugChange);

function slugChange(){
    
    title = document.getElementById("nombre").value;
    document.getElementById("slug").value = slug(title);
    document.getElementById("slug2").value = slug2(title);

}

function slug (str) {
    var $slug = '';
    var trimmed = str.trim(str);
    $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
    replace(/-+/g, '-').
    replace(/^-|-$/g, '');
     // Agregar "www.riderschilenos/tiendas" al principio del slug
    return $slug.toLowerCase();
}
function slug2 (str) {
    var $slug = '';
    var trimmed = str.trim(str);
    $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
    replace(/-+/g, '-').
    replace(/^-|-$/g, '');
     // Agregar "www.riderschilenos/tiendas" al principio del slug
     $slug = "www.riderschilenos/tiendas/" + $slug.toLowerCase();
    
    return $slug.toLowerCase();
}



//CKEDITOR

ClassicEditor
.create(document.querySelector('#descripcion'), {
    toolbar: {
        items: [
            'heading',
            '|',
            'bold',
            'italic',
            'underline',
            'strikethrough',
            'link',
            '|',
            'bulletedList',
            'numberedList',
            'todoList',
            '|',
            'outdent',
            'indent',
            '|',
            'alignment',
            'fontBackgroundColor',
            'fontColor',
            'fontSize',
            'fontFamily',
            '|',
            'highlight',
            'subscript',
            'superscript',
            'removeFormat',
            'code',
            'codeBlock',
            '|',
            'imageInsert',
            'blockQuote',
            'insertTable',
            'mediaEmbed',
            'pageBreak',
            '|',
            'undo',
            'redo',
            '|',
            'horizontalLine',
            'htmlEmbed',
            'MathType',
            '|',
            'exportPdf',
            'exportWord',
            'exportHtml',
            '|',
            'find',
            'selectAll',
            'sourceEditing',
            '|',
            'undo',
            'redo'
        ],
        shouldNotGroupWhenFull: true
    },
    language: 'es',
    image: {
        toolbar: [
            'imageTextAlternative',
            'imageStyle:full',
            'imageStyle:side',
            '|',
            'imageResize',
            'imageResize:50',
            'imageResize:75',
            '|',
            'imageTextAlternative'
        ]
    },
    table: {
        contentToolbar: [
            'tableColumn',
            'tableRow',
            'mergeTableCells',
            'tableProperties',
            'tableCellProperties'
        ]
    },
    licenseKey: '',
})
.catch(error => {
    console.error(error);
});
//
    //Cambiar imagen
document.getElementById("file").addEventListener('change', cambiarImagen);

function cambiarImagen(event){
    var file = event.target.files[0];

    var reader = new FileReader();
    reader.onload = (event) => {
        document.getElementById("picture").setAttribute('src', event.target.result); 
    };

    reader.readAsDataURL(file);
}