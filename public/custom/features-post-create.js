"use strict";

$("select").selectric();
$.uploadPreview({
    input_field: "#image-upload2", // Default: .image-upload
    preview_box: "#image-preview2", // Default: .image-preview
    label_field: "#image-label2", // Default: .image-label
    label_default: "Choose File", // Default: Choose File
    label_selected: "Change File", // Default: Change File
    no_label: false, // Default: false
    success_callback: null, // Default: null
});
$(".inputtags").tagsinput("items");
