//***********************************//
// For select 2
//***********************************//
$(".select2").select2();

/*colorpicker*/
$(".demo").each(function () {
    //
    // Dear reader, it's actually very easy to initialize MiniColors. For example:
    //
    //  $(selector).minicolors();
    //
    // The way I've done it below is just for the demo, so don't get confused
    // by it. Also, data- attributes aren't supported at this time...they're
    // only used for this demo.
    //
    $(this).minicolors({
        control: $(this).attr("data-control") || "hue",
        position: $(this).attr("data-position") || "bottom left",

        change: function (value, opacity) {
            if (!value) return;
            if (opacity) value += ", " + opacity;
            if (typeof console === "object") {
                console.log(value);
            }
        },
        theme: "bootstrap"
    });
});
/*datwpicker*/
jQuery(".mydatepicker").datepicker();
jQuery("#datepicker-autoclose").datepicker({
    autoclose: true,
    todayHighlight: true
});
let quillEditor = document.getElementById("editor");
if (quillEditor) {
    let quill = new Quill(quillEditor, {
        theme: "snow",
        modules: {
            toolbar: [
                [{'header': [3, 4, 5, 6, false]}],
                ['bold', 'italic', 'underline', 'strike'],
                ['link', 'blockquote'],
                [{list: 'ordered'}, {list: 'bullet'}, {list: "check"}],
                [{color: []}, {background: []}],
                ["clean"]
            ]
        }
    });
    let content = document.querySelector("#playground");
    quill.on('text-change', () => {
        content.value = quill.root.innerHTML;
    });
}
/**********************************************
 ************FILE ATTACHMENT*******************
 ***********************************************/
((container) => {

    let wrapper = document.getElementById(container);
    if (!wrapper) {
        return;
    }
    let inputFile = wrapper.querySelector("input[type='file']");
    let inputs = document.createElement("div");
    wrapper.append(inputs);
    inputFile.addEventListener("change", (e) => {
        let files = e.target.files;
        appendInputs(files);
    });

    function appendInputs(files) {
        inputs.innerHTML = "";
        for (let i = 0; i < files.length; i++) {
            let input = document.createElement("input");
            input.className = "form-control mb-3";
            input.placeholder = files[i].name;
            input.name = "atachmentName[]";
            inputs.append(input);
        }

    }

})("fileSelector");




