ClassicEditor
    .create( document.querySelector( '#editor' ), {
       // removePlugins: [ 'Heading' ],
        toolbar: [ 'heading' ,'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote' , 'link' ]
    } )
    .catch( error => {
        console.log( error );
    } );