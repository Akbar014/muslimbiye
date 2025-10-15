//scroll nav
const body = document.body;
let lastScroll = 0;

window.addEventListener("scroll", () => {
    const currentScroll = window.pageYOffset;
    if (currentScroll <= 0) {
        body.classList.remove("scroll-up");
        return;
    }

    if (currentScroll > lastScroll && !body.classList.contains("scroll-down")) {
        body.classList.remove("scroll-up");
        body.classList.add("scroll-down");
    } else if (
        currentScroll < lastScroll &&
        body.classList.contains("scroll-down")
    ) {
        body.classList.remove("scroll-down");
        body.classList.add("scroll-up");
    }
    lastScroll = currentScroll;
});

// multi thumb range
const rangeInput = document.querySelectorAll(".range-input input");
const progress = document.querySelector(".slider .progress");
const toolTipMin = document.querySelector(".toolTipMin");
const toolTipMax = document.querySelector(".toolTipMax");

const minToolTipVal = document.querySelector(".minToolTipVal");
const maxToolTipVal = document.querySelector(".maxToolTipVal");
const commonTooltip = document.querySelector(".ageTooltip");

let ageGap = 3;

rangeInput.forEach((input) => {
    input.addEventListener("input", function (e) {
        let minValue = parseInt(rangeInput[0].value);
        let maxValue = parseInt(rangeInput[1].value);

        if (e.target.className === "range-min") {
            toolTipMin.style.zIndex = "2";
            toolTipMax.style.zIndex = "1";
        } else {
            toolTipMin.style.zIndex = "1";
            toolTipMax.style.zIndex = "2";
        }

        if (maxValue - minValue < ageGap) {
            if (e.target.className === "range-min") {
                rangeInput[0].value = maxValue - ageGap;
            } else {
                rangeInput[1].value = minValue + ageGap;
            }
        } else {
            toolTipMin.style.left = progress.style.left =
                parseInt(
                    ((minValue - rangeInput[0].min) /
                        (rangeInput[0].max - rangeInput[0].min)) *
                        100
                ) + "%";
            toolTipMax.style.right = progress.style.right =
                parseInt(
                    ((rangeInput[0].max - maxValue) /
                        (rangeInput[0].max - rangeInput[0].min)) *
                        100
                ) + "%";

            minToolTipVal.innerHTML = minValue;
            maxToolTipVal.innerHTML = maxValue;
        }
    });
});

// bride/groom selector
const bride = document.querySelector(".bride");
const groom = document.querySelector(".groom");

function cvSwitcher(selector) {
    if (selector === "bride") {
        bride.classList.add("selected-option");
        groom.classList.remove("selected-option");
    } else {
        bride.classList.remove("selected-option");
        groom.classList.add("selected-option");
    }
}

// $(".item_filter_biodata").on("keypress", function (e) {
//     if (e.which == 13) {
//         $(this).next("input").focus();
//         e.preventDefault();
//     }
// });

let biodataInputs = document.querySelectorAll(".item_filter_biodata");
biodataInputs.forEach((element, i) => {
    element.addEventListener("keydown", function (e) {
        if (e.which === 13) {
            if (i + 1 <= biodataInputs.length) {
                e.preventDefault();
                biodataInputs[i + 1].focus();
            }
        }
    });
});

function copyClipboard(TextToCopy) {
    var TempText = document.createElement("input");
    TempText.value = TextToCopy;
    document.body.appendChild(TempText);
    TempText.select();

    document.execCommand("copy");
    document.body.removeChild(TempText);

    alert("Copied to clipboard!");
}

function triggerNewWindow(url, thisFun, nextFunction) {
    let win = window.open(url, "newwindow", "width=420,height=900");
    win.onbeforeunload = function () {
        thisFun.setAttribute('onclick', nextFunction);
    };
}
