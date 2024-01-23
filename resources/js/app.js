import './bootstrap';
import 'tinymce/tinymce';
import 'tinymce/skins/ui/oxide/skin.min.css';
/* import 'tinymce/skins/content/default/content.css'; */
import 'tinymce/icons/default/icons';
import 'tinymce/themes/silver/theme';
import 'tinymce/models/dom/model';
import 'tinymce/plugins/lists';

// .. After imports init TinyMCE ..
window.addEventListener('DOMContentLoaded', () => {
    tinymce.init({
        selector: '.textarea',
        font_formats: 'inherit',
        skin: false,
        content_css: false,
        toolbar: 'undo redo | styleselect |  bold italic underline | link image charmap| alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
        plugins: 'lists',
        branding: false,
        content_css:  '/css/tinymce_styl.css',

    });

    tinymce.init({
        selector: '#pytanie_tresc_edit',

        valid_elements: 'h6',
        force_p_newlines: false,
        forced_root_block: 'h6',
        font_formats: 'inherit', 
        /* TinyMCE configuration options */
        skin: false,
        content_css: false,
        toolbar: 'undo redo | formatselect | italic | forecolor backcolor',
        menubar: false,
        plugins: 'lists',
        branding: false,
        content_css:  '/css/tinymce_styl.css',

    });
});


