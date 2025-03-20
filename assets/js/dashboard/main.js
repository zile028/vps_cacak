//***********************************//
// Widget content type
//***********************************//
let widgetCreate = document.getElementById("widgetCreate");
if (widgetCreate) {
    let contentType = widgetCreate.querySelector("[data-type='content-type']");
    let contentWrapper = widgetCreate.querySelector("[data-type='content']");
    let contentHtml = widgetCreate.querySelector("[data-type='html']");
    let editorTypes = widgetCreate.querySelectorAll("[data-editor-type]");

    contentType.addEventListener("change", function () {
        let type = this.value;
        editorTypes.forEach(editor => {
            if (editor.getAttribute("data-editor-type") === type) {
                editor.style.display = "flex";
            } else {
                editor.style.display = "none";
                editor.querySelector("textarea").value = "";
                editor.querySelector(".ql-editor").innerHTML = "";
            }
        });
    });
}
//***********************************//
// For select 2
//***********************************//

$(document).ready(function () {
    function formatOption(option) {
        if (!option.id) {
            return option.text;
        }
        let img = $(option.element).data('image');
        if (img) {
            let $option = $('<span><img src="' + img + '" width="25" height="20" style="margin-right: 10px; object-fit: contain" /> ' + option.text + '</span>');
            return $option;
        } else {
            return option.text;
        }
    }

    $('.select2').select2({
        templateResult: formatOption, templateSelection: formatOption
    });


    $(".select2[data-image='preview']").on('change', function () {
        let [selected] = $(this).find("option:selected");
        // let selectedValue = $(this).val(); // Dobija selektovanu vrednost
        // console.log($(this));
        $('#imagePreview').attr('src', selected.getAttribute("data-storeName")); // Postavlja src atribut
    });
});

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

/**********************************************
 ************QUILL EDITOR*******************
 ***********************************************/
const BlockEmbed = Quill.import('blots/block/embed');

class ImageBlot extends BlockEmbed {
    static blotName = 'image';
    static tagName = 'img';

    static create(value) {
        let node = super.create();
        node.setAttribute('alt', value.alt);
        node.setAttribute('src', value.url);
        node.classList.add("attachment");
        return node;
    }

    static value(node) {
        return {
            alt: node.getAttribute('alt'),
            url: node.getAttribute('src')
        };
    }
}

class DividerBlot extends BlockEmbed {
    static blotName = 'divider'; // Ime blota
    static tagName = 'hr'; // Tag koji se koristi (horizontal line)

    static create() {
        let node = super.create();
        node.setAttribute('contenteditable', 'false'); // Divider nije editabilan
        node.classList.add("divider"); // Divider nije editabilan
        return node;
    }
}

let multipleEditor = document.querySelectorAll("[data-editor='quillEditor']");
let quillOptions = {
    theme: "snow",
    modules: {
        toolbar: {
            container: [
                [{'header': [1, 2, 3, 4, 5, 6, false]}],
                ['bold', 'italic', 'underline', 'strike'],
                [{'align': []}],
                ['link', 'image', 'video', 'blockquote'],
                [{list: 'ordered'}, {list: 'bullet'}],
                [{'indent': '-1'}, {'indent': '+1'}],
                [{color: ["#000000", "#ffffff", "#727272", "#f90303"]},
                    {background: ["#000000", "#ffffff", "#727272", "#f90303", "#deb000"]}],
                ['divider'],
                ["clean"]
            ],
            handlers: {
                divider: function () {
                    const range = this.quill.getSelection(); // Dobijamo poziciju kursora
                    if (range) {
                        this.quill.insertEmbed(range.index, 'divider', true, Quill.sources.USER); // Umetnite razdjelnik na trenutnu poziciju
                    }
                },
                image: async function () {
                    let imageUrl = null;
                    try {
                        imageUrl = await window.navigator.clipboard.readText();
                        if (!imageUrl.includes("http", 0)) {
                            imageUrl = prompt('Unesite URL slike:');
                        }
                    } catch (error) {
                        imageUrl = prompt('Unesite URL slike:');
                    }
                    if (imageUrl) {
                        let quill = this.quill;
                        // const altText = prompt('Unesite alternativni tekst:');
                        const altText = "";
                        const imageBlotData = {
                            url: imageUrl,
                            alt: altText || ''
                        };
                        let range = quill.getSelection(true);
                        let [block] = quill.getLine(range.index);
                        if (block && block.domNode.tagName === "P") {
                            quill.setSelection(range.index + block.length(), 0);
                        }

                        // Umetnite sliku na novu poziciju
                        await quill.insertEmbed(quill.getSelection().index, 'image', imageBlotData);

                        // Nakon umetanja slike, premestite kursor ispod slike
                        quill.setSelection(quill.getSelection().index + 1, 0);
                    }
                }
            }

        }
    }
};
if (multipleEditor) {
    multipleEditor.forEach((editor) => {

        const dividerIcon = `<svg viewBox="0 0 18 18">
<line class="ql-stroke" x1="15" x2="3" y1="9" y2="9"></line>
</svg>`;

        let container = editor.querySelector("[data-editor='container']");
        let AlignStyle = Quill.import("attributors/style/align");
        Quill.register(AlignStyle, true);
        let quill = new Quill(container, quillOptions);
        let toolbar = quill.getModule("toolbar");
        // DODATI TABINDEX
        container.querySelector(":scope > div").setAttribute("tabindex", container.getAttribute("tabindex"));
        container.querySelector(":scope > div").setAttribute("tabindex", container.getAttribute("tabindex"));
        container.setAttribute("tabindex", "-1");
        // Dodajemo ikonicu za razdelnik u toolbar
        toolbar.addHandler('divider', toolbar.handlers.divider);
        // Prilagođavamo toolbar dugme za razdelnik sa novom ikonicom
        document.querySelector(".ql-divider").innerHTML = dividerIcon;
        let content = editor.querySelector("[data-editor='content']");
        Quill.register(ImageBlot);
        Quill.register(DividerBlot);
        quill.on("text-change", () => {
            // content.value = quill.root.innerHTML;
            content.value = quill.getSemanticHTML();
        });
    });
}


