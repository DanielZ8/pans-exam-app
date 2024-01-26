import './bootstrap';
import 'tinymce/tinymce';
import 'tinymce/skins/ui/oxide/skin.min.css';
/* import 'tinymce/skins/content/default/content.css'; */
import 'tinymce/icons/default/icons';
import 'tinymce/themes/silver/theme';
import 'tinymce/models/dom/model';
import 'tinymce/plugins/lists';
import 'tinymce/plugins/image';

// .. After imports init TinyMCE ..
window.addEventListener('DOMContentLoaded', () => {
    tinymce.init({
        selector: '.textarea',
        plugins: 'lists image',
        toolbar: 'undo redo | styleselect |  bold italic underline | link image charmap| alignleft aligncenter alignright alignjustify | bullist numlist outdent indent ',
        image_title: true,
        images_upload_url: '/upload-image-pytanie', 
        file_picker_types: 'image',
        font_formats: 'inherit',
        skin: false,
        content_css: false,
        branding: false,
        content_css:  '/css/tinymce_styl.css',
        height: 800,
    });

    tinymce.init({
        selector: '#pytanie_tresc_edit',
        plugins: 'lists',
        toolbar: 'undo redo | styleselect | formatselect | bold italic | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
        font_formats: 'inherit', 
        skin: false,
        content_css: false,
        branding: false,
        content_css:  '/css/tinymce_styl.css',

    });
});