function removeEmptyPTags(quill) {
    const editorContent = document.querySelector('.ql-editor');
    const pTags = editorContent.querySelectorAll('p');

    pTags.forEach(p => {
        // Proveri da li je <p> tag prazan ili sadrži samo <br> tag
        if (p.innerHTML.trim() === '' || p.innerHTML.trim() === '<br>') {
            p.remove(); // Ukloni prazne <p> tagove ili one sa samo <br>
        }
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

/**********************************************
 ************FEATURE IMAGE PREVIEW**************
 ***********************************************/
let imgPreview = document.getElementById("imagePreview");
let imgSelect = document.getElementById("featuredImage");
let imgPreviewA = document.getElementById("imagePreviewA");
if (imgPreview && imgSelect) {
    imgSelect.addEventListener("input", () => {
        console.log("TEST");
    });
    imgSelect.addEventListener("change", function () {
        let selectedIndex = this.selectedIndex;
        let imgSrc = this.options[selectedIndex].getAttribute("data-storeName");
        imgPreview.setAttribute("src", imgSrc);
        imgPreviewA && imgPreviewA.setAttribute("href", imgSrc);
    });
}

let inputImage = document.querySelector("[data-preview='src']");
if (inputImage) {
    inputImage.addEventListener("input", function () {
        let img = document.querySelector("[data-preview='preview']");
        img.setAttribute("src", this.value);
    });
}

let selectionFileForm = document.querySelector("#selectionFileForm");
let checkInput1 = document.querySelectorAll("[data-select='checked']");
if (checkInput1) {
    checkInput1.forEach((e) => {
        e.addEventListener("change", function (el) {
            document.querySelector(`[data-id="${el.target.value}"]`).classList.toggle("checkedImage");
        });
    });
}

if (selectionFileForm) {
    selectionFileForm.addEventListener("submit", function (e) {
        e.preventDefault();
        let checkInput = document.querySelectorAll("[data-select='checked']:checked");
        let selectedValues = [];
        checkInput.forEach(el => selectedValues.push(el.value));
        let tempInput = document.createElement("input");
        tempInput.type = "text";
        tempInput.style.display = "none";
        tempInput.name = "selected";
        tempInput.value = JSON.stringify(selectedValues);
        selectionFileForm.appendChild(tempInput);
        console.log(selectedValues);
        console.log(checkInput);
        e.target.submit();
    });
}
// let relateBtn = document.querySelector("#relateBtn");
// relateBtn.addEventListener("click", createRelation);

async function pasteInto(input, img) {
    let inputEl = document.getElementById(input);
    let imgEl = document.getElementById(img);
    try {
        let clipboardText = await navigator.clipboard.readText();
        let regex = /^(http|https):\/\//;
        if (regex.test(clipboardText)) {
            imgEl.src = clipboardText;
            inputEl.value = clipboardText;
        } else {
            alert("Nije validan link slike! ");
        }
    } catch (error) {
        console.log(error);
    }
}